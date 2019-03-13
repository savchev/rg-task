<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 23:01
 */

namespace Application\Service\Repository;

interface RepositoryInterface
{

    public function getAll(): iterable;

    public function hydrate($row);
}
