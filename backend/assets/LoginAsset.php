<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class LoginAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'templates/assets/global/css/style.css',
        'templates/assets/global/css/ui.css',
        'templates/assets/global/css/custom.css',
        'templates/assets/global/plugins/bootstrap-loading/lada.min.css'
    ];
    public $js = [
        'templates/assets/global/plugins/gsap/main-gsap.min.js',
        'templates/assets/global/plugins/tether/js/tether.min.js',
        'templates/assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'templates/assets/global/plugins/backstretch/backstretch.min.js',
        'templates/assets/global/plugins/bootstrap-loading/lada.min.js',
        'templates/assets/global/js/pages/login-v1.js'
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];

}
