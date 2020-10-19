<?php

namespace ByTIC\GoogleTagManager\Config\Traits;

use ByTIC\GoogleTagManager\Config\Config;
use Nip\Container\Container;
use Nip\Utility\Str;

/**
 * Trait CanInitFromConfigTrait
 * @package ByTIC\Manager\Config\Traits
 */
trait CanInitFromConfigTrait
{
    protected static $configRoots = ['services.googletagmanager', 'googletagmanager'];
    protected static $configRoot = null;

    /**
     * @return static|Config
     */
    public static function fromConfig()
    {
        $config = new static();
        $config->initFromConfig();
        return $config;
    }

    /**
     * @return bool
     */
    public static function canInitFromConfig(): bool
    {
        if (!function_exists('config') || !function_exists('app')) {
            return false;
        }

        try {
            $config = config();
        } catch (\Exception $e) {
            return false;
        }
        foreach (static::$configRoots as $root) {
            if ($config->has($root)) {
                static::$configRoot = $root;
                return true;
            }
        }
        return false;
    }

    protected function initFromConfig()
    {
        foreach (static::$configurations as $configuration) {
            $method = 'set' . Str::camel($configuration);
            $this->$method(static::getConfigVar($configuration));
        }
    }

    /**
     * @param string $value
     * @param null $default
     * @return mixed|null
     * @noinspection PhpDocMissingThrowsInspection
     */
    protected static function getConfigVar($value, $default = null)
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $config = config();
        return $config->get(static::$configRoot . '.' . $value, $default);
    }
}
