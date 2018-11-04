<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\Customers */

$this->title = 'Cập nhật khách hàng/đối tác';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model,]) ?>
