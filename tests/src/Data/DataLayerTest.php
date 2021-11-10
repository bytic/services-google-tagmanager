<?php

namespace ByTIC\GoogleTagManager\Tests\Data;

use ByTIC\GoogleTagManager\Data\DataLayer;
use ByTIC\GoogleTagManager\Tests\AbstractTest;

/**
 * Class DataLayerTest
 * @package ByTIC\GoogleTagManager\Tests\Data
 */
class DataLayerTest extends AbstractTest
{
    public function test_push()
    {
        $data = new DataLayer();
        self::assertSame("[]", $data->toJson());

        $data->push(['test', 'test', ['test' => 'value']]);
        self::assertSame('[["test","test",{"test":"value"}]]', $data->toJson());

        $data->push(['test' => 'value']);
        self::assertSame('[["test","test",{"test":"value"}],{"test":"value"}]', $data->toJson());
    }
}