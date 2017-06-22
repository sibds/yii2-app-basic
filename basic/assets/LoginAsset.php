<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 29.04.17
 * Time: 17:54
 */

namespace app\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'iCheck/icheck.min.js',
        // more plugin Js here
    ];
    public $css = [
        'iCheck/square/blue.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}