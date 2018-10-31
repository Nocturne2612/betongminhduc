<?php

use backend\views\widgets\MenuWidget;
use backend\views\widgets\HeaderWidget;
use backend\views\widgets\FooterWidget;
use backend\assets\AppsAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppsAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" href="" type="image/x-icon"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="sidebar-top fixed-topbar fixed-sidebar bg-light-default theme-sdtd color-default">
        <?php $this->beginBody() ?>
        <section>
            <!-- Menu -->
            <?= MenuWidget::widget(); ?>
            <div class="main-content">
                <!-- Header -->
                <?= HeaderWidget::widget(); ?>
                <div class="page-content">
                    <?= $content; ?>
                    <!-- Footer-->
                    <?= FooterWidget::widget(); ?>
                </div>
            </div>
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>