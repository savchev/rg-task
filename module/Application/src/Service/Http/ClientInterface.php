<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 22:38
 */

namespace Application\Service\Http;

interface ClientInterface
{

    public function getAll(): iterable;
}
