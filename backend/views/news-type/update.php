<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\NewsType */

$this->title = 'Cập nhật';
$this->params['breadcrumbs'][] = ['label' => 'News Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model,]) ?>
