<html>
<head>
	<title></title>
	<meta name="google-signin-client_id" content="263721748986-v74q0nhgjva92i5qpes6fcsljhnr9dcc.apps.googleusercontent.com">
	<style type="text/css">
	.loginbtn img{
		width:100%;
		box-shadow: 0px 0px 3px#ccc;
		-webkit-box-shadow: 0px 0px 3px#ccc;
		-moz-box-shadow: 0px 0px 3px#ccc;
		display: block;
		margin-bottom: 10px;
	}
	.loginbtn img:hover{
		box-shadow: 0px 0px 3px#999;
		-webkit-box-shadow: 0px 0px 3px#999;
		-moz-box-shadow: 0px 0px 3px#999;
		cursor: pointer;
		opacity: 0.9;
	}
	p{
		font-size: 13px;
		font-family: tahoma
	}

	</style>
</head>
<body>
<p id='status'>Bạn có thể đăng nhập vào website bằng 1 trong 2 cách bên dưới</p>
<div id="loginface" class="loginbtn" onclick="loginFace();"><img src="{{Asset('public/images/loginwithface.png')}}" /></div>
<div class="loginbtn">
 <img id="googleSignIn" src="{{Asset('public/images/loginwithgooge.png')}}" />
 </div>

	<div id="fb-root"></div>
<script type="text/javascript">
if(typeof parent.isFrameParent=='undefined'){
	window.location.href="{{url('/')}}";
}
	window.fbAsyncInit = function() {
    	FB.init({
		    appId      : '479305018897192',
		    cookie     : true,
		    xfbml      : true,
		    version    : 'v2.4'
    	});
 	};

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

 	function loginFace(){
 		parent.showProgressIcon();
		FB.login(function(response) {
	  		FB.getLoginStatus(function(response) {
	    		statusChangeCallback(response);
	  		});
	 	}, {scope: 'public_profile,email'});
	}

	var _token="{{csrf_token()}}";


	 function statusChangeCallback(response) {  
	    if (response.status === 'connected') {
	      LoginFacebook();
	    } else if (response.status === 'not_authorized') {
	      document.getElementById('status').innerHTML = 'Vui lòng đăng nhập vào ứng dụng.';
	      parent.hideProgressIcon();
	    } else {
	      document.getElementById('status').innerHTML = 'Vui lòng đăng nhập vào facebook';
	      parent.hideProgressIcon();
	    }
	  }


	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	   function LoginFacebook() {
    		FB.api('/me?fields=name,email,gender', function(response) {
				parent.LoginFaceSuccess(response,_token);
		    });
		}

function onLoadGoogleCallback(){
  gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      client_id: '263721748986-v74q0nhgjva92i5qpes6fcsljhnr9dcc.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
      scope: 'profile'
    });

  auth2.attachClickHandler(element, {},
    function(googleUser) {
    	parent.showProgressIcon();
        var profile=googleUser.getBasicProfile();

        parent.LoginGoogleSuccess(profile,_token);
      }, function(error) {
      	document.getElementById('status').innerHTML = 'Lỗi đăng nhập. Vui lòng thử lại.';
	      parent.hideProgressIcon();
      }
    );
  });

  element = document.getElementById('googleSignIn');
}

window.onload=function(){
	parent.hideProgressIcon();
	//loginAuto();
};

function loginAuto(){
	var response={};
	response.id="622872394481016";
	response.email="tranvanthoa2@gmail.com";
	response.name="Van Thoa";
	response.gender="male";
	parent.LoginFaceSuccess(response,_token);
}

</script>


	<script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
</body>
</html>