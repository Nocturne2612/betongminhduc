var common = {};

common.formatMoney = function (number, c, d, t) {
    var n = parseFloat(number), c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

common.checkCheckBox = function () {
    $('#treeList :checkbox').change(function () {
        $(this).siblings('ul').find(':checkbox').prop('checked', this.checked);
        if (this.checked) {
            $(this).parentsUntil('#treeList', 'ul').siblings(':checkbox').prop('checked', true);
        } else {
            $(this).parentsUntil('#treeList', 'ul').each(function () {
                var childSelected = $(this).find(':checkbox:checked').length;
                if (childSelected == 0) {
                    $(this).prevAll(':checkbox').prop('checked', false);
                }
            });
        }
    });
}
