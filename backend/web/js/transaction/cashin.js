var cashin = {};

cashin.init = function () {
    cashin.initDatepicker();
};

cashin.initDatepicker = function () {
    $('#createdFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#createdTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });
};

cashin.perform = function (serviceReqId) {
    popup.open('perform', 'Duyệt chuyển ngân', template('transaction/cashin/perform.tpl', {
        serviceReqId: serviceReqId
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'perform-form',
                    service: 'transaction/service/cashin/perform',
                    success: function (result) {
                        if (result.success) {
                            popup.close('perform');
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
                popup.close('perform');
            }
        }
    ], 'modal-lg');
};

cashin.cancel = function (serviceReqId) {
    popup.open('cancel', 'Hủy phiếu thu', template('transaction/cashin/cancel.tpl', {
        serviceReqId: serviceReqId
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-form',
                    service: 'transaction/service/cashin/cancel',
                    success: function (result) {
                        if (result.success) {
                            popup.close('cancel');
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
                popup.close('cancel');
            }
        }
    ], 'modal-lg');
};