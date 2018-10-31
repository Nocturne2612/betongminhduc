<?php

use backend\assets\AppsAsset;
use yii\helpers\Url;
?>
<div class="topbar">
    <div class="header-left">
        <div class="topnav">
            <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
        </div>
    </div>
    <div class="header-right">
        <ul class="header-menu nav navbar-nav">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <li class="dropdown" id="notifications-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-danger badge-header">6</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header clearfix">
                        <p class="pull-left">12 Pending Notifications</p>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list withScroll" data-height="220">
                            <li>
                                <a href="#">
                                    <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                                    Steve have rated your photo
                                    <span class="dropdown-time">Just now</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-footer clearfix">
                        <a href="#" class="pull-left">See all notifications</a>
                        <a href="#" class="pull-right">
                            <i class="icon-settings"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END NOTIFICATION DROPDOWN -->

            <!-- BEGIN USER DROPDOWN -->
            <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img src="<?= Url::base(true) ?>/templates/assets/global/images/avatars/user1.png">
                    <span class="username">Hi, <?= Yii::$app->user->identity->username ?> </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="icon-user"></i><span>Thông tin cá nhân</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-lock"></i><span>Đổi mật khẩu</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-settings"></i><span>Cài đặt</span></a>
                    </li>
                    <li>
                        <a href="<?= Url::base(true) ?>/site/logout"><i class="icon-logout"></i><span>Thoát</span></a>
                    </li>
                </ul>
            </li>
            <!-- END USER DROPDOWN -->

        </ul>
    </div>
    <!-- header-right -->
</div>
