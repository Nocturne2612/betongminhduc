<?php

namespace backend\views\widgets;

use yii\base\Widget;
//use common\models\model\Option;
//use common\models\enum\DefaultEnum;
//use apps\modules\user\models\service\AgentsService;

class HeaderWidget extends Widget {

    public $userInfo;

    public function run() {
//        $roles = isset($this->userInfo->roles) ? $this->userInfo->roles : null;
//        $accessToken = isset($this->userInfo->authToken) ? $this->userInfo->authToken : null;
//        $userId = isset($this->userInfo->id) ? $this->userInfo->id : null;
//        $agentsService = new AgentsService($accessToken);
//        $agentData = $agentsService->getById($userId);
//        $errors = [];
//        if(!$agentData->success){
//            $errors[] = $agentData->message;
//        }
        return $this->render('header', [
//            'errors' => $errors,
//            'userInfo' => $agentData->datas['body'],
//            'actionInfo' => $this->getActionInfo($roles, $this->userInfo)
        ]);
    }

    private function getActionInfo($roles, $userInfo, $result = []) {
        if (in_array('USER_AGENTS_INFOEDIT', $roles, true)) {
            $option = new Option();
            $option->type = DefaultEnum::TYPE_OPTION_BUTTON;
            $option->name = 'Đổi thông tin cá nhân';
            $option->icon = 'icon-user';
            $option->action = "agents.infoEdit({$userInfo['id']}, '{$userInfo['fullname']}', '{$userInfo['mobile']}', '{$userInfo['email']}')";
            $result[] = $option;
        }
        
        if (in_array('USER_AGENTS_CHANGEPASS', $roles, true)) {
            $option = new Option();
            $option->type = DefaultEnum::TYPE_OPTION_BUTTON;
            $option->name = 'Đổi mật khẩu';
            $option->icon = 'icon-lock';
            $option->action = 'agents.changePassword()';
            $result[] = $option;
        }
        return $result;
    }

}
