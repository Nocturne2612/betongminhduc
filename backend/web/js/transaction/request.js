var request = {};
request.init = function () {
    request.initDatepicker();
};

request.initDatepicker = function () {
    $('#createdFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#createdTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#updatedFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#updatedTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });
};

request.depositCreate = function (refUrl) {
    popup.open('deposit-create', 'Tạo mới yêu cầu nạp tiền', template('transaction/request/deposit/create.tpl', {
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'deposit-create-form',
                    service: 'transaction/service/request/deposit-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('deposit-create');
                            popup.msg("Bạn đã tạo mới thành công", function () {
                                window.location = refUrl + result.datas.body.cashInId;
                            });
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
                popup.close('deposit-create');
            }
        }
    ], 'modal-lg');
};

request.depositApprove = function (id, refUrl) {
    popup.open('approve', 'Duyệt yêu cầu nạp tiền', template('transaction/request/deposit/approve.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-form',
                    service: 'transaction/service/request/deposit-approve',
                    success: function (result) {
                        if (result.success) {
                            popup.close('approve');
                            popup.msg("Bạn đã duyệt thành công", function () {
                                window.location = refUrl + result.datas.body.cashInId;
                            });
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
                popup.close('approve');
            }
        }
    ], 'modal-lg');
};

request.depositReject = function (id) {
    popup.open('reject', 'Từ chối yêu cầu nạp tiền', template('transaction/request/deposit/reject.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reject-form',
                    service: 'transaction/service/request/deposit-reject',
                    success: function (result) {
                        if (result.success) {
                            popup.close('reject');
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
                popup.close('reject');
            }
        }
    ], 'modal-lg');
};

request.depositReload = function (id) {
    popup.open('reload', 'Xác nhận nạp lại', template('transaction/request/deposit/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/request/deposit-reload',
                    success: function (result) {
                        if (result.success) {
                            popup.close('reload');
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
                popup.close('reload');
            }
        }
    ], 'modal-lg');
};

request.depositCollect = function () {
    popup.open('collect', 'Xác nhận truy thu', template('transaction/request/deposit/collect.tpl', {
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'collect-form',
                    service: 'transaction/service/request/deposit-collect',
                    success: function (result) {
                        if (result.success) {
                            popup.close('collect');
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
                popup.close('collect');
            }
        }
    ], 'modal-lg');
};
 

request.depositBlock = function (id, reqCode, cusName, accCode,aid, balance, amount, currCode, refUrl) {
    popup.open('block', 'Xác nhận phong tỏa', template('transaction/request/deposit/block.tpl', {
     id: id,
        reqCode: reqCode,
        cusName: cusName, 
        accCode: accCode,
        aid: aid,
        balance: balance,
        amount: amount,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'block-form',
                    service: 'transaction/service/request/deposit-block',
                    success: function (result) {
                        if (result.success) {
//                            popup.close('block');
//                            location.reload();
                                
                                alert("thành công");
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
                popup.close('block');
            }
        }
    ], 'modal-lg');
};

request.depositCheck = function (id) {
    popup.open('check', 'Kiểm tra Trạng thái yêu cầu nạp tiền', template('transaction/request/deposit/check.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-form',
                    service: 'transaction/service/request/deposit-check',
                    success: function (result) {
                        if (result.success) {
                            popup.close('check');
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
                popup.close('check');
            }
        }
    ], 'modal-lg');
};

request.depositApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/request/deposit/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-review-form',
                    service: 'transaction/service/request/deposit-approve-review',
                    success: function (result) {
                        if (result.success) {
                            popup.close('approve-review');
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
                popup.close('approve-review');
            }
        }
    ], 'modal-lg');
};

request.depositCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/request/deposit/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-review-form',
                    service: 'transaction/service/request/deposit-cancel-review',
                    success: function (result) {
                        if (result.success) {
                            popup.close('cancel-review');
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
                popup.close('cancel-review');
            }
        }
    ], 'modal-lg');
};

request.withdrawApprove = function (id, methodCode, refUrl) {
    popup.open('approve', 'Duyệt yêu cầu rút tiền', template('transaction/request/withdraw/approve.tpl', {
        id: id,
        methodCode: methodCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-approve-form',
                    service: 'transaction/service/request/withdraw-approve',
                    success: function (result) {
                        if (result.success) {
                            popup.close('approve');
                            popup.msg("Bạn đã duyệt thành công", function () {
                                window.location = refUrl;
                            });
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
                popup.close('approve');
            }
        }
    ], 'modal-lg');
};

request.withdrawReject = function (id, methodCode) {
    popup.open('reject', 'Từ chối yêu cầu rút tiền', template('transaction/request/withdraw/reject.tpl', {
        id: id,
        methodCode: methodCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-reject-form',
                    service: 'transaction/service/request/withdraw-reject',
                    success: function (result) {
                        if (result.success) {
                            popup.close('reject');
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
                popup.close('reject');
            }
        }
    ], 'modal-lg');
};

request.withdrawCheck = function (id) {
    popup.open('check', 'Kiểm tra Trạng thái yêu cầu', template('transaction/request/withdraw/check.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-check-form',
                    service: 'transaction/service/request/withdraw-check',
                    success: function (result) {
                        if (result.success) {
                            popup.close('check');
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
                popup.close('check');
            }
        }
    ], 'modal-lg');
};

request.withdrawSpendAgain = function (id) {
    popup.open('spend-again', 'Chi lại yêu cầu rút tiền', template('transaction/request/withdraw/spend_again.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-spend-again-form',
                    service: 'transaction/service/request/withdraw-spend-again',
                    success: function (result) {
                        if (result.success) {
                            popup.close('spend-again');
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
                popup.close('spend-again');
            }
        }
    ], 'modal-lg');
};

request.withdrawRefundBack = function (id) {
    popup.open('refund', 'Hoàn tiền yêu cầu rút tiền', template('transaction/request/withdraw/refund_back.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-refund-form',
                    service: 'transaction/service/request/withdraw-refund-back',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund');
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
                popup.close('refund');
            }
        }
    ], 'modal-lg');
};

request.withdrawUpdateCashoutSuccess = function (id, refUrl) {
    popup.open('update', 'Cập nhật chi thành công yêu cầu rút tiền', template('transaction/request/withdraw/update_cashout_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-update-form',
                    service: 'transaction/service/request/withdraw-update-cashout-success',
                    success: function (result) {
                        if (result.success) {
                            popup.close('update');
                            popup.msg("Cập nhật chi thành công", function () {
                                window.location = refUrl;
                            });
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
                popup.close('update');
            }
        }
    ], 'modal-lg');
};

request.withdrawRefundCreate = function (id, reqCode, cusName, accCode, amount, fee, currCode, cashinDetailUrl) {
    popup.open('refund-create', 'Nạp hoàn yêu cầu rút tiền', template('transaction/request/refund/create.tpl', {
        id: id,
        reqCode: reqCode,
        cusName: cusName,
        accCode: accCode,
        amount: amount,
        fee: fee,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'refund-create-form',
                    service: 'transaction/service/request/withdraw-refund-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-create');
                            popup.msg("Tạo mới nạp hoàn thành công", function () {
                                window.location = cashinDetailUrl + result.datas.body.cashInId;
                            });
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
                popup.close('refund-create');
            }
        }
    ], 'modal-lg');
};

// Chuyển tiền
// Duyệt yêu cầu chuyển tiền
request.transferIbOffApprove = function (id, refUrl) {
    popup.open('approve', 'Duyệt yêu cầu chuyển tiền', template('transaction/request/transfer/ib_off_approve.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-ib-off-approve-form',
                    service: 'transaction/service/request/transfer-ib-off-approve',
                    success: function (result) {
                        if (result.success) {
                            popup.close('approve');
                            popup.msg("Bạn đã duyệt thành công", function () {
                                window.location = refUrl + result.datas.body.cashOutId;
                            });
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
                popup.close('approve');
            }
        }
    ], 'modal-lg');
};

// từ chối yêu cầu chuyển tiền
request.transferIbOffReject = function (id) {
    popup.open('reject', 'Từ chối yêu cầu chuyển tiền', template('transaction/request/transfer/ib_off_reject.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-ib-off-reject-form',
                    service: 'transaction/service/request/transfer-ib-off-reject',
                    success: function (result) {
                        if (result.success) {
                            popup.close('reject');
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
                popup.close('reject');
            }
        }
    ], 'modal-lg');
};

// Duyệt review
request.transferApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/request/transfer/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-approve-review-form',
                    service: 'transaction/service/request/transfer-review-approve',
                    success: function (result) {
                        if (result.success) {
                            popup.close('approve-review');
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
                popup.close('approve-review');
            }
        }
    ], 'modal-lg');
};

// từ chối review
request.transferCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/request/transfer/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-cancel-review-form',
                    service: 'transaction/service/request/transfer-review-reject',
                    success: function (result) {
                        if (result.success) {
                            popup.close('cancel-review');
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
                popup.close('cancel-review');
            }
        }
    ], 'modal-lg');
};

//kiểm tra (Chuyển tiền)
request.transferCheck = function (id) {
    popup.open('check', 'Kiểm tra Trạng thái yêu cầu', template('transaction/request/transfer/check.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-check-form',
                    service: 'transaction/service/request/transfer-check',
                    success: function (result) {
                        if (result.success) {
                            popup.close('check');
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
                popup.close('check');
            }
        }
    ], 'modal-lg');
};

//Chi lại (Chuyển tiền)
request.transferSpendAgain = function (id) {
    popup.open('spend-again', 'Chi lại', template('transaction/request/transfer/spend_again.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-spend-again-form',
                    service: 'transaction/service/request/transfer-spend-again',
                    success: function (result) {
                        if (result.success) {
                            popup.close('spend-again');
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
                popup.close('spend-again');
            }
        }
    ], 'modal-lg');
};

//Hủy Chi lại (Chuyển tiền)
request.transferCancelSpendAgain = function (id) {
    popup.open('cancel-spend-again', 'Hủy chi lại', template('transaction/request/transfer/cancel_spend_again.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-cancel-spend-again-form',
                    service: 'transaction/service/request/transfer-cancel-spend-again',
                    success: function (result) {
                        if (result.success) {
                            popup.close('cancel-spend-again');
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
                popup.close('cancel-spend-again');
            }
        }
    ], 'modal-lg');
};

//Cập nhật Chi lại thành công (Chuyển tiền)
request.transferSpendAgainSuccess = function (id) {
    popup.open('spend-again-success', 'Cập nhật chi thành công', template('transaction/request/transfer/spend_again_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-spend-again-success-form',
                    service: 'transaction/service/request/transfer-spend-again-success',
                    success: function (result) {
                        if (result.success) {
                            popup.close('spend-again-success');
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
                popup.close('spend-again-success');
            }
        }
    ], 'modal-lg');
};

//Nạp lại (Chuyển tiền)
request.transferDepositReload = function (id) {
    popup.open('reload', 'Xác nhận nạp lại', template('transaction/request/transfer/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'transfer-reload-form',
                    service: 'transaction/service/request/transfer-deposit-reload',
                    success: function (result) {
                        if (result.success) {
                            popup.close('reload');
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
                popup.close('reload');
            }
        }
    ], 'modal-lg');
};

//Nạp hoàn (Chuyển tiền)
request.transferRefundCreate = function (id, reqCode, cusName, accCode, amount, fee, currCode, cashinDetailUrl) {
    popup.open('refund-create', 'Nạp hoàn yêu cầu chuyển tiền', template('transaction/request/refund/create.tpl', {
        id: id,
        reqCode: reqCode,
        cusName: cusName,
        accCode: accCode,
        amount: amount,
        fee: fee,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'refund-create-form',
                    service: 'transaction/service/request/transfer-refund-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-create');
                            popup.msg("Tạo mới nạp hoàn thành công", function () {
                                window.location = cashinDetailUrl + result.datas.body.cashInId;
                            });
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
                popup.close('refund-create');
            }
        }
    ], 'modal-lg');
};

//Hoàn tiền (Chuyển tiền)
request.transferRefundBack = function (id, reqCode, cusName, accCode, amount, fee, currCode) {
    popup.open('refund-back', 'Hoàn tiền yêu cầu chuyển tiền', template('transaction/request/transfer/refund_back.tpl', {
        id: id,
        reqCode: reqCode,
        cusName: cusName,
        accCode: accCode,
        amount: amount,
        fee: fee,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'withdraw-refund-form',
                    service: 'transaction/service/request/transfer-refund-back',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-back');
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
                popup.close('refund-back');
            }
        }
    ], 'modal-lg');
};

//Hoàn tiền
request.refundApprove = function (id) {
    popup.open('refund-approve', 'Chấp nhận hoàn tiền', template('transaction/request/refund/approve.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-form',
                    service: 'transaction/service/request/refund-approve',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-approve');
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
                popup.close('refund-approve');
            }
        }
    ], 'modal-lg');
};

request.refundReject = function (id) {
    popup.open('refund-reject', 'Từ chối hoàn tiền', template('transaction/request/refund/reject.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reject-form',
                    service: 'transaction/service/request/refund-reject',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-reject');
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
                popup.close('refund-reject');
            }
        }
    ], 'modal-lg');
};

request.blockUnFreeze = function (id, refUrl) {
    popup.open('un-freeze', 'Bỏ phong tỏa', template('transaction/request/block/unfreeze.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'un-freeze-form',
                    service: 'transaction/service/request/block-un-freeze',
                    success: function (result) {
                        if (result.success) {
                            popup.close('un-freeze');
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
                popup.close('un-freeze');
            }
        }
    ], 'modal-lg');
};

request.blockCollect = function (id, refUrl) {
    popup.open('collect', 'Xác nhận truy thu', template('transaction/request/block/collect.tpl', {
    id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'collect-form',
                    service: 'transaction/service/request/block-collect',
                    success: function (result) {
                        if (result.success) {
                            popup.close('collect');
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
                popup.close('collect');
            }
        }
    ], 'modal-lg');
};