<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\model\NewsType */

$this->title = 'Tạo mới';
$this->params['breadcrumbs'][] = ['label' => 'News Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<?= $this->render('_form', ['model' => $model,]) ?>
