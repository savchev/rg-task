<?php

namespace Application\Service\Repository\Factory;

use Application\Service\Http\ClientInterface;
use Application\Service\Repository\UserRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class UserRepositoryFactory
 *
 * @package Application\Service\Repository\Factory
 */
class UserRepositoryFactory implements FactoryInterface
{

    /**
     * Creates the user repository service
     *
     * @param ContainerInterface $container The service container
     * @param string $requestedName The requested service name
     * @param array|null $options Additional options
     *
     * @return UserRepository The user repository service
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $httpClient = $container->get(ClientInterface::class);
        return new UserRepository($httpClient);
    }
}
