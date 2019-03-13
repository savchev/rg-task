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
        $response = $this->guzzle->get($this->url . '/list');
        if ($response->getStatusCode() != 200) {
            throw new \RuntimeException(
                'Error ocurred while fetching response',
                $response->getStatusCode()
            );
        }
        return $this->processResponse($response);
    }

    protected function processResponse(ResponseInterface $response): iterable
    {
        $contentType = $response->getHeader('Content-Type');
        if ($contentType && $this->isJson($contentType[0])) {
            return json_decode($response->getBody().'', true);
        } else {
            return [];
        }
    }

    protected function isJson(string $contentType): bool
    {
        return (bool) preg_match('/^application\/[\w\s\.\+]*(json)/i', $contentType);
    }
}
