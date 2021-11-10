<?php

namespace ByTIC\GoogleTagManager\Manager\Traits;

use ByTIC\GoogleTagManager\Scripts\BodyScripts;
use ByTIC\GoogleTagManager\Scripts\HeadScripts;

/**
 * Trait CanRenderTrait
 * @package ByTIC\GoogleTagManager\Manager\Traits
 */
trait CanRenderTrait
{
    /**
     * @return false|string
     */
    public function head(): string
    {
        return HeadScripts::render($this);
    }

    public function body(): string
    {
        return BodyScripts::render($this);
    }
}
