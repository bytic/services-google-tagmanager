<?php

namespace ByTIC\GoogleTagManager\Scripts;

use ByTIC\GoogleTagManager\GTManager;
use Nip\Utility\Str;
use Nip\Utility\Stringable;

/**
 * Class AbstractScripts
 * @package ByTIC\GoogleTagManager\Scripts
 */
abstract class AbstractScripts
{
    protected $manager;

    public static function render(GTManager $manager): string
    {
        $render = new static();
        $render->manager = $manager;
        return $render->generate();
    }

    protected function generate(): string
    {
        $name = basename(get_class($this));
        $name = strtolower(str_replace('Scripts','', $name));
        return $this->renderView($name);
    }

    /**
     * @param string $name
     * @param array $parameters
     */
    protected function renderView($name, $parameters = [])
    {
        $parameters['enabled'] = $this->manager->isEnabled();
        $parameters['id'] = $this->manager->getId();
        $parameters['dataLayer'] = $this->manager->getDataLayer();
        $parameters['consents'] = $this->manager->getConsents();

        ob_start();
        extract($parameters);
        require $this->viewsPaths() . '/' . $name . '.php';
        return ob_get_clean();
    }

    protected function viewsPaths(): string
    {
        return dirname(dirname(__DIR__)) . '/resources/views';
    }
}