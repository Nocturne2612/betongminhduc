

//var config = {
//    apiKey: "AIzaSyBGHF4GR5RB8C-7rNRm9cDxW-UYe9N0nrI",
//    authDomain: "dacsan3mien-ae444.firebaseapp.com",
//    databaseURL: "https://dacsan3mien-ae444.firebaseio.com",
//    projectId: "dacsan3mien-ae444",
//    storageBucket: "dacsan3mien-ae444.appspot.com",
//    messagingSenderId: "1047751899298"
//};

  var config = {
    apiKey: "AIzaSyBHHiEKgYyUPTVchtfPiH5LpLja57qn4PY",
    authDomain: "vimo-test.firebaseapp.com",
    databaseURL: "https://vimo-test.firebaseio.com",
    projectId: "vimo-test",
    storageBucket: "",
    messagingSenderId: "120113380680"
  };

firebase.initializeApp(config);
var messaging = firebase.messaging();

navigator.serviceWorker.register("firebase-messaging-sw.js", {scope: "firebase-cloud-messaging-push-scope"}).then(function (registration) {
    messaging.useServiceWorker(registration);
    initNotifi();
}).catch(function (err) {
  console.log('ServiceWorker registration failed: ', err);
});


messaging.onMessage(function (payload) {
    document.getElementById("notifiAudio").play();
    var notification = new Notification(payload.notification.title, {
        icon: '/images/logo-mini.png',
        body: payload.notification.body
    });
    notification.onclick = function () {
        window.open(payload.notification.click_action);
    };
    setContent(payload);
});

function setContent(payload) {
    setCount();
    var content = '<li>'
            + '<a href="' + payload.notification.click_action + '">'
            + '<i class="fa fa-star p-r-10 f-18 c-orange"></i>'
            + payload.notification.title
            + '<span class="dropdown-time">Just now</span>'
            + '</a>'
            + '</li>';
    $('#notifications-content').prepend(content);
}
;

function setCount() {
    var count = parseInt($('#badge-count').text());
    $('#badge-count').text(count + 1);
}
;
// khi send notify cho Vận Hành, phải check login
function initNotifi() {
    messaging.getToken().then(function (token) {
        if (token) {
            if (!isTokenSentToServer()) {
                subscribeTokenToTopic(token);
                setTokenSentToServer(true);
            }
        } else {
            // Chua dc phep thi hoi
            messaging.requestPermission().then(function () {
                // Kh dong y
                messaging.getToken().then(function (token) {
                    console.log(token);
                    // Thanh cong
                    subscribeTokenToTopic(token);
                    setTokenSentToServer(true);
                    var notification = new Notification('Thông báo', {
                        icon: '/images/logo-mini.png',
                        body: "Đăng ký thành công"
                    });

                    notification.onclick = function () {
                        notification.close();
                    };

                }).catch(function (err) {
                    console.log(err);
                    // Khong lay duoc, do loi he thong
                    setTokenSentToServer(false);
                });
            })
                    .catch(function (err) {
                        console.log(err);
                        // Kh chan
                        setTokenSentToServer(false);
                    });
        }
    }).catch(function (err) {
        console.log(err);
        setTokenSentToServer(false);
    });
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? 1 : 0);
}

function isTokenSentToServer() {
    if (window.localStorage.getItem('sentToServer') == 1) {
        return true;
    }
    return false;
}

function subscribeTokenToTopic(token) {
    var nAgt = navigator.userAgent;
    var browserName = navigator.appName;
    var fullVersion = '' + parseFloat(navigator.appVersion);
    var majorVersion = parseInt(navigator.appVersion, 10);
    var nameOffset, verOffset, ix;

    // In Opera, the true version is after "Opera" or after "Version"
    if ((verOffset = nAgt.indexOf("Opera")) != -1) {
        browserName = "Opera";
        fullVersion = nAgt.substring(verOffset + 6);
        if ((verOffset = nAgt.indexOf("Version")) != -1)
            fullVersion = nAgt.substring(verOffset + 8);
    }
    // In MSIE, the true version is after "MSIE" in userAgent
    else if ((verOffset = nAgt.indexOf("MSIE")) != -1) {
        browserName = "Microsoft Internet Explorer";
        fullVersion = nAgt.substring(verOffset + 5);
    }
    // In Chrome, the true version is after "Chrome" 
    else if ((verOffset = nAgt.indexOf("Chrome")) != -1) {
        browserName = "Chrome";
        fullVersion = nAgt.substring(verOffset + 7);
    }
    // In Safari, the true version is after "Safari" or after "Version" 
    else if ((verOffset = nAgt.indexOf("Safari")) != -1) {
        browserName = "Safari";
        fullVersion = nAgt.substring(verOffset + 7);
        if ((verOffset = nAgt.indexOf("Version")) != -1)
            fullVersion = nAgt.substring(verOffset + 8);
    }
    // In Firefox, the true version is after "Firefox" 
    else if ((verOffset = nAgt.indexOf("Firefox")) != -1) {
        browserName = "Firefox";
        fullVersion = nAgt.substring(verOffset + 8);
    }
    // In most other browsers, "name/version" is at the end of userAgent 
    else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) < (verOffset = nAgt.lastIndexOf('/'))) {
        browserName = nAgt.substring(nameOffset, verOffset);
        fullVersion = nAgt.substring(verOffset + 1);
        if (browserName.toLowerCase() == browserName.toUpperCase()) {
            browserName = navigator.appName;
        }
    }
    // trim the fullVersion string at semicolon/space if present
    if ((ix = fullVersion.indexOf(";")) != -1) {
        fullVersion = fullVersion.substring(0, ix);
    }
    if ((ix = fullVersion.indexOf(" ")) != -1) {
        fullVersion = fullVersion.substring(0, ix);
    }
    majorVersion = parseInt('' + fullVersion, 10);
    if (isNaN(majorVersion)) {
        fullVersion = '' + parseFloat(navigator.appVersion);
        majorVersion = parseInt(navigator.appVersion, 10);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/service/notification/sendtoken', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('token=' + token + '&browserName=' + browserName + '&fullVersion=' + fullVersion);
}