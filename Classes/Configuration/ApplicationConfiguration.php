<?php

namespace WDB\PrimeVisualization\Configuration;

class ApplicationConfiguration
{

    protected $configurationFilePath = '';

    public function __construct($configurationFilePath)
    {
        $this->configurationFilePath = $configurationFilePath;
        return $this->getConfiguration();
    }
    
    public function getConfiguration()
    {
        # var_dump(['$this->configurationFilePath' => $this->configurationFilePath, file_get_contents($this->configurationFilePath)]);
        if ($this->configurationFilePath) {
            if (!is_file($this->configurationFilePath)) {
                throw new \InvalidArgumentException('$configurationFilePath is not a valid path.');
            }
        } else {
            // @TODO: ?
            throw new \InvalidArgumentException('$configurationFilePath is not given.');
        }
        require($this->configurationFilePath);
        if ($this->validate($applicationConfiguration)) {
            return $applicationConfiguration;
        }
    }
    
    protected function validate($applicationConfiguration)
    {
        // @TODO: add validation of configuration-params and values
        if (1 === 0) {
            return false;
        }
        return true;
    }
}
