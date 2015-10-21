<?php

namespace Socifi\N200;

use Socifi\N200\Exceptions\AuthenticationException;
use Socifi\N200\Exceptions\AuthorizationException;
use Socifi\N200\Exceptions\NotFoundException;
use Socifi\N200\Exceptions\RequestException;
use Socifi\N200\Exceptions\ResponseException;
use Socifi\N200\VO\ContactVO;
use Socifi\N200\VO\VisitorVO;

/**
 * Contacts resource
 *
 * @package Socifi\N200
 */
class Contacts extends AbstractResource
{
    const ENDPOINT = 'contacts';

    /**
     * Get details of contact
     *
     * @param $code
     * @return ContactVO|null
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

        $contact = new ContactVO($visitorResponse);

        $contact->setCode($code);

        return $contact;
    }
}
