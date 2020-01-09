<?php

namespace WDB\PrimeVisualization\Application\Utility;

class ModuleUtility
{
    /**
     * Finds all Modules that have the part
     *    \\PrimeVisualization\\Modules
     * in namespace, no matter if it's saved in vendor-folder or module-folder.
     * The namespace allows unique combination of vendor-part and modulename.
     * The returend array has the format
     *    $availableModuleClasses[VENDOR][INDEX (0-n)] = [MODULE]
     */
    public static function getAvailableModules($devMode = false) : array
    {
        $declaredClasses = get_declared_classes();
        $availableModuleClasses = [];
        foreach ($declaredClasses as $index => $declaredClass) {
            if (strpos($declaredClass, 'PrimeVisualization\Modules')) {
                $availableModuleClasses[] = $declaredClass;
                /*
                preg_match('/^([^\\]+)\\\PrimeVisualization\\\Modules\\\([^\\]+)/', $declaredClass, $matches);
                if (!empty($matches[1]) && !empty($matches[2])) {
                    $vendor = $matches[1];
                    $module = $matches[2];
                    if (!in_array($module, $availableModuleClasses[$vendor])) {
                        if (self::checkModuleBasicRequirements($vendor, $module)) {
                            $availableModuleClasses[$vendor][] = $module;
                        } elseif ($devMode) {
                            // @TODO
                        }
                    }
                }
                */
            }
        }
        return $availableModuleClasses;
    }

    public static function getActiveModules($devMode = false) : array
    {
        $activeModules = [];
        // @TODO
        return $activeModules;
    }

    /**
     * @TODO
     */
    public static function checkModuleBasicRequirements($vendor, $module)
    {
        if (1 === 0) {
            return false;
        }
        return true;
    }
}
