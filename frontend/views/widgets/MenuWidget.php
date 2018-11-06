<?php

namespace frontend\views\widgets;

use backend\models\model\FrontendMenu;
use yii\base\Widget;

class MenuWidget extends Widget {

    public $datas;

    public function run() {
        $menus = FrontendMenu::find()->asArray()->where(['status' => 1])->all();
        return $this->render('menu', [
                    'menus' => $menus
        ]);
    }

}
