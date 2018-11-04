<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\model\Products */

$this->title = 'Chi tiết sản phẩm';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="header">
    <h2></h2>
</div>-->
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header border-bottom bg-gray">
                <h3 class="text-primary"><?= $data['title'] ?></h3>
            </div>
            <div class="panel-content p-0">
                <div class="box box-solid ">
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="border-top: none;" width="35%">ID:</td>
                                    <td style="border-top: none;" width="65%"><?= $data['id'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tên sản phẩm:</td>
                                    <td><strong><?= $data['title'] ?></strong></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Ảnh đại diện:</td>
                                    <td><img scr="<?= \common\components\utils\UrlComponent::getImage('product-' . $data['id'] . '.jpg') ?>" alt="<?= $data['title'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Tên danh mục:</td>
                                    <td>
                                        <strong>
                                            <?= !empty($data['cate_id']) ? \backend\models\model\Categories::find()->where(['id' => $data['cate_id']])->one()->getAttribute('title') : 'Chưa có danh mục' ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mô tả:</td>
                                    <td>
                                        <textarea><?= $data['description'] ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nội dung:</td>
                                    <td><textarea><?= $data['content'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td>
                                        <?php $status = \common\components\utils\StatusUtil::mappingstatus($data['status']) ?>
                                        <span class="<?= $status['class'] ?>"><?= $status['value'] ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <div class="box-footer text-center">
            <?php foreach ($data['option'] as $option) { ?>
                <a href="<?= $option->action ?>" class="<?= $option->class ?>"><?= $option->name ?></a>
            <?php } ?>
        </div> 
    </div>
</div>
