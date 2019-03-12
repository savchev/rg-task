<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 22:39
 */

namespace Application\Service\Http;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class GuzzleWrapper implements ClientInterface
{

    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    /**
     * @var string
     */
    protected $url;

    /**
     * GuzzleWrapper constructor.
     * @param GuzzleClient $guzzle
     * @param string $url
     */
    public function __construct(GuzzleClient $guzzle, string $url)
    {
        $this->guzzle = $guzzle;
        $this->url = $url;
    }

    public function getAll(): iterable
    {
        $response = $this->guzzle->get($this->url);
        if ($response->getStatusCode() != 200) {
            throw new \RuntimeException(
                $response->getReasonPhrase(),
                $response->getStatusCode()
            );
        }
        return $this->processResponse($response);
    }

    protected function processResponse(ResponseInterface $response): iterable
    {
        $contentType = $response->getHeader('Content-Type');
        if ($this->isJson($contentType.'')) {
            return json_decode($response->getBody().'', true);
        } else {
            return [];
        }
    }

    protected function isJson(string $contentType): bool
    {
        return (bool) preg_match('/^application\/[a-z\s]*(json)$/i', $contentType);
    }
}