<?php

namespace WDB\PrimeVisualization\Context;

use \WDB\PrimeVisualization\Route\ApplicationRoute;
use \WDB\PrimeVisualization\Request\ApplicationRequest;
use \WDB\PrimeVisualization\Configuration\ApplicationConfiguration;

class ApplicationContext
{
    /**
     * @var \WDB\PrimeVisualization\Route\ApplicationRoute
     */
    protected $route;

    /**
     * @var \WDB\PrimeVisualization\Configuration\ApplicationConfiguration
     */
    protected $configuration;

    /**
     * @var \WDB\PrimeVisualization\Request\ApplicationRequest
     */
    protected $request;

    /**
     * Constructor
     *
     * @param \WDB\PrimeVisualization\Route\ApplicationRoute $route
     * @param \WDB\PrimeVisualization\Configuration\ApplicationConfiguration $configuration
     * @param \WDB\PrimeVisualization\Request\ApplicationRequest $request
     */
    public function __construct(ApplicationRoute $route, ApplicationConfiguration $configuration, ApplicationRequest $request)
    {
        $this->setRoute($route);
        $this->setConfiguration($configuration);
        $this->setRequest($request);
        # var_dump([$this->route, $this->configuration, $this->request]);
    }

    /**
     * Get the Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Get the Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the Route
     *
     * @param \WDB\PrimeVisualization\Route\ApplicationRoute $route
     */
    public function setRoute(ApplicationRoute $route)
    {
        $this->route = $route;
    }

    /**
     * Set the Configuration
     *
     * @param \WDB\PrimeVisualization\Configuration\ApplicationConfiguration $configuration
     */
    public function setConfiguration(ApplicationConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Set the Request
     *
     * @param \WDB\PrimeVisualization\Request\ApplicationRequest $request
     */
    public function setRequest(ApplicationRequest $request)
    {
        $this->request = $request;
    }
}
