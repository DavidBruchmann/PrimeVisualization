<?php

namespace WDB\PrimeVisualizationInstaller\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
# use WDB\PrimeVisualization\Utility\ModuleUtility;

class ModuleInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 26);
        if ('primevisualization/module-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install module, PrimeVisualization modules ' .
                'should always start their package name with ' .
                '"primevisualization/module-".' .
                '<br/>Current package is "' . $package . '".' .
                '<br/>The calculate $prefix is "' . $prefix . '".'
            );
        }
        return 'Classes/Modules/' . ucfirst(substr($package->getPrettyName(), 26));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'primevisualization-module' === $packageType;
    }
}
