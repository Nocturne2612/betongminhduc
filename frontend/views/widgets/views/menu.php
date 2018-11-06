<?php

use common\components\utils\UrlComponent;
?>
<div class='top_right'>
    <div class="top_menu hidden-xs hidden-sm">
        <ul >
            <li>
                <a style='background:none; margin-left:0; padding-left:0;' href="<?= UrlComponent::getHomeUrl() ?>">Trang chủ</a>
            </li>
            <?php
            if ($menus) { 
                foreach ($menus as $key => $menu) {
                    if (empty($menu['parent_id'])) {
                        ?>
                        <li>
                            <a href="<?= yii\helpers\Url::base(true) . $menu['url'] ?>"><?= $menu['name'] ?></a>
                            <ul>
                                <?php
                                foreach ($menus as $value) {
                                    if ($value['parent_id'] == $menu['id']) {
                                        ?>
                                        <li>
                                            <a href='<?= yii\helpers\Url::base(true) . $value['url'] ?>l'><?= $value['name'] ?></a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                }
            }
            ?>
        </ul>
    </div>
    <div class="top_search">
        <form id="form1" method="get" action="http://betongminhduc.com/home/search.aspx">                
            <div >

                <div style='overflow: hidden'>
                    <input class="inputSearch" style="outline: none; height: 35px; border: 1px solid #ddd; border-radius:20px; width:140px; padding: 0 10px; padding-right:40px;
                           font-style: italic; color: #777777" type="text" name="q"                                
                           value=""/>
                    <input class="btnSearch" type="submit" value=""/>
                </div>
            </div>                                   
        </form>
    </div>
</div>