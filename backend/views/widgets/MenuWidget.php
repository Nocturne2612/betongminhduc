<?php

namespace backend\views\widgets;

use backend\models\model\BackendMenu;
use yii\base\Widget;

class MenuWidget extends Widget {

//    public $menuGroup;

    public function run() {
        $datas = BackendMenu::find()->where(['status' => 1])->orderBy(['position' => SORT_ASC])->all();
        $menus = BackendMenu::_formatMenus($datas);
        
        return $this->render('menu', [
                    'menus' => $menus,
//            'errors' => $errors,
//            'menuGroup' => $this->menuGroup
        ]);
    }

}
