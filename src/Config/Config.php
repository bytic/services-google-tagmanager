<?php

namespace ByTIC\GoogleTagManager\Config;

/**
 * Class Config
 * @package ByTIC\Manager\Config
 */
class Config
{
    use Traits\AutoInitTrait;
    use Traits\CanInitFromEnviromentTrait;
    use Traits\CanInitFromConfigTrait;
    use Traits\HasConfigurationTrait;
}