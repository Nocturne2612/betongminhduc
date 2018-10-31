var vas = {};
vas.init = function () {
    vas.initDatepicker();
};

vas.initDatepicker = function () {
    $('#createdFrom').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });

    $('#createdTo').datetimepicker({
        format: 'dd/mm/yyyy hh:ii'
    });
};

//topup---------------------------------------------------------------------------------------------
//Nạp lại/ mua lại
vas.topupReload = function (id) {
    popup.open('reload', 'Xác nhận nạp lại/ mua lại', template('transaction/vas/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/vas/topup-reload',
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
//---------------------------------------------------------

//Kiểm tra thanh toán
vas.topupCheck = function (id) {
    popup.open('check-payment', 'Kiểm tra thanh toán', template('transaction/vas/check_payment.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-payment-form',
                    service: 'transaction/service/vas/topup-check',
                    success: function (result) {

                        if (result.success) {
                            popup.close('check-payment');
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
                popup.close('check-payment');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Hủy yêu cầu nạp
vas.topupCancelDeposit = function (id) {
    popup.open('cancel-deposit', 'Xác nhận hủy yêu cầu nạp', template('transaction/vas/cancel_deposit.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-deposit-form',
                    service: 'transaction/service/vas/topup-cancel-deposit',
                    success: function (result) {
                        popup.close('cancel-deposit');
                        if (result.success) {
                            popup.close('cancel-deposit');
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
                popup.close('cancel-deposit');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Nạp thành công
vas.topupDepositSuccess = function (id) {
    popup.open('deposit-success', 'Xác nhận nạp thành công', template('transaction/vas/deposit_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'deposit-success-form',
                    service: 'transaction/service/vas/topup-deposit-success',
                    success: function (result) {

                        if (result.success) {
                            popup.close('deposit-success');
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
                popup.close('deposit-success');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Kiểm tra dịch vụ
vas.topupCheckService = function (serviceReqId) {
    popup.open('check-service', 'Kiểm tra dịch vụ', template('transaction/vas/check_service.tpl', {
        serviceReqId: serviceReqId
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-service-form',
                    service: 'transaction/service/vas/topup-check-service',
                    success: function (result) {

                        if (result.success) {
                            popup.close('check-service');
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
                popup.close('check-service');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Trả DV thành công
vas.topupServiceSuccess = function (id) {
    popup.open('service-success', 'Trả DV thành công', template('transaction/vas/service_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'service-success-form',
                    service: 'transaction/service/vas/topup-service-success',
                    success: function (result) {

                        if (result.success) {
                            popup.close('service-success');
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
                popup.close('service-success');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Duyệt review
vas.topupApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/vas/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-review-form',
                    service: 'transaction/service/vas/topup-approve-review',
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
//---------------------------------------------------------

//Từ chối duyệt review
vas.topupCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/vas/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-review-form',
                    service: 'transaction/service/vas/topup-cancel-review',
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
//---------------------------------------------------------


//Tạo mới hoàn tiền
vas.topupRefundCreate = function (id, quantity, discountAmount, amount, currCode, refUrl) {
    popup.open('refund-create', 'Hoàn tiền nạp điện thoại/game', template('transaction/vas/refund-create.tpl', {
        id: id,
        quantity: quantity,
        discountAmount: discountAmount,
        amount: amount,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'refund-create-form',
                    service: 'transaction/service/vas/topup-refund-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-create');
                            popup.msg("Hoàn tiền thành công", function () {
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
                popup.close('refund-create');
            }
        }
    ], 'modal-lg');
};
//--------------------------------------------------------------------------------

//---------------------------------BINCODE--------------------------------------------
//Nạp lại/ mua lại
vas.bincodeReload = function (id) {
    popup.open('reload', 'Xác nhận nạp lại/ mua lại', template('transaction/vas/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/vas/bincode-reload',
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
//---------------------------------------------------------

//Kiểm tra thanh toán
vas.bincodeCheck = function (id) {
    popup.open('check-payment', 'Kiểm tra thanh toán', template('transaction/vas/check_payment.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-payment-form',
                    service: 'transaction/service/vas/bincode-check',
                    success: function (result) {

                        if (result.success) {
                            popup.close('check-payment');
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
                popup.close('check-payment');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------


//Hủy yêu cầu nạp
vas.bincodeCancelDeposit = function (id) {
    popup.open('cancel-deposit', 'Xác nhận hủy yêu cầu nạp', template('transaction/vas/cancel_deposit.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-deposit-form',
                    service: 'transaction/service/vas/bincode-cancel-deposit',
                    success: function (result) {

                        if (result.success) {
                            popup.close('cancel-deposit');
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
                popup.close('cancel-deposit');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------


//Nạp thành công
vas.bincodeDepositSuccess = function (id) {
    popup.open('deposit-success', 'Xác nhận nạp thành công', template('transaction/vas/deposit_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'deposit-success-form',
                    service: 'transaction/service/vas/bincode-deposit-success',
                    success: function (result) {

                        if (result.success) {
                            popup.close('deposit-success');
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
                popup.close('deposit-success');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Kiểm tra dịch vụ
vas.bincodeCheckService = function (serviceReqId) {
    popup.open('check-service', 'Kiểm tra dịch vụ', template('transaction/vas/check_service.tpl', {
        serviceReqId: serviceReqId
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-service-form',
                    service: 'transaction/service/vas/bincode-check-service',
                    success: function (result) {

                        if (result.success) {
                            popup.close('check-service');
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
                popup.close('check-service');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------


//Trả DV thành công
vas.bincodeServiceSuccess = function (id) {
    popup.open('service-success', 'Trả DV thành công', template('transaction/vas/service_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'service-success-form',
                    service: 'transaction/service/vas/bincode-service-success',
                    success: function (result) {

                        if (result.success) {
                            popup.close('service-success');
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
                popup.close('service-success');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------


//Duyệt review
vas.bincodeApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/vas/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-review-form',
                    service: 'transaction/service/vas/bincode-approve-review',
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
//---------------------------------------------------------



//Từ chối duyệt review
vas.bincodeCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/vas/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-review-form',
                    service: 'transaction/service/vas/bincode-cancel-review',
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
//---------------------------------------------------------

//Tạo mới hoàn tiền
vas.bincodeRefundCreate = function (id, quantity, discountAmount, amount, currCode, refUrl) {
    popup.open('refund-create', 'Hoàn tiền mua mã thẻ/voucher', template('transaction/vas/refund-create.tpl', {
        id: id,
        quantity: quantity,
        discountAmount: discountAmount,
        amount: amount,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'refund-create-form',
                    service: 'transaction/service/vas/bincode-refund-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-create');
                            popup.msg("Hoàn tiền thành công", function () {
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
                popup.close('refund-create');
            }
        }
    ], 'modal-lg');
};

//--------------------------------------------------------------------------------


//----------------------------------------ORRDER---------------------------------------------
//Nạp lại/ mua lại
vas.orderReload = function (id) {
    popup.open('reload', 'Xác nhận nạp lại/ mua lại', template('transaction/vas/reload.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'reload-form',
                    service: 'transaction/service/vas/order-reload',
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
//---------------------------------------------------------

//Kiểm tra thanh toán
vas.orderCheck = function (id) {
    popup.open('check-payment', 'Kiểm tra thanh toán', template('transaction/vas/check_payment.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-payment-form',
                    service: 'transaction/service/vas/order-check',
                    success: function (result) {

                        if (result.success) {
                            popup.close('check-payment');
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
                popup.close('check-payment');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Hủy yêu cầu nạp
vas.orderCancelDeposit = function (id) {
    popup.open('cancel-deposit', 'Xác nhận hủy yêu cầu nạp', template('transaction/vas/cancel_deposit.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-deposit-form',
                    service: 'transaction/service/vas/order-cancel-deposit',
                    success: function (result) {

                        if (result.success) {
                            popup.close('cancel-deposit');
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
                popup.close('cancel-deposit');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Nạp thành công
vas.orderDepositSuccess = function (id) {
    popup.open('deposit-success', 'Xác nhận nạp thành công', template('transaction/vas/deposit_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'deposit-success-form',
                    service: 'transaction/service/vas/order-deposit-success',
                    success: function (result) {

                        if (result.success) {
                            popup.close('deposit-success');
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
                popup.close('deposit-success');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Kiểm tra dịch vụ
vas.orderCheckService = function (serviceReqId) {
    popup.open('check-service', 'Kiểm tra dịch vụ', template('transaction/vas/check_service.tpl', {
        serviceReqId: serviceReqId
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'check-service-form',
                    service: 'transaction/service/vas/order-check-service',
                    success: function (result) {

                        if (result.success) {
                            popup.close('check-service');
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
                popup.close('check-service');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Trả DV thành công
vas.orderServiceSuccess = function (id) {
    popup.open('service-success', 'Trả DV thành công', template('transaction/vas/service_success.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'service-success-form',
                    service: 'transaction/service/vas/order-service-success',
                    success: function (result) {

                        if (result.success) {
                            popup.close('service-success');
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
                popup.close('service-success');
            }
        }
    ], 'modal-lg');
};
//---------------------------------------------------------

//Duyệt review
vas.orderApproveReview = function (id) {
    popup.open('approve-review', 'Duyệt review', template('transaction/vas/approve_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'approve-review-form',
                    service: 'transaction/service/vas/order-approve-review',
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
//---------------------------------------------------------

//Từ chối duyệt review
vas.orderCancelReview = function (id) {
    popup.open('cancel-review', 'Từ chối duyệt review', template('transaction/vas/cancel_review.tpl', {
        id: id
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'cancel-review-form',
                    service: 'transaction/service/vas/order-cancel-review',
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
//---------------------------------------------------------

//Tạo mới hoàn tiền
vas.orderRefundCreate = function (id, quantity, discountAmount, amount, currCode, refUrl) {
    popup.open('refund-create', 'Hoàn tiền thanh toán hóa đơn', template('transaction/vas/refund-create.tpl', {
        id: id,
        quantity: quantity,
        discountAmount: discountAmount,
        amount: amount,
        currCode: currCode
    }), [
        {
            title: 'Xác nhận',
            style: 'btn-primary',
            fn: function () {
                fly.submit({
                    id: 'refund-create-form',
                    service: 'transaction/service/vas/bincode-refund-create',
                    success: function (result) {
                        if (result.success) {
                            popup.close('refund-create');
                            popup.msg("Hoàn tiền thành công", function () {
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
                popup.close('refund-create');
            }
        }
    ], 'modal-lg');
};

//--------------------------------------------------------------------------------