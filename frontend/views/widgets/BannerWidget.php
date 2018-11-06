<?php

namespace frontend\views\widgets;

use yii\base\Widget;
use backend\models\model\Banner;

class BannerWidget extends Widget {

    public function run() {
        $banners = Banner::find()->asArray()->where(['status' => 1])->limit(5)->all();
        return $this->render('banner', [
                    'banners' => $banners,
//            'errors' => $errors,
//            'menuGroup' => $this->menuGroup
        ]);
    }

}
