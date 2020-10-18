<?php

namespace ByTIC\GoogleTagManager\Manager\Traits;

/**
 * Trait CanRenderTrait
 * @package ByTIC\GoogleTagManager\Manager\Traits
 */
trait CanRenderTrait
{
    /**
     * @return false|string
     */
    public function head()
    {
        return $this->renderView('head');
    }

    public function body()
    {
        return $this->renderView('body');
    }

    /**
     * @param string $name
     * @param array $parameters
     */
    protected function renderView($name, $parameters = [])
    {
        $parameters['enabled'] = $this->isEnabled();
        $parameters['id'] = $this->getId();
        $parameters['dataLayer'] = $this->getDataLayer();

        ob_start();
        extract($parameters);
        require $this->viewsPaths() . '/' . $name . '.php';
        return ob_get_clean();
    }

    protected function viewsPaths(): string
    {
        return dirname(dirname(dirname(__DIR__))) . '/resources/views';
    }
}
