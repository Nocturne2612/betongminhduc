<?php

namespace backend\models\form;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class ResetPasswordForm extends Model {

    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function resetPassword($id) {
        if (!$this->validate()) {
            return null;
        }
        $userModel = User::findOne(['id' => $id]);

        return $userModel->updateAttributes(['password_hash' => \Yii::$app->security->generatePasswordHash($this->password)]);
    }

}
