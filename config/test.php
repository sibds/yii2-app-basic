<?php
$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/test_db.php');
$view = require(__DIR__ . '/view.php');

$modules = array_merge([], require(__DIR__ . '/modules.php'));
$modules['user']['enableConfirmation'] = false;

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),    
    'language' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => $modules,
    'components' => [
        'db' => $db,
        'mailer' => [
            'useFileTransport' => true,
        ],
        'assetManager' => [            
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
            'enableConfirmation' => false,
        ],        
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            
            /*'csrfCookie' => [
                'domain' => 'localhost',
            ],*/
        ],    
        'view' => $view,    
    ],
    'params' => $params,
];
