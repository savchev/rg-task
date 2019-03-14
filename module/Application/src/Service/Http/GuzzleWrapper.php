<?php

namespace Application\Service\Http;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

/**
 * Class GuzzleWrapper
 *
 * HTTP client, using the GuzzleHttp client object
 *
 * @package Application\Service\Http
 */
class GuzzleWrapper implements ClientInterface
{

    /**
     * The GuzzleHttp client instance
     *
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * The REST API base URL
     *
     * @var string
     */
    protected $url;

    /**
     * GuzzleWrapper constructor.
     *
     * @param GuzzleClient $guzzle The Guzzle instance
     * @param string $url The API base URL
     */
    public function __construct(GuzzleClient $guzzle, string $url)
    {
        $this->guzzle = $guzzle;
        $this->url = $url;
    }

    /**
     * Call the API and return all data
     *
     * @return iterable The fetched API data
     */
    public function getAll(): iterable
    {
        $response = $this->guzzle->get($this->url . '/list');
        return $this->processResponse($response);
    }

    /**
     * Process the API response and transform it to PHP array
     *
     * @param ResponseInterface $response The API response object
     *
     * @return iterable The transformed response body
     */
    protected function processResponse(ResponseInterface $response): iterable
    {
        // Get the response content type
        $contentType = $response->getHeader('Content-Type');
        // If the content exists and it is json...
        if ($contentType && $this->isJson($contentType[0])) {
            // Decode the response body to associative array
            $result = json_decode($response->getBody().'', true);
            // If no error ocurred
            if (json_last_error() == JSON_ERROR_NONE && is_array($result)) {
                // return the decoded result
                return $result;
            } else {
                // If there is an error, return empty array
                return [];
            }
        } else {
            // If it is not json, return empty array
            return [];
        }
        // More checkings for different types can be added to the if-else block above
    }

    /**
     * Checks whether a content type string is json type
     *
     * Allowed values are standard strings with'application/json' or
     * vendor types ('application/vnd.<SOME_VENDOR_NAME>+json'), including with
     * additional parameters (e.g. 'application/json; charset=utf-8').
     *
     * @param string $contentType The content type for check
     *
     * @return bool True if it is json compatible, otherwise false
     */
    protected function isJson(string $contentType): bool
    {
        return (bool) preg_match(
            '/^application\/(vnd\.[\w\s\.\+\-]*)?(json)/i',
            $contentType
        );
    }
}
