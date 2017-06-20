<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 07.06.17
 * Time: 20:38
 */
namespace app\assets;

use yii\web\AssetBundle;

class AdminLtePluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

    public $js = [
        //'datatables/dataTables.bootstrap.min.js',
        // more plugin Js here
    ];
    public $css = [
        //'datatables/dataTables.bootstrap.css',
        // more plugin CSS here
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}