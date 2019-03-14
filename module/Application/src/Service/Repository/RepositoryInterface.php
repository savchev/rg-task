<?php

namespace Application\Service\Repository;

/**
 * Interface RepositoryInterface
 *
 * Main methods for repository objects
 *
 * @package Application\Service\Repository
 */
interface RepositoryInterface
{

    /**
     * Fetches all data from the data source (DB, REST API, etc.)
     *
     * @return iterable Collection with objects
     */
    public function getAll(): iterable;

    /**
     * Create single object with the fetched data
     *
     * @param mixed $row Collection with data for a single object
     *
     * @return mixed Concrete object, filled with the data
     */
    public function hydrate($row);
}
