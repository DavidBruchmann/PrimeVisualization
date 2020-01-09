<?php

namespace WDB\PrimeVisualization\Application\Utility;

class EnvironmentUtility
{
    public static function dumpDeclaredClasses($filter = true)
    {
        $declaredClasses = get_declared_classes();
        $count = 0;
        foreach ($declaredClasses as $index => $declaredClass) {
            if (!$filter || strpos($declaredClass, '\\PrimeVisualization\\')) {
                echo ++$count . '. [' . gettype($declaredClass) . '] ' . $declaredClass . ' <em>(length=' . strlen($declaredClass) . ')</em><br/>' . "\n";
            }
        }
    }
}
