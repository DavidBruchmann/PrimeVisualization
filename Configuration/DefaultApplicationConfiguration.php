<?php

$dataDirectory = PRIME_V_DIR . 'Resources/Private/Data/';

$applicationConfiguration = [
    'defaultContentController' => '\\WDB\\PrimeVisualization\\Application\\Contoller\\DefaultWebController',
    'defaultContentControllerArguments' => [
    
    ],
    'dataDirectory' => $dataDirectory,
    'dataDirectoryFiles' => [
        'MersennePrimeExponentsFile' => '',
    ],
    'defaultView' => [
        'type' => 'html',
        'enabledFeatures' => [
            'moduleNavigation' => ['top', 'horizontal', 'fixed', 'hideButton' => true],
            'staticPages' => [
                'enable' => true,
                'srcDir' => $dataDirectory . '/Static/',
                'files' => [
                    /*
                    'display' => [
                        [
                            'file' => 'example.html',
                            'navTitle' => 'Example',
                        ],
                        [
                            'file' => 'example2.html',
                            'navTitle' => 'example 2',
                        ],
                    ],
                    */
                    'display' => '_auto_',
                    'autoConfiguration' => [
                        'blacklist' => [
                            '.htaccess',
                            '.htpassword',
                            '.git',
                            '.gitignore',
                            '.gitkeep',
                        ],
                        'whitlist' => [],
                        'fileTypes' => [
                            'html',
                            'txt',
                            'md',
                            'php',
                        ],
                        'sortBy' => [ // @TODO: list options here
                            'title' => ['navTitle', 'ASC'],
                            // 'filename' => ['navTitle', 'ASC'],
                            // 'modificationDateTime' => ['navTitle', 'ASC'],
                            // 'creationDateTime' => ['navTitle', 'ASC'],
                        ],
                        'defaultPage' => [
                            'file' => 'index.html',
                            'navTitle' => 'Home'
                        ],
                    ]
                ],
                'recursive' => 'true',
                'navigation' => ['left', 'vertical', 'fixed', 'hideButton' => true],
            ],
        ],
    ]
];