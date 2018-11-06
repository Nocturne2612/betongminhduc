<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\model\Videos */

$this->title = 'Chi tiết video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="header">
    <h2></h2>
</div>-->
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header border-bottom bg-gray">
                <h3 class="text-primary"><?= $data['name'] ?></h3>
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
                                    <td>Tên Video:</td>
                                    <td><strong><?= $data['name'] ?></strong></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Video:</td>
                                    <td>
                                        <div class='embed-responsive embed-responsive-16by9'>
                                            <iframe class='embed-responsive-item' src='http://www.youtube.com/embed/<?= $data['code'] ?>?hl=vi_VN&amp;autoplay=0&amp;rel=0&amp;showinfo=0' frameborder='0' allowfullscreen></iframe>
                                        </div>
                                    </td>
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