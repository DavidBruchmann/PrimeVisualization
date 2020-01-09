<?php

#declare(strict_types=1);

#ini_set('display_errors', '-1');

require __DIR__ . '/vendor/autoload.php';

define('PRIME_V_DIR', __DIR__ . '/');

// OPTIONAL SET AN INDIVIDUAL PATH TO YOUR OWN CONFIGURATION FILE:
$configurationFilePath = '';
$application = new \WDB\PrimeVisualization\Bootstrap\ApplicationBootstrap($configurationFilePath);
$application->run();

echo "\n" . '<br>- - - - - - - - - - - - - - - - - - - - <br>' . "\n";
echo 'EOF (index.php)';
