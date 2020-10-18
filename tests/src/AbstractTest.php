<?php

namespace ByTIC\GoogleTagManager\Tests;

use ByTIC\GoogleTagManager\Utility\GoogleTagManager;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package ByTIC\Manager\Tests
 */
abstract class AbstractTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        GoogleTagManager::setConfig(null);
        GoogleTagManager::setManager(null);
    }
}
