
/// -------------- start init connect fb--------------
var FBaccessToken = "";
var FBappID = "303986553127942"; //"213632268779999";207586082777903
var auth = false;


// Load the SDK Asynchronously
 (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "../connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

// Init the SDK upon load
window.fbAsyncInit = function() {
    FB.init({
      appId      : '303986553127942',
      xfbml      : true,
      version    : 'v2.1'
    });
  

    // listen for and handle auth.statusChange events
    FB.Event.subscribe('auth.statusChange', function (response) {
        if (response.authResponse) {
            // user has auth'd your app and is logged into Facebook
            auth = true;

            FBaccessToken = response.authResponse.accessToken;
            FB.api('/me', function (me) {
                if (me.name) {
                    //document.getElementById('auth-displayname').innerHTML = me.name;
                }
            });

            FB.api(
                    {
                        method: 'fql.query',
                        query: 'SELECT * FROM user WHERE uid = me()'
                    },
                      function (response) {
                         
                      });


        } else {
            // user has not auth'd your app, or is not logged into Facebook
            //FB.login(function (response) { }, { scope: 'publish_stream,publish_actions,publish_checkins,email,user_likes,status_update,offline_access,manage_pages,user_about_me,user_status,user_checkins' });
        }
    });

 

}


/// -------------- end init connect fb--------------

function AuthApp() {

    if (auth == false) {
        FB.login(function (response) {
            if (response.authResponse) {
                FBLogin();
            } else {
                // console.log('User cancelled login or did not fully authorize.');
            }


            return false
        }, { scope: 'publish_stream,publish_actions,publish_checkins,email,user_likes,status_update,offline_access,manage_pages,user_about_me,user_status,user_checkins' });

    } else {
        return true;
    }
}

function IsAuth() {

    return auth;
}

function PostFB(msg, url, auth_) {
    var message = msg;
    var name = "Mạng xã hội kết nối khát vọng làm giàu :: hoclamgiau.vn";
    var description = "Làm giàu có thể học được. Mạng xã hội kết nối đam mê, học tập,rèn luyện kỹ năng, thực hành kinh doanh, đầu tư, làm giàu, kiếm tiền trong thời đại Internet.";
    var link = "http://www.hoclamgiau.vn/";
    var picture = "../www.hoclamgiau.vn/games/luckyzone/images/hlg.jpg";

    if (url != null && url != "") {
        link = url;
    }

    if (msg == null || msg == "") {
        message = "Mạng xã hội kết nối khát vọng làm giàu :: hoclamgiau.vn";
    }

    return Post_FB(msg, name, picture, link, description, auth_);
}

function Post_FB(msg, title, img, url, desc, auth_) {

    if (auth == true) {
        FB.api('/me/feed', 'post',
        {
            message: msg,
            name: title,
            link: url,
            picture: img,
            description: desc,
            is_hidden: true
        }, function (response) {
            if (!response || response.error) {
                //alert(response.error);
                return false;
            } else {
                //alert('Post ID: ' + response.id);
                return true;
            }
        });
    } else {

        //alert(auth_);
        if (auth_ == true) {
            FB.login(function (response) { }, { scope: 'publish_stream,publish_actions,publish_checkins,email,user_likes,status_update,offline_access,manage_pages,user_about_me,user_status,user_checkins' });
        }
    }

    return false;

}


/////////////////////////


function FBLogin() {

    FB.api('/me', function (response) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/members/ajax/fblogin.aspx",
            data: { openid: response.id, username: response.email, firstname: response.first_name, lastname: response.last_name },
            success: function (data) {
                if (data.bug == "1") {
                    alert("Đăng nhập không thành công");
                } else {

                    location.reload()
                }

            }, error: function () {
            }
        });

    });


}