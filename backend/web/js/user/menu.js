var menu = {};
menu.addMenu = function () {
    popup.open('menu-addmenu', 'Thêm mới một menu', template('user/menu/add_menu.tpl', {
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'menu-addmenu-form',
                    service: 'user/service/menu/create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('menu-addmenu');
                            location.reload();
                        } else {
                            popup.msg(result.message);
                        }
                    }
                });
            }
        },
        {
            title: 'Bỏ qua',
            style: 'btn-default',
            fn: function () {
                popup.close('menu-addmenu');
            }
        }
    ], 'modal-lg');
};

menu.editMenu = function (id) {
    fly.ajax({
        service: 'user/service/menu/getone',
        method: "POST",
        loading: true,
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                popup.open('menu-editmenu', 'Sửa một menu', template('user/menu/edit_menu.tpl', {
                    data: result.datas.body
                }), [
                    {
                        title: 'Xác nhận',
                        style: 'btn-primary',
                        fn: function () {
                            fly.submit({
                                id: 'menu-editmenu-form',
                                service: 'user/service/menu/edit',
                                success: function (result) {
                                    if (result.success) {
                                        popup.close('menu-editmenu');
                                        location.reload();
                                    } else {
                                        popup.msg(result.message);
                                    }
                                }
                            });
                        }
                    },
                    {
                        title: 'Bỏ qua',
                        style: 'btn-default',
                        fn: function () {
                            popup.close('menu-editmenu');
                        }
                    }
                ], 'modal-lg');
            } else {
                popup.msg(result.message);
            }
        }
    });
};

menu.delMenu = function (id) {
    popup.confirm("Bạn có chắc chắn muốn xóa menu này.", function () {
        fly.ajax({
            service: 'user/service/menu/del',
            method: "POST",
            data: {
                id: id
            },
            loading: true,
            success: function (resp) {
                if (resp.success) {
                    location.reload();
                } else {
                    popup.msg(resp.message);
                }
            }
        });
    });
};
