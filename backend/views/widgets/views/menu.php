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
            <li class="nav-parent nav-active">
                <a href="#"><i class="icon-users"></i><span>Khách hàng</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li><a target="" href="Vimo_list.html"><i class="icon-user-follow"></i> Danh sách khách hàng </a></li>
                    <li><a target="" href="Vimo_Acc_list.html"><i class="icon-wallet"></i> Danh sách tài khoản</a></li>
                    <li><a target="" href="Vimo_Cardlinked.html"><i class="icon-user-follow"></i> Thẻ/Tài khoản liên kết</a></li>
                    <li><a target="" href="Vimo_bankwithdraw.html"><i class="icon-user-follow"></i> Thẻ/Tài khoản rút tiền</a></li>
                    <li><a target="" href="Vimo_Key_integration.html"><i class="icon-user-follow"></i> Kết nối thanh toán</a></li>
                    <li><a target="" href="Vimo_Acc_Verify.html"><i class="icon-shield"></i> YC chứng thực tài khoản</a></li>
                    <li><a target="" href="Vimo_Acc_change.html"><i class="icon-user-follow"></i> YC đổi SĐT/Email </a></li>
                    <li><a target="" href="Vimo_Pass_change.html"><i class="icon-lock"></i> Quên MK đăng nhập</a></li>
                    <li><a target="" href="Danhsach_nguoidung_afiliate.html"><i class="icon-lock"></i> Danh sách người dùng Afiliate</a></li>
                </ul>
            </li>
            <li class="nav-parent">
                <a href="#"><i class="icon-settings"></i><span>Cài đặt KH</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                    <li><a href="Hanmuc_Giaodich.html"><i class="icon-user-follow"></i> Hạn mức giao dịch</a></li>

                    <li><a href="Cauhinh_hang_chungthuc.html"><i class="icon-user-follow"></i> Cấu hình hạng chứng thực</a></li>
                    <li><a href="Bat-Tat_PTXT_cua_Vimo_theo_DV.html"><i class="icon-user-follow"></i> Bật/Tắt PTXT của Vimo theo DV</a></li>
                    <li><a href="Bat-Tat_PTXT_cua_Vimo_theo_TQTLK.html"><i class="icon-user-follow"></i> Bật/Tắt PTXT của Vimo theo TQT LK</a></li>
                    <li><a href="Bat-Tat_3DSecure_NH.html"><i class="icon-user-follow"></i> Bật/Tắt 3D Secure trên NH</a></li>
                </ul>
            </li>
            <li class="nav-parent">
                <a href="#"><i class="icon-users"></i><span>Người dùng</span><span class="fa arrow"></span></a>
                <ul class="children collapse">

                    <li><a href="List_Group_merchant.html"><i class="icon-user-follow"></i> Nhóm quyền Merchant</a></li>  
                    <li><a href="Nhomquyen_danhsach.html"><i class="icon-user-follow"></i> Nhóm quyền vận hành</a></li> 
                </ul>
            </li>
        </ul>
        <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
                <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
                <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="#" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
                <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="#" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout">
                <i class="icon-power"></i></a>
        </div>
    </div>
</div>
