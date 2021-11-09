<?php

namespace ByTIC\GoogleTagManager\Manager\Traits;

use ByTIC\GoogleTagManager\Consent\ConsentType;

/**
 * Trait HasConsentTrait
 * @package ByTIC\GoogleTagManager\Manager\Traits
 */
trait HasConsentTrait
{
    protected $consents = [];

    public function enableConsentLimited()
    {
        $this->enableConsentSecurity();
        $this->enableConsentFunctionality();
        $this->disableConsentPersonalization();
        $this->disableConsentAnalytics();
        $this->disableConsentAd();
    }

    public function enableConsentAd()
    {
        $this->enableConsent(ConsentType::TYPE_AD);
    }

    public function disableConsentAd()
    {
        $this->disableConsent(ConsentType::TYPE_AD);
    }

    public function enableConsentAnalytics()
    {
        $this->enableConsent(ConsentType::TYPE_ANALYTICS);
    }

    public function disableConsentAnalytics()
    {
        $this->disableConsent(ConsentType::TYPE_ANALYTICS);
    }

    public function enableConsentPersonalization()
    {
        $this->enableConsent(ConsentType::TYPE_PERSONALIZATION);
    }

    public function disableConsentPersonalization()
    {
        $this->disableConsent(ConsentType::TYPE_PERSONALIZATION);
    }

    public function enableConsentFunctionality()
    {
        $this->enableConsent(ConsentType::TYPE_FUNCTIONALITY);
    }

    public function disableConsentFunctionality()
    {
        $this->disableConsent(ConsentType::TYPE_FUNCTIONALITY);
    }

    public function enableConsentSecurity()
    {
        $this->enableConsent(ConsentType::TYPE_SECURITY);
    }

    public function disableConsentSecurity()
    {
        $this->disableConsent(ConsentType::TYPE_SECURITY);
    }

    /**
     * @param string $type
     */
    public function enableConsent(string $type)
    {
        $this->editConsent($type, true);
    }

    /**
     * @param string $type
     */
    public function disableConsent(string $type)
    {
        $this->editConsent($type, false);
    }

    /**
     * @param string $type
     * @param bool $value
     */
    public function editConsent(string $type, bool $value = true)
    {
        if (in_array($type, ConsentType::TYPES)) {
            $this->consents[$type] = $value;
        }
    }

    /**
     * @return array
     */
    public function getConsents(): array
    {
        return $this->consents;
    }
}