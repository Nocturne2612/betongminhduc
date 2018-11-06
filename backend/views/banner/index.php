<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách banner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <h2><?= Html::encode($this->title) ?></h2>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="panel">
            <div class="panel-content p-0">
                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th style="text-align: center;">STT</th>
                            <th>ID</th>
                            <th>Tên banner</th>
                            <th>Hình ảnh</th>
                            <th>Đường dẫn</th>
                            <th>Mô tả</th>
                            <th>Thứ tự</th>
                            <th style="text-align: center;">Trạng thái</th>
                            <th style="text-align: right;">
                                <?= Html::a('Tạo mới', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datas as $data) {
                            ?>
                            <tr class="">
                                <td align="center"><?= $no ?></td>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['title'] ?></td>
                                <td><img src="<?= \common\components\utils\UrlComponent::getImage('banner/banner-' . $data['id'] . '.jpg') ?>" alt="<?= $data['title'] ?>" style="max-width:150px; max-height:  100px" /></td>
                                <td><?= $data['link'] ?></td>
                                <td><?= strlen($data['description']) > 150 ? substr($data['description'], 0, 150) . '...' : $data['description'] ?></td>
                                <td><?= $data['position'] ?></td>
                                <td align="center">
                                    <?php $status = \common\components\utils\StatusUtil::mappingstatus($data['status']) ?>
                                    <span class="<?= $status['class'] ?>"><?= $status['value'] ?></span>
                                </td>
                                <td align="right">
                                    <div class="dropdown otherOptions pull-right">
                                        <a href="#" class="dropdown-toggle btn btn-default btn-sm" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-settings"></i> <span class="caret"></span></a>
                                        <ul class="dropdown-menu right" role="menu">
                                            <?php foreach ($data['option'] as $option) { ?>
                                                <li>
                                                    <a href="<?= $option->action ?>"><i class="<?= $option->icon ?>"></i> <?= $option->name ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Begin phan trang -->
        <!--        <div class="row">
                    <div class="col-md-5">
                        <ul class="pagination no-margin pull-left">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
        
                    </div>
                </div>-->

    </div>
</div>