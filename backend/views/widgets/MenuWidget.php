<?php

namespace backend\views\widgets;

use apps\modules\user\models\service\MenuService;
use common\models\enum\OperatorEnum;
use yii\base\Widget;

class MenuWidget extends Widget {

    public $userInfo;
    public $menuGroup;

    public function run() {
//        $authToken = isset($this->userInfo->authToken) ? $this->userInfo->authToken : null;
//        $menuService = new MenuService($authToken);
//        $menuData = $menuService->searchList($this->buildSearch());
//        $errors = [];
//        $menus = [];
//        if ($menuData->success) {
//            $roles = isset($this->userInfo->roles) ? $this->userInfo->roles : null;
//            $menus = MenuService::getMenuByRoles(!empty($menuData->datas['body']['content']) ? $menuData->datas['body']['content'] : [], $roles);
//        } else {
//            $errors[] = $menuData->message;
//        }
        return $this->render('menu', [
//            'menus' => $menus,
//            'errors' => $errors,
//            'menuGroup' => $this->menuGroup
        ]);
    }
    
    private function buildSearch($request = []) {
        $request['filters'][] = ['field' => 'status', 'operator' => OperatorEnum::EQUAL, 'value' => 'ACTIVE'];
        $request['sorts'][] = ['field' => 'position', 'order' => 'ASC'];
        
        return $request;
    }

}
