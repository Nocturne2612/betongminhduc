(function () {
    function Popup() {
        this.open = function (id, title, content, cmd, type, width, backdrop) {
            if ($('#' + id).length > 0) {
                $('#' + id).remove();
            }
            if (type === '') {
                type = '';
            }
            if (typeof (width) === 'undefined') {
                width = '600px';
            }
            $('body:first').append('<div class="modal fade in" id="' + id + '" >\
                <div class="modal-dialog ' + type + '" style="width:' + width + '">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                            ' + (title === null || title === '' ? '' : '<h4 class="modal-title">' + title + '</h4>') + '\
                        </div>\
                        <div class="modal-body">' + content + '</div>\
                        <div class="modal-footer"></div>\
                    </div>\
                </div>\
            </div>');

            if (cmd) {
                for (var i = 0; i < cmd.length; i++) {
                    $('#' + id + ' .modal-footer').append('<button type="button" class="btn ' + cmd[i].style + '" id="' + 'popup-cmd-' + id + '-' + i + '">' + cmd[i].title + '</button>');
                    $('#' + 'popup-cmd-' + id + '-' + i).click(cmd[i].fn);
                }
            }

            var option = {backdrop: 'static', keyboard: false};
            $('#' + id).modal(option);
            
            $('#' + id + ' .close').click(function () {
                popup.close(id);
            });
            
            $('body').keydown(function (e) {
                if (e.keyCode === 27) {
                    popup.close(id);
                }
            });
        };

        this.close = function (id) {
            $('#' + id).removeClass("fade").modal('hide');
            $('#' + id).remove();
            var hasModal = false;
            $('.modal').each(function () {
                if ($(this).is(":visible")) {
                    $('body').addClass('modal-open');
                    hasModal = true;
                }
            });

            if (!hasModal) {
                $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();
            }
        };


        this.msg = function (msg, fn) {
            this.open('popup-msg', "Thông báo", '<div style="min-width: 300px">' + msg + '</div>', [{
                    title: "Đóng",
                    style: "btn-primary",
                    fn: function () {
                        if (fn) {
                            fn();
                        }
                        popup.close('popup-msg');
                    }
                }]);
        };

        this.confirm = function (msg, fn) {
            this.open('popup-confirm', 'Xác nhận', '<div class="container" style="min-width: 300px">' + msg + '</div>', [{
                    title: "Đồng ý",
                    style: "btn-primary",
                    fn: function () {
                        fn();
                        popup.close('popup-confirm');
                    }
                }, {
                    title: "Hủy",
                    fn: function () {
                        popup.close('popup-confirm');
                    }
                }]);
        };
    }

    function Loading() {
        this.show = function () {
            $('.loading').css('display', 'block');
        };
        this.hide = function () {
            $('.loading').css('display', 'none');
        };

    }

    this.loading = new Loading();
    this.popup = new Popup();

})();