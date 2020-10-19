<?php

namespace ByTIC\GoogleTagManager\Utility;

use ByTIC\GoogleTagManager\Config\Config;
use ByTIC\GoogleTagManager\GTManager;

/**
 * Class Manager
 * @package ByTIC\Manager\Utility
 *
 * @method static string head()
 * @method static string body()
 */
class GoogleTagManager
{
    /**
     * @var null|GTManager
     */
    protected static $manager = null;

    protected static $config = null;

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        return call_user_func_array([static::getManager(), $method], $arguments);
    }

    /**
     * @return null|GTManager
     */
    public static function getManager()
    {
        if (self::$manager === null) {
            static::initAgent();
        }

        return self::$manager;
    }

    protected static function initAgent()
    {
        self::setManager(GTManager::fromConfig(static::getConfig()));
    }


    /**
     * @param GTManager $manager
     */
    public static function setManager($manager)
    {
        self::$manager = $manager;
    }

    /**
     * @return Config
     */
    protected static function getConfig()
    {
        if (self::$config === null) {
            self::$config = Config::autoInit();
        }

        return self::$config;
    }

    /**
     * @param $config
     */
    public static function setConfig($config)
    {
        self::$config = $config;
    }
}
