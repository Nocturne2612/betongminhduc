<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" id="login-block">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall account-wall-img">
                <img src="<?= yii\helpers\Url::base(true) ?>/templates/assets/global/images/logo/logo2.jpg" alt="">
                <?php
                $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => [
                                'class' => 'form-signin',
                                'autocomplete' => 'off'
                            ]
                        ])
                ?>
                <?=
                $form->field($model, 'username', [
                    "template" => '{input}<i class="icon-user"></i>{error}',
                    'errorOptions' => ['class' => 'form-alert'],
                    'options' => ['class' => 'append-icon']
                ])->textInput(['id' => 'login-username', 'class' => 'form-control form-white username', 'placeholder' => 'Tài khoản'])
                ?>
                <?=
                $form->field($model, 'password', [
                    "template" => '{input}<i class="icon-lock"></i>{error}',
                    'errorOptions' => ['class' => 'form-alert'],
                    'options' => ['class' => 'append-icon']
                ])->passwordInput(['id' => 'login-username', 'class' => 'form-control form-white password', 'placeholder' => 'Mật khẩu'])
                ?>
                <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-lg btn-danger btn-block ladda-button']) ?>
                <?php
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
    <p class="account-copyright">
        <span>Copyright © 2018 </span> - CÔNG TY TNHH BÊ TÔNG VÀ XÂY DỰNG MINH ĐỨC</span>
    </p>
</div>
