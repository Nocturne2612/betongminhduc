<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-theme.css',
        'css/plugin/redmond/jquery.ui.all.css',
        'css/jquery.mmenu.all.css',
        'css/default.css',
        'css/font-awesome.min.css',
        'css/nivo/default.css',
        'css/nivo/nivo-slider.css',
        'https://fonts.googleapis.com/css?family=Roboto%20Condensed:400,100,300,700&amp;subset=latin,latin-ext,greek-ext,greek,vietnamese,cyrillic,cyrillic-ext',
        'https://fonts.googleapis.com/css?family=Roboto%20Slab:400,100,300,700&amp;subset=latin,latin-ext,greek-ext,greek,vietnamese,cyrillic,cyrillic-ext',
        'css/jcarousel.responsive.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/date/date.js',
        'js/jquery-ui.min.js',
        'js/jquery.mmenu.min.all.js',
        'js/bootstrap.js',
        'js/home.js',
        'js/validations.js',
        'js/md5.js',
        'js/fbconnecting.js',
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        'js/nivo/jquery.nivo.slider.js',
        'js/jcarousellite_1.0.1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
}
