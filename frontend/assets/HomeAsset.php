<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class HomeAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'common/css/bootstrap.min.css',
        'common/css/bootstrap-theme.css',
        'common/css/plugin/redmond/jquery.ui.all.css',
        'common/css/jquery.mmenu.all.css',
        'common/css/default.css',
        'common/css/nivo/font-awesome.min.css',
        'common/css/nivo/default.css',
        'common/css/nivo/nivo-slider.css',
        'common/css/text.css',
        'https://fonts.googleapis.com/css?family=Roboto%20Condensed:400,100,300,700&amp;subset=latin,latin-ext,greek-ext,greek,vietnamese,cyrillic,cyrillic-ext',
        'https://fonts.googleapis.com/css?family=Roboto%20Slab:400,100,300,700&amp;subset=latin,latin-ext,greek-ext,greek,vietnamese,cyrillic,cyrillic-ext',
        'common/css/jcarousel.responsive.css',
    ];
    public $js = [
        'common/js/jquery.js',
        'common/js/date/date.js',
        'common/js/jquery-ui.min.js',
        'common/js/jquery.mmenu.min.all.js',
        'common/js/bootstrap.js',
        'common/js/home.js',
        'common/js/validations.js',
        'common/js/md5.js',
        'common/js/fbconnecting.js',
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        'https://oss.maxcdn.com/respond/1.4.2/respond.min.js',
        'common/js/nivo/jquery.nivo.slider.js',
        'common/js/jcarousellite_1.0.1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
