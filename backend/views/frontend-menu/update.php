<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\FrontendMenu */

$this->title = 'Cập nhật Frontend Menu';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model,]) ?>
