<?php

namespace WDB\Primes\Provider;

use \WDB\PrimeVisualization\Application\Provider\ModuleNavigationProvider;
use \WDB\PrimeVisualization\Application\Provider\StaticPageNavigationProvider;
use \WDB\PrimeVisualization\Application\Provider\ContentFromConfigurationNavigationProvider;

class NavigationProvider
{    
    protected $moduleNavigation;

    protected $staticPagesNavigation;

    protected $contentFromConfigurationNavigation;

    // public function __construct(){}

    public function getAllNavigation()
    {
        $this->getModuleNavigation();
        $this->getStaticPageNavigation();
        $this->getContentFromConfigurationNavigation();
        return $this;
    }

    public function getModuleNavigation()
    {
        $availableModules = []; // @TODO
        if (count($availableModules)) {
            $moduleNavigationProvider = new ModuleNavigationProvider;
            $moduleNavigation = $moduleNavigationProvider->getAllModuleNavigation();
            $this->moduleNavigation = $moduleNavigation;
            return $this->moduleNavigation;
        }
        return null;
    }

    public function getStaticPageNavigation()
    {
        $staticPages = []; // @TODO
        if (count($staticPages)) {
            $StaticPageNavigationProvider = new StaticPageNavigationProvider;
            $staticPageNavigation = $staticPageNavigationProvider->getAllStaticPageNavigation();
            $this->staticPageNavigation = $staticPageNavigation;
            return $this->staticPageNavigation;
        }
        return null;
    }

    public function getContentFromConfigurationNavigation()
    {
        $contentFromConfiguration = []; // @TODO
        if (count($ContentFromConfiguration)) {
            $contentFromConfigurationNavigationProvider = new ContentFromConfigurationNavigationProvider;
            $contentFromConfigurationNavigation = $ContentFromConfigurationNavigationProvider->getAllContentFromConfigurationNavigation();
            $this->contentFromConfigurationNavigation = $contentFromConfigurationNavigation;
            return $this->contentFromConfigurationNavigation;
        }
        return null;
    }
}
