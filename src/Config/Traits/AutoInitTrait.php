<?php

namespace ByTIC\GoogleTagManager\Config\Traits;

/**
 * Trait AutoInitTrait
 * @package ByTIC\Manager\Config\Traits
 */
trait AutoInitTrait
{
    /**
     * @return static
     */
    public static function autoInit()
    {
        if (static::canInitFromConfig()) {
            return static::fromConfig();
        }

        if (static::canInitFromEnv()) {
            return static::fromEnv();
        }
        return new static();
    }
}
