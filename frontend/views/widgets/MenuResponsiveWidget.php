<?php

namespace frontend\views\widgets;

use yii\base\Widget;
use backend\models\model\FrontendMenu;

class MenuResponsiveWidget extends Widget {

//    public $menuGroup;

    public function run() {
        $menus = FrontendMenu::find()->asArray()->where(['status' => 1])->all();
        return $this->render('menu_resposive', [
                    'menus' => $menus,
        ]);
    }

}
