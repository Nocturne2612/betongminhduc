<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\model\NewsCategories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\model\NewsCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên nhóm tin tức</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'title')->textInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nhóm cha</label>
                        <div class="col-sm-5 col-lg-3">
                            <?=
                            $form->field($model, 'parent_id')->dropDownList(
                                    ArrayHelper::map(NewsCategories::find()->where(['status' => 1, 'parent_id' => null])->all(), 'id', 'title')
                                    , [
                                'prompt' => 'Tất cả',
                                'class' => 'form-control form-white',
                                    ]
                            )->label(false);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Meta title</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'meta_title')->textInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Meta description</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'meta_description')->textInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Meta keyword</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'meta_keyword')->textInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Trạng thái</label>
                        <div class="col-sm-5 col-lg-3">
                            <?=
                            $form->field($model, 'status')->dropDownList(
                                    [
                                '1' => 'Đang hoạt động',
                                '0' => 'Đang khóa',
                                    ], [
                                'class' => 'form-control form-white col-md-6',
                                    ]
                            )->label(false);
                            ?>
                        </div>
                    </div>
                    <?= $form->field($model, 'created_at')->hiddenInput(['value' => !empty($model->created_at) ? $model->created_at : time()])->label(false) ?> 
                    <?= $form->field($model, 'updated_at')->hiddenInput(['value' => time()])->label(false) ?> 
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
