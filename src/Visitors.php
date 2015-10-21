<?php

namespace Socifi\N200;

use Socifi\N200\Exceptions\AuthenticationException;
use Socifi\N200\Exceptions\AuthorizationException;
use Socifi\N200\Exceptions\NotFoundException;
use Socifi\N200\Exceptions\RequestException;
use Socifi\N200\Exceptions\ResponseException;
use Socifi\N200\VO\VisitorVO;

class Visitors
{
    const ENDPOINT = 'visitors';

    /**
     * @var N200
     */
    private $n200;

    /**
     * N200 Visitors constructor.
     * @param N200 $n200
     */
    public function __construct($n200)
    {
        $this->n200 = $n200;
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
     * Get details of visitor
     *
     * @param $code
     * @return VisitorVO|null
     * @throws AuthorizationException on invalid credentials. Wrong API Key.
     * @throws AuthenticationException when user does not have permissions to given resource.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when requested item not found.
     */
    public function get($code)
    {
        if (!$visitorResponse = $this->n200->get(self::ENDPOINT . '/' . $code)) {
            return null;
        }

        $visitor = new VisitorVO($visitorResponse);

        $visitor->setCode($code);

        return $visitor;
    }

    /**
     * Check whether the visitor is registered on given event (by event code)
     *
     * @param VisitorVO $visitor
     * @param string $eventCode
     * @return bool
     */
    public function isVisitorRegisteredOnEvent(VisitorVO $visitor, $eventCode)
    {
        if (!$event = $visitor->getEvent()) {
            return false;
        }

        return $event->getCode() === $eventCode;
    }
}
