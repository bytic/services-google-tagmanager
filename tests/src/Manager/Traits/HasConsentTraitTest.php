<?php

namespace ByTIC\GoogleTagManager\Tests\Manager\Traits;

use ByTIC\GoogleTagManager\GTManager;
use ByTIC\GoogleTagManager\Tests\AbstractTest;

/**
 * Class HasConsentTraitTest
 * @package ByTIC\GoogleTagManager\Tests\Manager\Traits
 */
class HasConsentTraitTest extends AbstractTest
{
    public function test_enableConsentLimited()
    {
        $manager = new GTManager();
        $manager->enable();
        $manager->setId('GT-999');
        $manager->enableConsentLimited();
        self::assertSame(
            file_get_contents(TEST_FIXTURE_PATH . '/output/head_limited_consent.html'),
            $manager->head()
        );
    }
}