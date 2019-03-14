<?php

namespace Application\Controller\Factory;

use Application\Controller\IndexController;
use Application\Service\Repository\UserRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class IndexControllerFactory
 *
 * @package Application\Controller\Factory
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * Creates the controller for the home page
     *
     * @param ContainerInterface $container The service container
     * @param string $requestedName The requested name
     * @param array|null $options Additional options
     *
     * @return IndexController The home page controller
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $repository = $container->get(UserRepository::class);
        return new IndexController($repository);
    }
}
