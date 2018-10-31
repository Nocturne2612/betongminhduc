var service_vas = {};

service_vas.loadMobile = function () {
    if ($('#mobileDetect').length) {
        $('#mobileDetect').remove();
    }
    var serviceGroup = $('#serviceGroup').val();
    if (serviceGroup == 'TELCO') {
        var html = '';
        html += '<div class="form-group" id="mobileDetect">'
                + '<label class="control-label">Đầu số (các đầu số cách nhau bằng dấu phảy)</label><br>'
                + '<input type="text" name="mobileDetect"';
        if (typeof mobileDetect !== 'undefined' && mobileDetect !== null) {
            html += 'value="' + mobileDetect + '"';
        }
        html += ' class="form-control form-white"></div>';
        $("#groupList").after(html);
    }
    service_vas.loadVas();
}

service_vas.loadVas = function () {
    $('#vas_list').html('');
    var html = '';
    var serviceGroup = $('#serviceGroup').val();
    fly.ajax({
        service: 'category/service/addon/index/get-by-group',
        method: "POST",
        loading: false,
        data: {
            serviceGroup: serviceGroup
        },
        success: function (result) {
            if (result.success) {
                var vasList = result.datas.body.content;
                html += '<label class="control-label">Dịch vụ VAS: </label><br>';
                $.each(vasList, function (key, value) {
                    html += '<div class="col-md-6"><input type="checkbox" id="id_'
                            + key + '" name="serviceCodes[]" value="' + value.code + '"';
                    if (typeof vasSelected !== 'undefined' && vasSelected.length !== null) {
                        $.each(vasSelected, function (key, vas) {
                            if (value.name == vas.serviceName) {
                                html += 'checked';
                            }
                        });
                    }
                    html += '><label for="id_' + key + '">' + value.name + '</label></div>';
                    $("div[id=vas_list]").html(html);
                });
            } else {
                popup.msg(result.message);
            }
        }
    });


};