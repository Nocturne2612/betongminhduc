<?php

use yii\helpers\Url;
?>
<script type="text/javascript">
    $(document).ready(function () {
        try {
            $('#slider').nivoSlider({pauseTime: 3000});
        } catch (Error) {
        }
    });

</script>
<div class='banner_top hidden-sm hidden-xs'>
    <div class=''>
        <div class='slider-wrapper theme-default' style='position: relative;'>
            <div id='slider' class='nivoSlider'> 
                <?php foreach ($banners as $key => $banner) { ?>
                    <img src='<?= Url::base(true) ?>/images/banner/banner-<?= $banner['id'] ?>.jpg' alt='<?= $banner['description'] ?>'   title='#htmlcaption<?= $key ?>'/>
                <?php } ?>
            </div>
        </div>
        <?php foreach ($banners as $key => $banner) { ?>
            <div id='htmlcaption<?= $key ?>' class='nivo-html-caption'>
                <div class='title'>
                    <a href='<?= $banner['link'] ?>'><?= strtoupper($banner['title']) ?></a>
                </div>
                <div class='clear'>

                </div>
                <div class='shortdesc'><?= strtoupper($banner['description']) ?></div>
            </div>
        <?php } ?>
    </div>
</div>
