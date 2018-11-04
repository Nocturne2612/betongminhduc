<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\model\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tên sản phẩm</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'title')->textInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Ảnh đại diện</label>
                        <div class="col-sm-5 col-lg-3">
                            <?= $form->field($model, 'files')->fileInput(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Danh mục</label>
                        <div class="col-sm-5 col-lg-3">
                            <?=
                            $form->field($model, 'cate_id')->dropDownList(
                                    !empty($cateParent) ? $cateParent : []
                                    , [
                                'prompt' => 'Tất cả',
                                'class' => 'form-control form-white',
                                    ]
                            )->label(false);
                            ?>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Mô tả</label>
                        <div class="col-sm-5 col-lg-8">
                            <?= $form->field($model, 'description')->textarea(['class' => 'form-control form-white'])->label(false) ?> 
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nội dung</label>
                        <div class="col-sm-5 col-lg-8">
                            <?= $form->field($model, 'content')->textarea(['class' => 'form-control form-white'])->label(false) ?> 
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
                    <?=
                            $form->field($model, 'user_id')
                            ->hiddenInput([
                                'value' => !empty($model->user_id) ? $model->user_id : Yii::$app->user->id
                            ])
                            ->label(false)
                    ?> 
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
