<?php

namespace common\components\utils;

use yii\helpers\Url;

class UrlComponent {

    public static function getHomeUrl() {
        return Url::base(true);
    }

    //Backend
    // User
    public static function getLogout() {
        return Url::base(true) . "/user/logout";
    }

    public static function getLogin() {
        return Url::base(true) . "/user/login";
    }

    //Frontent
    //Product
    public static function getProductDetail($id) {
        return Url::base(true) . "/product/detail?id={$id}";
    }

    //Images
    public static function getImage($fileName) {
        if (!file_exists(\Yii::getAlias('@frontend').'/web/images/' . $fileName)) {
            return '/images/no-image.png';
        }
        return '/images/' . $fileName;
    }

}
