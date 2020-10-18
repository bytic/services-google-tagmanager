<?php

namespace ByTIC\GoogleTagManager\Data;

use Nip\FlashData\FlashData;

/**
 * Class DataFlash
 * @package ByTIC\GoogleTagManager\Data
 */
class FlashDataLayer extends FlashData
{
    protected $sessionKey = 'gtm-data';

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->previous;
    }
}
