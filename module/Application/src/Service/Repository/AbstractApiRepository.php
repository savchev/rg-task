<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 23:12
 */

namespace Application\Service\Repository;

use Application\Service\Http\ClientInterface as HttpClientInterface;

abstract class AbstractApiRepository implements RepositoryInterface
{

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * AbstractApiRepository constructor.
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getAll(): iterable
    {
        try {
            $response = $this->httpClient->getAll();
            $result = [];
            foreach ($response as $row) {
                $result[] = $this->hydrate($row);
            }
            return $result;
        } catch (\Exception $e) {
            throw new \RuntimeException(
                'Error ocurred while trying to load entities',
                $e->getCode(),
                $e
            );
        }
    }
}
