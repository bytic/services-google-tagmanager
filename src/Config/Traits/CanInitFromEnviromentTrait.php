<?php

namespace ByTIC\GoogleTagManager\Config\Traits;

use ByTIC\GoogleTagManager\Config\Config;
use ByTIC\GoogleTagManager\Config\ConfigEnv;
use Nip\Utility\Str;

/**
 * Trait CanInitFromEnviromentTrait
 * @package ByTIC\Manager\Config\Traits
 */
trait CanInitFromEnviromentTrait
{

    /**
     * @return static|Config
     */
    public static function fromEnv()
    {
        $config = new static();
        $config->initFromEnv();
        return $config;
    }

    /**
     * @return bool
     */
    public static function canInitFromEnv()
    {
        if (empty(static::getEnvVar(ConfigEnv::ENABLED))) {
            return false;
        }
        if (empty(static::getEnvVar(ConfigEnv::ID))) {
            return false;
        }
        return true;
    }

    protected function initFromEnv()
    {
        foreach (static::$configurations as $configuration) {
            $method = 'set' . Str::camel($configuration);
            $this->$method(static::getEnvVar(constant(ConfigEnv::class . '::' . strtoupper($configuration))));
        }
    }

    /**
     * @param string $value
     * @param null $default
     * @return mixed|null
     */
    protected static function getEnvVar($value, $default = null)
    {
        if (isset($_ENV[$value])) {
            return $_ENV[$value];
        }
        return $default;
    }
}
