<?php

namespace WDB\PrimeVisualization\Dispatcher;

use \WDB\PrimeVisualization\Application\Utility\ModuleUtility;
use \WDB\PrimeVisualization\Application\Utility\EnvironmentUtility;

class ApplicationDispatcher
{

    protected $configurationController;

    protected $configuration;

    protected $configurationArray;

    protected $request;

    protected $activeModules;

    protected $availableModules;
    
    protected $applicationContext;

    public function __construct($applicationContext = null)
    {
        if ($applicationContext) {
            $this->setApplicationContext($applicationContext);
        }

        $this->activeModules = $this->getActiveModules();
        #var_dump(['$this->activeModules'=>$this->activeModules, '$applicationContext' => $applicationContext]);

        # EnvironmentUtility::dumpDeclaredClasses();
    }

    public function dispatch()
    {
        $response = $this->dispatchWeb();
        /*
        if (empty($this->configuration['modules'])) {
            $modules = $this->configurationController->getDefaultModules();
        } else {
            $modules = $this->configurationController->getModules();
        }
        */
        #foreach ($this->activeModules as $key => $value) {
            
        #}
    }

    public function dispatchWeb()
    {
        $configuration = $this->applicationContext->getConfiguration(); //[isset()]
        # var_dump([$this->applicationContext, $configuration, debug_backtrace()]);
        $defaultAction = 'defaultAction';
        $controller = new \WDB\PrimeVisualization\Application\Controller\DefaultWebController($this->applicationContext);
        $response = $controller->{$defaultAction}();
        return $response;
    }

    public function dispatchCli()
    {
        $defaultAction = 'defaultAction';
        $controller = new \WDB\PrimeVisualization\Application\Controller\DefaultCliController($this->applicationContext);
        $response = $controller->{$defaultAction}();
        return $response;
    }

    public function getActiveModules()
    {
        return ModuleUtility::getActiveModules($this->configuration['modules']);
    }
    
    public function setApplicationContext($applicationContext)
    {
        $this->applicationContext = $applicationContext;
    }

    /*
    public function getAvailableModules()
    {
        return ModuleUtility::getAvailableModules();
    }
    */
}