<?php

namespace ByTIC\GoogleTagManager;

use ByTIC\GoogleTagManager\Config\Traits\HasConfigurationTrait;

/**
 * Class GTManager
 * @package ByTIC\Manager
 */
class GTManager
{
    use HasConfigurationTrait;
    use Manager\Traits\HasConfigTrait;
    use Manager\Traits\HasDataTrait;
    use Manager\Traits\CanRenderTrait;

    public function __construct()
    {
        $this->initData();
    }
}
