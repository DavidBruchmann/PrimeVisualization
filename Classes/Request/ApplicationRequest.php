<?php

namespace WDB\PrimeVisualization\Request;

class ApplicationRequest
{
    protected $configuration;

    /**
     * @var array;
     */
    protected $request;
    
    public function __construct()
    {
        $this->init();
    }

    public function init() : void
    {
        $this->request['raw'] = $_REQUEST;
        # $this->request['params'] = $this->resolveRequest();
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
