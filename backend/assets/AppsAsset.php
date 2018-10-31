<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AppsAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'templates/assets/global/css/style.css',
        'templates/assets/global/css/theme.css',
        'templates/assets/global/css/ui.css',
        'templates/assets/global/css/custom.css',
        'templates/assets/global/fonts/ionicons.css',
        'css/bootstrap-datetimepicker.css',
        'css/croppie.css',
        'css/common.css'
    ];
    public $js = [
        'templates/assets/global/plugins/jquery/jquery-3.1.0.min.js',
        'templates/assets/global/plugins/jquery-ui/jquery-ui.min.js',
        'templates/assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'js/bootstrap-datetimepicker.js',
        'js/jquery.zoom.min.js',
        'js/fly.js',
        'js/ejs.js',
        'js/tmpl.js',
        'js/popup.js',
        'js/croppie.js',
        'js/common.js',
        'js/firebase.js',
        'js/message.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];

}
