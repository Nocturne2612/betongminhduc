var merchant = {};
merchant.init = function () {
    merchant.initDatepicker();
};

merchant.initDatepicker = function () {
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

//============Checkout==========================
merchant.checkoutReload = function (id) {
    popup.open('reload', 'Nạp lại', template('transaction/merchant/checkout/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/merchant/checkout-reload',
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

merchant.checkoutCancel = function (id) {
    popup.open('cancel', 'Hủy yêu cầu', template('transaction/merchant/checkout/cancel.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-form',
                    service: 'transaction/service/merchant/checkout-cancel',
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

merchant.checkoutCheck = function (id) {
    popup.open('check', 'Kiểm tra trạng thái', template('transaction/merchant/checkout/check.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-form',
                    service: 'transaction/service/merchant/checkout-check',
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

merchant.checkoutApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/merchant/checkout/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-review-form',
                    service: 'transaction/service/merchant/checkout-approve-review',
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


merchant.checkoutCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/merchant/checkout/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-review-form',
                    service: 'transaction/service/merchant/checkout-cancel-review',
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
//===============================================================

//===============================Payout==========================
//Duyệt
merchant.payoutApprove = function (id) {
    popup.open('approve', 'Duyệt', template('transaction/merchant/payout/approve.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-form',
                    service: 'transaction/service/merchant/payout-approve',
                    success: function (result) {
                        alert('check');
                        if (result.success) {
                            popup.close('approve');
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
                popup.close('approve');
            }
        }
    ], 'modal-lg');
};

//Hủy duyệt
merchant.payoutCancel = function (id) {
    popup.open('cancel', 'Hủy duyệt', template('transaction/merchant/payout/cancel.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-form',
                    service: 'transaction/service/merchant/payout-cancel',
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

//Kiểm tra
merchant.payoutCheck = function (id) {
    popup.open('check', 'Kiểm tra trạng thái', template('transaction/merchant/payout/check.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-form',
                    service: 'transaction/service/merchant/payout-check',
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

//Cập nhật chi thành công
merchant.payoutUpdateSuccess = function (id) {
    popup.open('update', 'Cập nhật chi thành công', template('transaction/merchant/payout/update_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'update-success-form',
                    service: 'transaction/service/merchant/payout-update-success',
                    success: function (result) {
                        if (result.success) {
                            popup.close('update');
                            popup.msg("Cập nhật chi thành công", function () {
                                location.reload();
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

//Chi lại
merchant.payoutReload = function (id) {
    popup.open('reload', 'Chi lại', template('transaction/merchant/payout/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/merchant/payout-reload',
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

//Hủy yêu cầu
merchant.payoutCancelReq = function (id) {
    popup.open('cancel-req', 'Hủy yêu cầu', template('transaction/merchant/payout/cancel_req.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-req-form',
                    service: 'transaction/service/merchant/payout-cancel-req',
                    success: function (result) {
                        if (result.success) {
                            popup.close('cancel-req');
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
                popup.close('cancel-req');
            }
        }
    ], 'modal-lg');
};

//Tạo mới hoàn tiền
merchant.payoutRefundCreate = function (id, reqCode, cusName, accCode, amount, fee, currCode) {
    popup.open('refund-create', 'Hoàn tiền', template('transaction/request/refund/create.tpl', {
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
                    service: 'transaction/service/merchant/payout-refund-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-create');
                            popup.msg("Hoàn tiền thành công", function () {
                                window.location.reload();
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
//===============================================================================================

//============Qr-code==========================
//Nạp lại
merchant.qrcodeReload = function (id) {
    popup.open('reload', 'Nạp lại', template('transaction/merchant/qrcode/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/merchant/qrcode-reload',
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

merchant.qrcodeCancel = function (id) {
    popup.open('cancel', 'Hủy yêu cầu', template('transaction/merchant/qrcode/cancel.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-form',
                    service: 'transaction/service/merchant/qrcode-cancel',
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

merchant.qrcodeCheck = function (id) {
    popup.open('check', 'Kiểm tra trạng thái', template('transaction/merchant/qrcode/check.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-form',
                    service: 'transaction/service/merchant/qrcode-check',
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

merchant.qrcodeApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/merchant/qrcode/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-review-form',
                    service: 'transaction/service/merchant/qrcode-approve-review',
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


merchant.qrcodeCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/merchant/qrcode/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-review-form',
                    service: 'transaction/service/merchant/qrcode-cancel-review',
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


merchant.qrcodeBlock = function () {
    popup.open('block', 'Xác nhận phong tỏa', template('transaction/merchant/qrcode/block.tpl', {
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'block-form',
                    service: 'transaction/service/merchant/qrcode-block',
                    success: function (result) {
                        if (result.success) {
                            popup.close('block');
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
                popup.close('block');
            }
        }
    ], 'modal-lg');
};
