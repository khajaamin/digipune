<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        '../css/custom.css',
        'sb/dist/css/sb-admin-2.min.css',
        'sb/vendor/font-awesome/css/font-awesome.min.css'
    ];
    public $js = [
        
        'sb/vendor/metisMenu/metisMenu.min.js',
        'sb/dist/js/sb-admin-2.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
