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
    public static function getImage($fileName) {
        if (!file_exists("../../images/" . $fileName)) {
            return "/images/no-image.png";
        }
        return "../../images/" . $fileName;
    }

}
