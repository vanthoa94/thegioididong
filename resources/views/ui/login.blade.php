<html>
<head>
	<title></title>
	<meta name="google-signin-client_id" content="791349724207-ossi354u6qkufjrfkhujmr10serkt7cm.apps.googleusercontent.com">
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
<p>Bạn có thể đăng nhập vào website bằng 1 trong 2 cách bên dưới</p>
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
		    appId      : '1581096018837837',
		    cookie     : true,
		    xfbml      : true,
		    version    : 'v2.3'
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
		FB.login(function(response) {
	  		FB.getLoginStatus(function(response) {
	    		statusChangeCallback(response);
	  		});
	 	}, {scope: 'public_profile,email'});
	}


	 function statusChangeCallback(response) {  
	    if (response.status === 'connected') {
	      
	      LoginFacebook();
	    } else if (response.status === 'not_authorized') {
	      document.getElementById('status').innerHTML = 'Please log ' +'into this app.';
	    } else {
	      
	      document.getElementById('status').innerHTML = 'Please log ' +
	        'into Facebook.';
	    }
	  }


	  function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	  }

	   function LoginFacebook() {
    		FB.api('/me', function(response) {
				parent.LoginFaceSuccess(response);
		    });
		}

function onLoadGoogleCallback(){
  gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      client_id: '791349724207-ossi354u6qkufjrfkhujmr10serkt7cm.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
      scope: 'profile'
    });

  auth2.attachClickHandler(element, {},
    function(googleUser) {
        console.log('Signed in: ' + googleUser.getBasicProfile().getName());
      }, function(error) {
        console.log('Sign-in error', error);
      }
    );
  });

  element = document.getElementById('googleSignIn');
}

</script>


	<script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
</body>
</html>