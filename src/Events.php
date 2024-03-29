<?php

namespace Socifi\N200;

use Socifi\N200\Exceptions\AuthenticationException;
use Socifi\N200\Exceptions\AuthorizationException;
use Socifi\N200\Exceptions\NotFoundException;
use Socifi\N200\Exceptions\RequestException;
use Socifi\N200\Exceptions\ResponseException;
use Socifi\N200\VO\EventVO;

/**
 * Events resource
 *
 * @package Socifi\N200
 */
class Events extends AbstractResource
{
    const ENDPOINT = 'events';

    /**
     * Get all events and their details
     *
     * @return EventVO[]
     * @throws AuthorizationException on invalid credentials. Wrong API Key.
     * @throws AuthenticationException when user does not have permissions to given resource.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when events endpoint resource not found.
     */
    public function getAll()
    {
        if (!$eventList = $this->getList()) {
            return null;
        }

        $events = [];

        foreach ($eventList as $code => $name) {
            try {
                $events[] = $this->get($code);
            } catch (NotFoundException $e) {
                continue;
            }
        }

        return $events;
    }

    /**
     * Get list of event codes and their names
     *
     * @return array|null
     * @throws AuthorizationException on invalid credentials. Wrong API Key.
     * @throws AuthenticationException when user does not have permissions to given resource.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when requested item not found.
     */
    public function getList()
    {
        $eventsResponse = $this->n200->get(self::ENDPOINT);

        if (!array_key_exists('event', $eventsResponse) || !is_array($eventsResponse['event'])) {
            return null;
        }

        $list = [];

        foreach ($eventsResponse['event'] as $event) {
            if (!array_key_exists('code', $event)) {
                continue;
            }

            $list[$event['code']] = array_key_exists('name', $event) ? $event['name'] : null;
        }

        return $list;
    }

    /**
     * Get details of event
     *
     * @param $code
     * @return EventVO|null
     * @throws AuthorizationException on invalid credentials. Wrong API Key.
     * @throws AuthenticationException when user does not have permissions to given resource.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when requested item not found.
     */
    public function get($code)
    {
        if (!$eventResponse = $this->n200->get(self::ENDPOINT . '/' . $code)) {
            return null;
        }

        $event = new EventVO($eventResponse);

        $event->setCode($code);

        return $event;
    }
}
