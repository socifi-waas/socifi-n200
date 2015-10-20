<?php
/**
 * Created by PhpStorm.
 * User: shimmi
 * Date: 20.10.15
 * Time: 9:40
 */

namespace Socifi\N200;


use Socifi\N200\Exceptions\N200Exception;

class N200
{
    const METHOD_GET = 'POST';

    /**
     * @var string Base API Uri
     */
    private $baseUri = 'https://api.n200.com/';

    private $apiKey;

    /**
     * N200 constructor.
     * @param string $apiKey The N200 API Key
     */
    public function __construct($apiKey, $options = [])
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
     */
    public function get($endpoint)
    {
        return $this->sendRequest('GET', $endpoint);
    }

    /**
     * Sends a request to the API and returns the result.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $params
     *
     * @return mixed
     * @throws N200Exception
     */
    public function sendRequest($method, $endpoint, array $params = [])
    {
        if ($method !== self::METHOD_GET) {
            throw new N200Exception('Only GET supported at this time.');
        }

        $ch = curl_init($this->baseUri);

        curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey . ':');
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $return = curl_exec($ch);

        curl_close($ch);

        var_dump($return);die;
        return $return;
    }
}
