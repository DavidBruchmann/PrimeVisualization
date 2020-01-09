<?php

namespace WDB\PrimeVisualization\Route;

class ApplicationRoute
{
    protected $configuration;

    /**
     * @var array;
     */
    protected $request;
    
    public function __construct()
    {
        $this->init();
        # echo strtoupper(__CLASS__);
    }

    public function init() : void
    {
        $this->request['raw'] = $_REQUEST;
        #$this->request['params'] = $this->resolveRequest();
        # $this->request['configuration'] = $this->configuration;
        // @TODO
        
    }

    public function getRequest() : array
    {
        return $this->request;
    }
    
    public function setConfiguration(array $configuration) : void
    {
        $this->configuration = $configuration;
        $this->init();
    }
}
