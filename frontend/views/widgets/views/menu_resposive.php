<script type="text/javascript">
    $(document).ready(function () {
        $('nav#menuleft').mmenu({
            navbar: {title: ""},
            offCanvas: {
                position: "left"
            }
        });
    });
    $(window).resize(function () {
        var API = $("nav#menuleft").data("mmenu");
        API.close();
    });
</script>
<nav id="menuleft" class='hidden-md hidden-lg'>
    <div class='floatmenu'>            
        <div class='floatmenus'>
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= \common\components\utils\UrlComponent::getHomeUrl() ?>">Trang chủ</a>
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
    </div>
</nav>