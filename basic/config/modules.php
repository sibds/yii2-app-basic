<?php

$modules = [];

$moduleDir = __DIR__ . '/../modules';

if(file_exists($moduleDir)){
    $dh = opendir($moduleDir);
    $files = [];
    while (false !== ($filename = readdir($dh))) {
        if ($filename != '.' && $filename != '..') {
            if (is_dir($moduleDir . '/' . $filename)) {
                $modules[$filename] = [
                    'class' => 'app\modules\\'.$filename.'\\Module'
                ];
            }
        }
    }
}

$modules['user'] = [
    'class' => 'dektrium\user\Module',
    'admins' => ['webmaster', 'admin']
    ];
$modules['rbac'] = ['class' => 'dektrium\rbac\RbacWebModule', ];

if(YII_DEBUG){
    $modules['utility'] = [
        'class' => 'c006\utility\migration\Module',
    ];
}

return  $modules;
