<?php

namespace ByTIC\GoogleTagManager\Tests\Manager\Traits;

use ByTIC\GoogleTagManager\GTManager;
use ByTIC\GoogleTagManager\Tests\AbstractTest;

/**
 * Class CanRenderTraitTest
 * @package ByTIC\GoogleTagManager\Tests\Manager\Traits
 */
class CanRenderTraitTest extends AbstractTest
{
    public function test_head_returns_empty_not_enabled()
    {
        $manager = new GTManager();
        self::assertEmpty($manager->head());
    }

    public function test_head_no_data()
    {
        $manager = new GTManager();
        $manager->enable();
        $manager->setId('GT-999');
        self::assertSame(
            file_get_contents(TEST_FIXTURE_PATH . '/output/head_no_data.html'),
            $manager->head()
        );
    }

    public function test_head()
    {
        $manager = new GTManager();
        $manager->enable();
        $manager->setId('GT-999');
        $manager->dataSet('pageCategory', 'signup');
        self::assertSame(
            file_get_contents(TEST_FIXTURE_PATH . '/output/head_simple.html'),
            $manager->head()
        );
    }

    public function test_body_returns_empty_not_enabled()
    {
        $manager = new GTManager();
        self::assertEmpty($manager->body());
    }

    public function test_body()
    {
        $manager = new GTManager();
        $manager->enable();
        $manager->setId('GT-999');
        self::assertSame(
            file_get_contents(TEST_FIXTURE_PATH . '/output/body_simple.html'),
            $manager->body()
        );
    }
}
