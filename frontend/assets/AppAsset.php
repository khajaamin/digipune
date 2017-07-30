<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'web/css/bootstrap.min.css',
        'web/css/bootstrap-select.css',
        'web/css/style.css',
        'web/css/jquery.uls.css',
        'web/css/jquery.uls.grid.css',
        'web/css/jquery.uls.lcd.css',
        'css/custom.css'
    ];
    public $js = [
        'web/js/jquery.min.js',
        'web/js/bootstrap.min.js',
        'web/js/bootstrap-select.js',
        'web/js/jquery.leanModal.min.js',
        'web/js/jquery.uls.data.js',
        'web/js/jquery.uls.data.utils.js',
        'web/js/jquery.uls.lcd.js',
        'web/js/jquery.uls.languagefilter.js',
        'web/js/jquery.uls.regionfilter.js',
        'web/js/jquery.uls.core.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
