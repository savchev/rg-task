<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 23:35
 */

namespace Application\Controller\Factory;

use Application\Controller\IndexController;
use Application\Service\Repository\UserRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $repository = $container->get(UserRepository::class);
        return new IndexController($repository);
    }
}
