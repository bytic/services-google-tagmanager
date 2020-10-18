<?php

namespace ByTIC\GoogleTagManager\Tests\Utility;

use ByTIC\GoogleTagManager\GTManager;
use ByTIC\GoogleTagManager\Tests\AbstractTest;
use ByTIC\GoogleTagManager\Utility\GoogleTagManager;
use Dotenv\Dotenv;
use Mockery;

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
}
