<?php

use backend\models\model\NewsCategories;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\NewsCategoriesSearch */
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
        <label class="small">Tên nhóm tin tức</label>
        <?= $form->field($model, 'title')->textInput(['class' => 'form-control', 'type' => 'text'])->label(false); ?>
    </div>
    <div class="input-group">
        <label class="small">Nhóm cha</label>
        <?=
        $form->field($model, 'parent_id')->dropDownList(
                ArrayHelper::map(NewsCategories::find()->where(['status' => 1, 'parent_id' => null])->all(), 'id', 'title')
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
