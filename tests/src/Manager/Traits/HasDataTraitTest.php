<?php

namespace ByTIC\GoogleTagManager\Tests\Manager\Traits;

use ByTIC\GoogleTagManager\GTManager;
use ByTIC\GoogleTagManager\Tests\AbstractTest;

/**
 * Class HasDataTraitTest
 * @package ByTIC\GoogleTagManager\Tests\Manager\Traits
 */
class HasDataTraitTest extends AbstractTest
{
    public function test_flash()
    {
        $manager = new GTManager();
        $manager->flash('pageCategory', 'signup');

        $manager = new GTManager();
        $data = $manager->getDataLayer();
        self::assertSame(['pageCategory' => 'signup'], $data->toArray());
    }
}