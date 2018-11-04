<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\model\Images */

$this->title = 'Tạo mới hình ảnh';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model]) ?>

