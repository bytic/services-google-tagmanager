<?php

namespace ByTIC\GoogleTagManager\Manager\Traits;

use ByTIC\GoogleTagManager\Data\DataLayer;
use ByTIC\GoogleTagManager\Data\FlashDataLayer;

/**
 * Trait HasDataTrait
 * @package ByTIC\GoogleTagManager\Manager\Traits
 */
trait HasDataTrait
{
    /**
     * @var \ByTIC\GoogleTagManager\Data\DataLayer
     */
    protected $dataLayer;

    /**
     * @var \ByTIC\GoogleTagManager\Data\FlashDataLayer
     */
    protected $flashDataLayer;

    /**
     * Retrieve the data layer.
     *
     * @return \ByTIC\GoogleTagManager\Data\DataLayer
     */
    public function getDataLayer()
    {
        return $this->dataLayer;
    }

    /**
     * Add data to the data layer.
     *
     * @param array|string $key
     * @param mixed $value
     */
    public function dataPush($value = null)
    {
        $this->dataLayer->push($value);
    }

    /**
     * Add data to the data layer.
     *
     * @param array|string $key
     * @param mixed $value
     */
    public function dataSet($key, $value = null)
    {
        $this->dataLayer->set($key, $value);
    }

    public function dataAvailable(): bool
    {
        return $this->getDataLayer()->count() > 0;
    }

    /**
     * Add data to the data layer for the next request.
     *
     * @param array|string $key
     * @param mixed $value
     */
    public function flash($key, $value = null)
    {
        $this->flashDataLayer->add($key, $value);
    }

    protected function initData()
    {
        $this->flashDataLayer = new FlashDataLayer();
        $this->dataLayer = new DataLayer($this->flashDataLayer->all());
    }
}
