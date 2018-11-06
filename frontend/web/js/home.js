
$(document).ready(function () {

    shareLink();
});
function shareLink() {
    var url = window.location.href;
    var ret = "";

    ret = ret + "  <div class='divshareGplz'>" +
                "      <div class='g-plus' data-action='share' data-annotation='bubble'></div>" +
                "      <script type='text/javascript'>" +
                "        (function() {" +
                "          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;" +
                "          po.src = 'https://apis.google.com/js/plusone.js';" +
                "          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);" +
                "        })();" +
                "      </script>" +
                "  </div>";

    if ($("div").hasClass("div_share")) {
        ret = ret + "<div class='divshareFB'><div class='fb-like' data-href='" + url + "' data-layout='button_count' data-action='like' data-show-faces='true' data-share='true'></div></div>" +
                  "<div class='clear'></div>";
        $('.div_share').append(ret);
    }
}

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "../connect.facebook.net/vi_VN/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
} (document, 'script', 'facebook-jssdk'));

function DownFile(filePath) {
    var strFUExt = new Array(".bmp", ".jpg", ".jpeg", ".gif", ".png");
    var fPath = filePath.toString();
    var sExt = fPath.substring(fPath.lastIndexOf("."), fPath.length).toLowerCase();

    var IsImg = false;
    for (var i = 0; i < strFUExt.length; i++) {
        if (sExt == strFUExt[i])
            IsImg = true;
    }
    if (IsImg) {
        ViewImg(filePath);
    } else if (sExt == ".pdf") {
        window.open(filePath);
    }
    else {
        var elemIF = document.createElement("iframe");
        elemIF.src = filePath;
        elemIF.style.display = "none";
        document.body.appendChild(elemIF);
    }
}
function ViewImg(FilePath) {
    var maxHeight = $(window).height() - 40;
    var imgSrc = "<img id='img_view' src='" + FilePath + "' style='max-height:" + maxHeight + "px'>";
    if ($("#div_view_upload_img").length <= 0) {
        $("body").append("<div id='div_view_upload_img'></div>");

    }
    $("#div_view_upload_img").html(imgSrc);

    $("#div_view_upload_img").dialog({
        bgiframe: true,
        title: FilePath,
        autoOpen: false,
        modal: true,
        width: "auto",
        height: "auto"
    });

    $("#img_view").load(function () {
        if (this.complete)
            $("#div_view_upload_img").dialog("open");
    });
}
