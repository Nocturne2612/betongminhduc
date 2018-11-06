<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\views\widgets\FooterWidget;
use frontend\views\widgets\MenuWidget;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <h1 style="display:none">Công ty TNHH Bê tông và Xây dựng Minh Đức</h1>
        <div id="fb-root">
        </div>
        <div class='top_header'>
            <div class='container'>
                <div class='top_left'>
                    <div class='relfloat limore  hidden-md hidden-lg'>
                        <a href="#menuleft"><img src="<?= Url::base(true) ?>/images/icomenu.jpg" /></a>
                    </div>
                    <div class="divLogo">
                        <a href='<?= Url::base(true) ?>'>
                            <img src="<?= Url::base(true) ?>/images/logo2.jpg" alt="logo" class="hidden-xs" />
                            <img src="<?= Url::base(true) ?>/images/logo1.jpg" alt="logo" class="hidden-sm hidden-lg hidden-md" />
                        </a>
                    </div>

                </div>
                <?= MenuWidget::widget() ?>
            </div>
        </div>

        <?= frontend\views\widgets\MenuResponsiveWidget::widget() ?>
        <div class='container main_content '>
            <?= frontend\views\widgets\SubMenuWidget::widget() ?>
            <?= $content; ?>
        </div>
        <?= FooterWidget::widget(); ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
