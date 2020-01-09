<?php

namespace WDB\PrimeVisualization\Bootstrap;

use \WDB\PrimeVisualization\Route\ApplicationRoute;
use \WDB\PrimeVisualization\Request\ApplicationRequest;
use \WDB\PrimeVisualization\Dispatcher\ApplicationDispatcher;
use \WDB\PrimeVisualization\Context\ApplicationContext;
use \WDB\PrimeVisualization\Configuration\ApplicationConfiguration;

class ApplicationBootstrap
{
    protected $dispatcher = null;

    protected $configurationFilePath = '';
    
    protected $defaultConfigurationFilePath = '';
    
    protected $applicationContext;

    /**
     * Constructor
     * If $configurationFilePath is set later (again ?) by 'setConfigurationFilePath()'
     *   then the method 'init()' has to be called afterwards
     *
     * @param string $configurationFilePath     Optional, Path to configuration-file
     *
     * @retutn void
     */
    public function __construct($configurationFilePath = '')
    {
        $this->defaultConfigurationFilePath = PRIME_V_DIR . 'Configuration/DefaultApplicationConfiguration.php';
        $this->setConfigurationFilePath($configurationFilePath);
        $this->init();
    }
    
    public function init()
    {
        $this->applicationContext = $this->getApplicationContext();
        $this->dispatcher = $this->getDispatcher();
    }
    
    public function run()
    {
        if (!$this->configurationFilePath) {
            throw new \InvalidArgumentException('$configurationFilePath has to be configured.');
        }
        $this->dispatcher->dispatch();
    }
    
    public function setConfigurationFilePath($configurationFilePath)
    {
        $filepath = $configurationFilePath ?: $this->defaultConfigurationFilePath;
        if ($filepath) {
            if (is_file($filepath)) {
                $this->configurationFilePath = $filepath;
            } else {
                throw new \InvalidArgumentException('$configurationFilePath is not a valid path.');
            }
        }
    }
    
    protected function getApplicationRoute()
    {
        return new \WDB\PrimeVisualization\Route\ApplicationRoute;
    }
    
    protected function getApplicationRequest()
    {
        return new \WDB\PrimeVisualization\Request\ApplicationRequest;
    }
    
    protected function getApplicationConfiguration()
    {
        return new \WDB\PrimeVisualization\Configuration\ApplicationConfiguration($this->configurationFilePath);
    }
    
    protected function getApplicationContext()
    {
        return new ApplicationContext(
            $this->getApplicationRoute(),          // URL, protocol, referer, etc.
            $this->getApplicationConfiguration(),  // configuration-file
            $this->getApplicationRequest()         // parameters
        );
    }
    
    protected function getDispatcher()
    {
        return new ApplicationDispatcher($this->applicationContext); // $this->configurationFilePath
    }
}
