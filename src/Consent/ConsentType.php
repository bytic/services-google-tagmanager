<?php

namespace ByTIC\GoogleTagManager\Consent;

/**
 * Class ConsentType
 * @package ByTIC\GoogleTagManager\Consent
 */
class ConsentType
{
    public const TYPE_AD = "ad_storage";
    public const TYPE_ANALYTICS = "analytics_storage";
    public const TYPE_PERSONALIZATION = "personalization_storage";
    public const TYPE_FUNCTIONALITY = "functionality_storage";
    public const TYPE_SECURITY = "security_storage";

    public const TYPES = [
        self::TYPE_SECURITY,
        self::TYPE_FUNCTIONALITY,
        self::TYPE_PERSONALIZATION,
        self::TYPE_ANALYTICS,
        self::TYPE_AD,
    ];
}