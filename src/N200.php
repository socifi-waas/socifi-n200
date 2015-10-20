<?php

namespace Socifi\N200;

use Socifi\N200\Exceptions\AuthenticationException;
use Socifi\N200\Exceptions\NotFoundException;
use Socifi\N200\Exceptions\RequestException;
use Socifi\N200\Exceptions\ResponseException;

class N200
{
    const HTTP_METHOD_GET = 'GET';

    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;

    /**
     * @var string Base API Uri
     */
    private $baseUri = 'https://api.n200.com/';

    /**
     * @var string N200 API Key
     */
    private $apiKey;

    /**
     * N200 constructor.
     * @param string $apiKey The N200 API Key
     * @param array $options Optional options
     */
    public function __construct($apiKey, array $options = [])
    {
        $this->apiKey = $apiKey;

        if (array_key_exists('baseUri', $options)) {
            $this->baseUri = $options['baseUri'];
        }
    }

    /**
     * Sends a GET request to the API and returns the result.
     *
     * @param string $endpoint
     * @return array|null
     * @throws AuthenticationException on invalid credentials. Wrong API Key.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when requested item not found.
     */
    public function get($endpoint = '')
    {
        return $this->sendRequest(self::HTTP_METHOD_GET, $endpoint);
    }

    /**
     * Sends a request to the API and returns the result.
     *
     * @param string $method
     * @param string $endpoint
     *
     * @return array|null
     * @throws AuthenticationException on invalid credentials. Wrong API Key.
     * @throws RequestException on invalid request. E.g. unsupported http method.
     * @throws ResponseException on invalid or malformed response. E.g. can not parse the response.
     * @throws NotFoundException when requested item not found.
     */
    public function sendRequest($method, $endpoint)
    {
        if ($method !== self::HTTP_METHOD_GET) {
            throw new RequestException('Only GET supported at this time.');
        }

        $curlOptions = [
            CURLOPT_URL => $this->baseUri.$endpoint,
            CURLOPT_USERPWD => $this->apiKey . ':',
            CURLOPT_TIMEOUT => 30,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
        ];

        $ch = curl_init();
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($responseCode === self::HTTP_FORBIDDEN) {
            throw new AuthenticationException('Unable to authenticate user. Probably bad API Key.');
        } elseif ($responseCode === self::HTTP_NOT_FOUND) {
            throw new NotFoundException('Resource not found ['.$endpoint.'].');
        }

        curl_close($ch);

        if (!$xmlObject = simplexml_load_string($response)) {
            throw new ResponseException('Unable to parse response.');
        }

        return json_decode(json_encode($xmlObject), true);
    }
}
