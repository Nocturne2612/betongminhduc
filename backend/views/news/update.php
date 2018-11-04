<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\News */

$this->title = 'Cập nhật bài viết';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model, 'cateParent' => $cateParent]) ?>
