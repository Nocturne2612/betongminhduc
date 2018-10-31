var cashout = {};

cashout.init = function () {
    cashout.initDatepicker();
};

cashout.initDatepicker = function () {
    $('#createdFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#createdTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });
    $('#processedFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#processedTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });
    $('#paidFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#paidTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });
};

cashout.delegateEdit = function (id, bankAccountId, paymentOrderCode) {
    fly.ajax({
        service: 'transaction/service/cashout/get-bank-account',
        method: "POST",
        loading: true,
        success: function (result) {
            if (result.success) {
                popup.open('delegate-edit', 'Sửa thông tin', template('transaction/cashout/delegate_edit.tpl', {
                    id: id,
                    bankAccountId: bankAccountId,
                    paymentOrderCode: paymentOrderCode,
                    bankAccounts: result.datas.body.content
                }), [
                    {
                        title: 'Cập nhật',
                        style: 'btn-primary',
                        fn: function () {
                            fly.submit({
                                id: 'delegate-edit-form',
                                service: 'transaction/service/cashout/delegate-edit',
                                success: function (result) {
                                    if (result.success) {
                                        popup.close('delegate-edit');
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
                            popup.close('delegate-edit');
                        }
                    }
                ], 'modal-lg');
            } else {
                popup.msg(result.message);
            }
        }
    });
};

cashout.approve = function (amount, detailUrl, serviceReqId, paymentRequestCode) {
    var total = cashout.getCurrTotal();
    if (total != amount) {
        popup.msg('Tổng số tiền ủy nhiệm chi phải bằng số tiền rút');
    } else {
        fly.submit({
            id: 'cashout-approve-form',
            service: 'transaction/service/cashout/approve-step1',
            success: function (result) {
                if (result.success) {
                    popup.open('cashout-approve', 'Duyệt phiếu chi', template('transaction/cashout/cashout_approve.tpl', {
                        serviceReqId: serviceReqId,
                        paymentRequestCode: paymentRequestCode,
                        listPaymentOrder: result.datas
                    }), [
                        {
                            title: 'Duyệt',
                            style: 'btn-primary',
                            fn: function () {
                                fly.submit({
                                    id: 'cashout-approve-otp-form',
                                    service: 'transaction/service/cashout/approve-step2',
                                    success: function (result) {
                                        if (result.success) {
                                            popup.close('cashout-approve');
                                            window.location = detailUrl;
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
                                popup.close('cashout-approve');
                            }
                        }
                    ], 'modal-lg');
                } else {
                    popup.msg(result.message);
                }
            }
        });
    }
}

cashout.reject = function (detailUrl, serviceReqId, paymentRequestCode) {
    popup.open('cashout-reject', 'Sửa thông tin', template('transaction/cashout/cashout_reject.tpl', {
        serviceReqId: serviceReqId,
        paymentRequestCode: paymentRequestCode
    }), [
        {
            title: 'Cập nhật',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cashout-reject-form',
                    service: 'transaction/service/cashout/reject',
                    success: function (result) {
                        if (result.success) {
                            popup.close('delegate-edit');
                            window.location = detailUrl;
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
                popup.close('cashout-reject');
            }
        }
    ], 'modal-lg');
}

cashout.addDelegateOutput = function () {
    var num = parseInt($('input[name=numItem]').val());
    fly.ajax({
        service: 'transaction/service/cashout/add-delegate-output',
        method: "POST",
        data: {
            id: num
        },
        success: function (result) {
            if (result.success) {
                $('#delegate-output-items').append(result.datas);
                $('input[name=numItem]').val(num + 1);
                cashout.currTotal();
            } else {
                popup.msg(result.message);
            }
        }
    });
};


cashout.removeItem = function (id) {
    var num = parseInt($('input[name=numItem]').val());
    $('input[name=numItem]').val(num - 1);
    $('#delegate-output-item-' + id).remove();
    cashout.currTotal();
};

cashout.getCurrTotal = function () {
    var total = 0;
    $('.getTotal').each(function () {
        var check = 0;
        if (!isNaN(parseFloat($(this).val()))) {
            check = parseFloat($(this).val());

        }
        total = total + check;
    });
    return total;
}

cashout.currTotal = function () {
    var total = cashout.getCurrTotal();
    $('#currTotal').html(common.formatMoney(total, 0, ".", ","));
};