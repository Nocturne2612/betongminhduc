<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\BackendMenu */

$this->title = 'Tạo mới menu backend';
$this->params['breadcrumbs'][] = ['label' => 'Backend Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model,]) ?>