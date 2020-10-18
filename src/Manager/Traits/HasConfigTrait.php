<?php

namespace ByTIC\GoogleTagManager\Manager\Traits;

use ByTIC\GoogleTagManager\Config\Config;

/**
 * Trait HasConfigTrait
 * @package ByTIC\GoogleTagManager\Manager\Traits
 */
trait HasConfigTrait
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @param Config $config
     * @return static
     */
    public static function fromConfig($config)
    {
        $agent = new static();
        $agent->setConfig($config);
        return $agent;
    }

    /**
     * @param Config $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
        $this->populateFromConfig();
    }

    protected function populateFromConfig()
    {
        $this->setEnabled($this->config->isEnabled());
        $this->setId($this->config->getId());
    }
}
