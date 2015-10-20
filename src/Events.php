<?php

namespace Socifi\N200;

use Socifi\N200\Exceptions\AuthenticationException;
use Socifi\N200\Exceptions\NotFoundException;
use Socifi\N200\Exceptions\RequestException;
use Socifi\N200\Exceptions\ResponseException;
use Socifi\N200\VO\EventVO;

class Events
{
    const ENDPOINT = 'events';

    /**
     * @var N200
     */
    private $n200;

    /**
     * N200 Events constructor.
     * @param N200 $n200
     */
    public function __construct($n200)
    {
        $this->n200 = $n200;
    }

    /**
     * Get all events and their details
     *
     * @return EventVO[]
     * @throws AuthenticationException on invalid credentials. Wrong API Key.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when events endpoint resource not found.
     */
    public function getAll()
    {
        if (!$eventIDs = $this->getCodes()) {
            return null;
        }

        $events = [];

        foreach ($eventIDs as $eventID) {
            try {
                $events[] = $this->get($eventID);
            } catch (NotFoundException $e) {
                continue;
            }
        }

        return $events;
    }

    /**
     * Get Event codes
     *
     * @return array|null
     * @throws AuthenticationException on invalid credentials. Wrong API Key.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when requested item not found.
     */
    public function getCodes()
    {
        $eventsResponse = $this->n200->get(self::ENDPOINT);

        if (!array_key_exists('event', $eventsResponse) || !is_array($eventsResponse['event'])) {
            return null;
        }

        $eventCodes = [];

        foreach ($eventsResponse['event'] as $event) {
            if (!array_key_exists('code', $event)) {
                continue;
            }

            $eventCodes[] = $event['code'];
        }

        return $eventCodes;
    }

    /**
     * Get details of event
     *
     * @param $code
     * @return EventVO|null
     * @throws AuthenticationException on invalid credentials. Wrong API Key.
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
