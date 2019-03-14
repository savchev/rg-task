<?php

namespace Application\Service\Http;

/**
 * Interface ClientInterface
 *
 * Common interface for http clients
 *
 * @package Application\Service\Http
 */
interface ClientInterface
{

    /**
     * Fetches API's all data
     *
     * @return iterable Collection from the API's data
     */
    public function getAll(): iterable;
}
