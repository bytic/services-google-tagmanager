<?php

namespace ByTIC\GoogleTagManager\Config\Traits;

/**
 * Trait HasConfigurationTrait
 * @package ByTIC\Manager\Config\Traits
 */
trait HasConfigurationTrait
{
    protected static $configurations = ['id', 'enabled'];

    /**
     * @var string
     */
    protected $id = '';

    /**
     * @var bool
     */
    protected $enabled = false;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Enable Google Tag Manager scripts rendering.
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * Disable Google Tag Manager scripts rendering.
     */
    public function disable()
    {
        $this->enabled = false;
    }
}