<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\model\Categories;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="well fillter">
    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'class' => 'form-inline md6'
                ]
    ]);
    ?>
    <div class="input-group">
        <label class="small">ID</label>
        <?= $form->field($model, 'id')->textInput(['class' => 'form-control', 'type' => 'text'])->label(false); ?>
    </div>
    <div class="input-group">
        <label class="small">Tên sản phẩm</label>
        <?= $form->field($model, 'title')->textInput(['class' => 'form-control', 'type' => 'text'])->label(false); ?>
    </div>
    <div class="input-group">
        <label class="small">Danh mục</label>
        <?=
        $form->field($model, 'cate_id')->dropDownList(
                ArrayHelper::map(Categories::find()->where(['status' => 1])->all(), 'id', 'title')
                , [
            'prompt' => 'Tất cả',
            'class' => 'form-control',
                ]
        )->label(false);
        ?>
    </div>
    <div class="input-group">
        <label class="small">Trạng thái</label>
        <?=
        $form->field($model, 'status')->dropDownList(
                [
            '1' => 'Đang hoạt động',
            '0' => 'Đang khóa',
                ], [
            'prompt' => 'Tất cả',
            'class' => 'form-control',
                ]
        )->label(false);
        ?>	
    </div>
    <div class="searchbtn">
        <button type="submit" name="button" value="submit"class="btn btn-primary"><i class="fa fa-search" style="padding-right:0"></i></button>
        <button type="submit" name="button" value="reset" class="btn btn-default"><i class="fa fa-refresh no-margin" style="padding-right:0"></i></button>
    </div>
    <?php ActiveForm::end(); ?>
</div>
