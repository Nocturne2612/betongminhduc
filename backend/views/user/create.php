<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\model\User */

$this->title = 'Tạo tài khoản';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên tài khoản</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-white', 'autofocus' => true])->label(false) ?> 
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mật khẩu</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <label class="col-sm-3 control-label"> </label>
                        <div class="col-sm-8 col-lg-5">
                            <!--<a class="btn btn-white" href="#" aria-expanded="true">Thoát</a>-->
                            <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
