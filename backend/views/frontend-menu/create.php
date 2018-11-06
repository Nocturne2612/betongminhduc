<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\FrontendMenu */

$this->title = 'Tạo mới Frontend Menu';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model,]) ?>
