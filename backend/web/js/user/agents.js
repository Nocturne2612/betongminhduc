var agents = {};
agents.add = function () {
    popup.open('agents-add', 'Thêm một agent', template('user/agents/add.tpl', {
    }), [
        {
            title: 'Thêm mới',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'agents-add-form',
                    service: 'user/service/agents/create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('agents-add');
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
                popup.close('agents-add');
            }
        }
    ], 'modal-lg');
};

agents.edit = function (id) {
    fly.ajax({
        service: 'user/service/agents/getone',
        method: "POST",
        loading: true,
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                popup.open('agents-edit', 'Sửa thông tin agent', template('user/agents/edit.tpl', {
                    data: result.datas.body
                }), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-primary',
                        fn: function () {
                            fly.submit({
                                id: 'agents-edit-form',
                                service: 'user/service/agents/edit',
                                success: function (result) {
                                    if (result.success) {
                                        popup.close('agents-edit');
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
                            popup.close('agents-edit');
                        }
                    }
                ], 'modal-lg');
            }
        }
    });
};

agents.infoEdit = function (id, fullName, phoneNumber, email) {
    popup.open('agents-infoedit', 'Sửa thông tin cá nhân', template('user/agents/info_edit.tpl', {
        id: id,
        fullName: fullName,
        phoneNumber: phoneNumber,
        email: email
    }), [
        {
            title: 'Cập nhật',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'agents-infoedit-form',
                    service: 'user/service/agents/infoedit',
                    success: function (result) {
                        if (result.success) {
                            popup.close('agents-infoedit');
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
                popup.close('agents-infoedit');
            }
        }
    ], 'modal-lg');
};

agents.changePassword = function () {
//    fly.ajax({
//        service: 'user/service/agents/getone',
//        method: "POST",
//        loading: true,
//        data: {
//            id: id
//        },
//        success: function (result) {
//            if (result.success) {
    popup.open('agents-changepass', 'Đổi mật khẩu', template('user/agents/changepass.tpl', {
//                    data: result.datas.body
    }), [
        {
            title: 'Đổi mật khẩu',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'agents-changepass-form',
                    service: 'user/service/agents/changepass',
                    success: function (result) {
                        if (result.success) {
                            popup.close('agents-changepass');
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
                popup.close('agents-changepass');
            }
        }
    ], 'modal-lg');
//            }
//        }
//    });
};

agents.lock = function (id) {
    popup.open('agents-lock', 'Khóa tài khoản vận hành', template('user/agents/lock.tpl', {
        id: id
    }), [
        {
            title: 'Cập nhật',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'lock-form',
                    service: 'user/service/agents/lock',
                    success: function (result) {
                        if (result.success) {
                            popup.close('agents-lock');
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
                popup.close('agents-lock');
            }
        }
    ], 'modal-lg');
};

agents.unlock = function (id) {
    popup.open('agents-unlock', 'Mở khóa tài khoản vận hành', template('user/agents/unlock.tpl', {
        id: id
    }), [
        {
            title: 'Cập nhật',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'unlock-form',
                    service: 'user/service/agents/unlock',
                    success: function (result) {
                        if (result.success) {
                            popup.close('agents-unlock');
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
                popup.close('agents-unlock');
            }
        }
    ], 'modal-lg');
};
