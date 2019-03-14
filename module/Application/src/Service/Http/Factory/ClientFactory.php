<?php

namespace Application\Service\Http\Factory;

use Application\Service\Http\GuzzleWrapper;
use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ClientFactory
 *
 * @package Application\Service\Http\Factory
 */
class ClientFactory implements FactoryInterface
{
    /**
     * Creates the HTTP client service
     *
     * @param ContainerInterface $container The service container
     * @param string $requestedName The requested name
     * @param array|null $options Additional options
     *
     * @return GuzzleWrapper The HTTP client service
     *
     * @throws ContainerException
     * @throws ServiceNotCreatedException
     * @throws ServiceNotFoundException
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $mainConfig = $container->get('Config');
        $cfg = $mainConfig['api_config'];
        $guzzle = new Client([
            'auth' => [$cfg['user'], $cfg['password']]
        ]);
        return new GuzzleWrapper($guzzle, $cfg['host']);
    }
}
