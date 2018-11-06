<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\model\Banner */

$this->title = 'Chi tiết banner';
$this->params['breadcrumbs'][] = ['label' => 'Banners', 'url' => ['index']];
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
                                    <td>Tên banner:</td>
                                    <td><strong><?= $data['title'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Hình ảnh:</td>
                                    <td><img src="<?= \common\components\utils\UrlComponent::getImage('banner/banner-' . $data['id'] . '.jpg') ?>" alt="<?= $data['title'] ?>" style="max-width:150px; max-height:  100px" /></td>
                                </tr>
                                <tr>
                                    <td>Đường dẫn:</td>
                                    <td><strong><?= $data['link'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Mô tả:</td>
                                    <td><strong><?= $data['description'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Vị trí hiển thị:</td>
                                    <td><strong><?= $data['position'] ?></strong></td>
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


