<?php

namespace ByTIC\GoogleTagManager\Tests\Manager\Traits;

use ByTIC\GoogleTagManager\GTManager;
use ByTIC\GoogleTagManager\Tests\AbstractTest;

/**
 * Class HasConfigurationTraitTest
 * @package ByTIC\GoogleTagManager\Tests\Manager\Traits
 */
class HasConfigurationTraitTest extends AbstractTest
{
    /**
     * @dataProvider data_setEnabled
     */
    public function test_setEnabled($value, $expected)
    {
        $manager = new GTManager();
        $manager->setEnabled($value);
        self::assertSame($expected, $manager->isEnabled());
    }

    public function data_setEnabled(): array
    {
        return [
            ['', false],
            ['0', false],
            ['false', false],
            [false, false],
            ['1', true],
            ['true', true],
            ['TRUE', true],
            [true, true],
        ];
    }
}
