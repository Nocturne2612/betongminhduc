<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\model\BackendMenu */

$this->title = 'Create Backend Menu';
$this->params['breadcrumbs'][] = ['label' => 'Backend Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backend-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
