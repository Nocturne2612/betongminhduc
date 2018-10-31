<?php

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;

LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" href="<?= Url::base(true) ?>/templates/assets/global/images/favicon.png" type="image/x-icon"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode("Login") ?></title>
        <?php $this->head() ?>
    </head>
    <body class="account separate-inputs" data-page="login">
        <?php $this->beginBody() ?>
        <?= $content; ?>
        <?php $this->endBody() ?>
        <script type="text/javascript">
            var baseUrl = "<?= Url::base(true) ?>/";
        </script>
    </body>
</html>
<?php $this->endPage() ?>