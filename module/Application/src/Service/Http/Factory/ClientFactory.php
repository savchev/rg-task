<?php
/**
 * Created by PhpStorm.
 * User: kiril_savchev
 * Date: 12.3.2019 г.
 * Time: 22:29
 */

namespace Application\Service\Http\Factory;

use Application\Service\Http\GuzzleWrapper;
use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ClientFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return GuzzleWrapper
     *
     * @throws ContainerException
     * @throws ServiceNotCreatedException
     * @throws ServiceNotFoundException
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $mainConfig = $container->get('Config');
        $cfg = $mainConfig['api_config'];
        $guzzle = new Client([
            'auth' => [$cfg['user'], $cfg['password']]
        ]);
        return new GuzzleWrapper($guzzle, $cfg['host']);
    }
}
