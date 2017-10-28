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
        'css/bootstrap.min.css',
        'font-awesome/css/font-awesome.css',
        'css/plugins/slick/slick.css',
        'css/plugins/slick/slick-theme.css',
        'css/animate.css',
        'css/style.css',
        'css/zlm.css',

    ];
    public $js = [
        'js/jquery-3.1.1.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/bootstrap.min.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        'js/plugins/slick/slick.min.js',
        'js/zlm.js',

    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

