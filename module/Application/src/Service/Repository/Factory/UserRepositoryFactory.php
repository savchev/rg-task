<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 23:24
 */

namespace Application\Service\Repository\Factory;


use Application\Service\Http\ClientInterface;
use Application\Service\Repository\UserRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class UserRepositoryFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return UserRepository
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $httpClient = $container->get(ClientInterface::class);
        return new UserRepository($httpClient);
    }


}