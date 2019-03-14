<?php

namespace Application\Service\Repository;

use Application\Service\Http\ClientInterface as HttpClientInterface;

/**
 * Class AbstractApiRepository
 *
 * Abstract class for fetching data from REST APIs.
 * The ancestors must implement the hydrate method.
 *
 * @package Application\Service\Repository
 */
abstract class AbstractApiRepository implements RepositoryInterface
{

    /**
     * HTTP client for communicating with the API
     *
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * AbstractApiRepository constructor.
     *
     * @param HttpClientInterface $httpClient HTTP client for the API
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Fetches all data from the API and hydrate it as concrete objects
     *
     * @return iterable Collection with objects
     */
    public function getAll(): iterable
    {
        $response = $this->httpClient->getAll();
        $result = [];
        foreach ($response as $row) {
            $result[] = $this->hydrate($row);
        }
        return $result;
    }
}
