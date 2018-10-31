var roles = {};
roles.add = function () {
    popup.open('roles-add', 'Thêm nhóm quyền', template('user/roles/add.tpl', {
    }), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'roles-add-form',
                    service: 'user/service/roles/create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('roles-add');
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
                popup.close('roles-add');
            }
        }
    ], 'modal-lg');
};

roles.edit = function (id) {
    fly.ajax({
        service: 'user/service/roles/getone',
        method: "POST",
        loading: true,
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                popup.open('roles-edit', 'Sửa nhóm quyền', template('user/roles/edit.tpl', {
                    data: result.datas.body
                }), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-primary',
                        fn: function () {
                            fly.submit({
                                id: 'roles-edit-form',
                                service: 'user/service/roles/edit',
                                success: function (result) {
                                    if (result.success) {
                                        popup.close('roles-edit');
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
                            popup.close('roles-edit');
                        }
                    }
                ], 'modal-lg');
            }
        }
    });
};
