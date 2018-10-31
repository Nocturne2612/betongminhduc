var authorities = {};
authorities.addAuthorities = function () {
    popup.open('authorities-addauthorities', 'Thêm quyền', template('user/authorities/add_authorities.tpl', {
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'authorities-addauthorities-form',
                    service: 'user/service/authorities/create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('authorities-addauthorities');
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
                popup.close('authorities-addauthorities');
            }
        }
    ], 'modal-lg');
};

authorities.editAuthorities = function (id) {
    fly.ajax({
        service: 'user/service/authorities/getone',
        method: "POST",
        loading: true,
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                popup.open('authorities-editauthorities', 'Sửa quyền', template('user/authorities/edit_authorities.tpl', {
                    data: result.datas.body
                }), [
                    {
                        title: 'Xác nhận',
                        style: 'btn-primary',
                        fn: function () {
                            fly.submit({
                                id: 'authorities-editauthorities-form',
                                service: 'user/service/authorities/edit',
                                success: function (result) {
                                    if (result.success) {
                                        popup.close('authorities-editauthorities');
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
                            popup.close('authorities-editauthorities');
                        }
                    }
                ], 'modal-lg');
            }
        }
    });
};

authorities.delAuthorities = function (id) {
    popup.confirm("Bạn có chắc chắn muốn xóa quyền này.", function () {
        fly.ajax({
            service: 'user/service/authorities/del',
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

authorities.addRoles = function () {
    popup.open('authorities-addroles', 'Thêm nhóm quyền', template('user/authorities/add_roles.tpl', {
    }), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'authorities-addroles-form',
                    service: 'user/service/authorities/createroles',
                    success: function (result) {
                        if (result.success) {
                            popup.close('authorities-addroles');
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
                popup.close('authorities-addroles');
            }
        }
    ], 'modal-lg');
};

authorities.editRoles = function (id) {
    fly.ajax({
        service: 'user/service/authorities/getoneroles',
        method: "POST",
        loading: true,
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                popup.open('authorities-editroles', 'Sửa nhóm quyền', template('user/authorities/edit_roles.tpl', {
                    data: result.datas.body
                }), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-primary',
                        fn: function () {
                            fly.submit({
                                id: 'authorities-editroles-form',
                                service: 'user/service/authorities/editroles',
                                success: function (result) {
                                    if (result.success) {
                                        popup.close('authorities-editroles');
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
                            popup.close('authorities-editroles');
                        }
                    }
                ], 'modal-lg');
            }
        }
    });
};