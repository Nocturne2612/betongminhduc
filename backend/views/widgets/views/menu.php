<?php

use yii\helpers\Url;
?>
<div class="sidebar">
    <div class="logopanel">
        <h1>
            <a href="<?= Url::base(true) ?>"></a>
        </h1>
    </div>
    <div class="sidebar-inner">
        <ul class="nav nav-sidebar">
            <li><a href="<?= Url::base(true) ?>"><i class="icon-home"></i><span>Trang chủ</span></a></li>
            <?php foreach ($menus as $menu) { ?>
                <li class="nav-parent">
                    <a href="<?= Url::base(true) ?><?= $menu['url'] ?>"><i class="<?= $menu['icon'] ?>"></i><span><?= $menu['name'] ?></span></a>
                    <?php if (!empty($menu['child'])) { ?>
                        <ul class="children collapse">
                            <?php foreach ($menu['child'] as $child) { ?>
                                <li><a href="<?= Url::base(true) ?><?= $child['url'] ?>"><?= $child['name'] ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
