<?php

namespace ByTIC\GoogleTagManager\Tests\Utility;

use ByTIC\GoogleTagManager\Tests\AbstractTest;
use ByTIC\GoogleTagManager\Utility\GoogleTagManager;
use Nip\Config\Config;
use Nip\Container\Container;

/**
 * Class GoogleTagManagerTest
 * @package ByTIC\Manager\Tests\Utility
 */
class GoogleTagManagerTest extends AbstractTest
{
    public function test_initFromEnviroment()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(TEST_FIXTURE_PATH, '.env.generic');
        $dotenv->load();

        $manager = GoogleTagManager::getManager();

        static::assertTrue($manager->isEnabled());
        static::assertSame('GTM-999', $manager->getId());
    }

    public function test_initFromConfig()
    {
        $config = new Config(
            ['services' => ['googletagmanager' => require_once TEST_FIXTURE_PATH . '/config/googletagmanager.php']]
        );
        Container::getInstance()->set('config', $config);

        $manager = GoogleTagManager::getManager();

        static::assertTrue($manager->isEnabled());
        static::assertSame('GTM-9999', $manager->getId());
    }
}
