<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use common\components\utils\UrlComponent;

$this->title = 'Trang chủ';
?>
<div class='container'>
    <div class='home_product'>
        <div class='jcarousel-wrapper'>
            <div class='jcarousel'>
                <ul class='row'>
                    <?php
                    foreach ($categories as $cate) {
                        ?>
                        <li class='col-lg-4 col-md-4 col-sm-6 col-xs-12'>
                            <div class='img'><div><a  href='san-pham/index.html'><img src='<?= Url::base(true) ?>/files/Uploads/news/2016/06/13/tin_tuc_03Thumb.jpg' /></a></div></div>
                            <div class='right'>
                                <div class='title'><a href='san-pham/index.html'><?= $cate['title'] ?></a></div>
                                <div class='shortdesc'><?= strlen($cate['description']) > 150 ? substr($cate['description'], 0, 147) . '...' : $cate['description'] ?></div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <a href='#' class='jcarousel-control-prev'>&lsaquo;</a>
            <a href='#' class='jcarousel-control-next'>&rsaquo;</a>
        </div>
    </div>
    <div class="home_company">
        <div class="header_title">Hệ thống nhà máy Minh Đức</div>

        <ul>
            <ul>
                <li class='item col1'>
                    <div class='content'>
                        <div class='coname'>Minh Đức Hải Phòng</div>
                        <div class='coproduct'>Cọc tròn<br>Cọc vuông</div>
                    </div>
                </li>
                <li class='item col2'>
                    <div class='content'>
                        <div class='coname'>Minh Đức Sơn Tây</div>
                        <div class='coproduct'>Cọc tròn/Cọc vuông<br>Ống cống<br>Tấm sàn Hollow-core</div>
                    </div>
                </li>
                <li class='item col3'>
                    <div class='content'>
                        <div class='coname'>Minh Đức Quảng Ninh</div>
                        <div class='coproduct'>Cọc tròn/Cọc vuông<br>Ống cống<br>Tấm sàn Hollow-core</div>
                    </div>
                </li>
                <li class='item col4'>
                    <div class='content'>
                        <div class='coname'>Minh Đức Quảng Bình</div>
                        <div class='coproduct'>Cọc tròn</div></div>
                </li>
            </ul>

        </ul>

    </div>
    <div class='home_project'>
        <div class='header_title'><h2>Dự án tiêu biểu</h2></div> 
        <ul class='row'>
            <?php foreach ($products as $product) { ?>
                <li class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
                    <div class='content'>
                        <a class='img' href='<?= UrlComponent::getProductDetail($product['id']) ?>'><div><img alt='<?= $product['title'] ?>' src='<?= UrlComponent::getImage('product/product-' . $product['id']) ?>' style="max-height: 210px" /></div></a>
                        <div class='title'><h3><a href='<?= UrlComponent::getProductDetail($product['id']) ?>'><?= $product['title'] ?></a></h3></div>
                        <div class='shortdesc'><?= $product['description'] ?></div>
                        <a href='<?= UrlComponent::getProductDetail($product['id']) ?>' class='viewmore hidden-xs'>Xem tiếp</a>
                    </div>
                </li>
            <?php } ?>

        </ul>
    </div>
</div>
<script type="text/javascript">
    (function ($) {
        $(function () {
            var jcarousel = $('.jcarousel');
            jcarousel
                    .on('jcarousel:reload jcarousel:create', function () {
                        var carousel = $(this),
                                width = carousel.innerWidth();
                        
                        if (width >= 990) {
                            width = width / 3;
                        } else
                        if (width >= 768) {
                            width = width / 2;
                        } else if (width >= 350) {
                            width = width;
                        }
                        carousel.jcarousel('items').css('width', Math.ceil(width) + 'px').jcarouselAutoscroll({
                            interval: 5000,
                            target: '+=1',
                            autostart: true
                        });
                    })
                    .jcarousel({
                        auto: 1,
                        vertical: false,
                        wrap: 'circular',
                        scroll: 1,
                        animation: 2000
                    });
            
            $('.jcarousel-control-prev')
                    .jcarouselControl({
                        target: '-=1'
                    });
            
            $('.jcarousel-control-next')
                    .jcarouselControl({
                        target: '+=1'
                    });
            
            $('.jcarousel-pagination')
                    .on('jcarouselpagination:active', 'a', function () {
                        $(this).addClass('active');
                    })
                    .on('jcarouselpagination:inactive', 'a', function () {
                        $(this).removeClass('active');
                    })
                    .on('click', function (e) {
                        e.preventDefault();
                    })
                    .jcarouselPagination({
                        perPage: 1,
                        item: function (page) {
                            return '<a href="#' + page + '">' + page + '</a>';
                        }
                    });
        });
    })(jQuery);
</script>