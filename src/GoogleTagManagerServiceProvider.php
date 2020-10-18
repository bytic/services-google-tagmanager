<?php

namespace ByTIC\GoogleTagManager;

use ByTIC\GoogleTagManager\Utility\GoogleTagManager;
use Nip\Container\ServiceProviders\Providers\AbstractServiceProvider;
use Nip\Container\ServiceProviders\Providers\BootableServiceProviderInterface;
use Nip\Http\Kernel\Kernel;
use Nip\Http\Kernel\KernelInterface;
use ByTIC\GoogleTagManager\Middleware\GoogleTagManagerMiddleware;

/**
 * Class GoogleTagManagerServiceProvider
 * @package ByTIC\Manager
 */
class GoogleTagManagerServiceProvider extends AbstractServiceProvider
{

    /**
     * Returns a boolean if checking whether this provider provides a specific
     * service or returns an array of provided services if no argument passed.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['googletagmanager'];
    }

    public function register()
    {
        $this->registerManager();
    }

    protected function registerManager()
    {
        $this->getContainer()->share(
            'googletagmanager',
            function () {
                $agent = GoogleTagManager::getManager();
                return $agent;
            }
        );
    }
}