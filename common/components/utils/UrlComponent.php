<?php

namespace common\components\utils;

use yii\helpers\Url;

class UrlComponent {

    public static function getHomeUrl() {
        return Url::base(true);
    }

    // User
    public static function getLogout() {
        return Url::base(true) . "/user/logout";
    }

    public static function getLogin() {
        return Url::base(true) . "/user/login";
    }

    //Images
    public static function getImage($fileName, $authToken) {
        if (empty($fileName)) {
            return Url::base(true) . "/images/no-avatar.png";
        }
        return \Yii::$app->params['apiUrl']['media'] . "/media/files/{$fileName}?authToken={$authToken}";
    }

}