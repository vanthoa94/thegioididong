<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Đăng Nhập ACP</title>
	<link href="{{Asset('')}}public/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		#box{
			width:350px;
			margin: 5% auto;
			
		}
		#box #ctbox{
			background-color: white;
			padding: 20px;
			box-shadow: 0px 0px 3px #ccc;
			-webkit-box-shadow: 0px 0px 3px #ccc;
			-moz-box-shadow: 0px 0px 3px #ccc;
		}
		body{
			padding:0;
			background-color: #eee;
		}
		label{
			font-weight: normal;
			font-size: 13px;
		}
		a{
			color:#999;
		}
		.message {
			margin-left: 0;
			padding: 12px;
		}
		.message {
			border-left: 4px solid #00a0d2;
			background-color: #fff;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
		span{
			color:#999;
		}
	</style>
</head>
<body>

	<div id="box">
		<div class="text-center">
			<img width="200px" src="{{Asset('public/images/logo.jpg')}}" />
		</div><br />
		@if(Session::has('message'))
		<p class="message"> {{ Session::get('message') }}<br>
		</p>
		@endif
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div id="ctbox">
			<form method="post" action="" name="frm">
				Tài khoản
				<div style="height:3px"></div>
				<input class="form-control" type="text" name="username" value="{{old('username')}}" /><br />
				Mật khẩu
				<div style="height:3px"></div>
				<input class="form-control" type="password" name="password" />
				<br />
				<label>
					<input type="checkbox" name="rememberme" /> Tự động đăng nhập lần sau
				</label> 
				<input type="submit" class="btn btn-primary pull-right" value="Đăng nhập" />
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			</form>
		</div>
		 <br />
		 <div>
			 <div style="float:left">
			 	<a href='{{Asset('')}}'><< Trở về trang chủ</a>
			 </div>
			 <div style="float:right">
			 	<a href="#" id="quyenmatkhau">Bạn quyên mật khẩu?</a>
		        
			 </div>
			 <div style="clear:both"></div>
		</div>
		<br />
		<div id="qmk" style="display:none">
		            <p>+ Nếu bạn là <strong>Quản trị viên</strong>. Vui lòng liên hệ <a href="http://lovadweb.com" style="color:blue">lovadweb</a> để được hỗ trợ.</p>
		            <p>+ Nếu bạn là <b>Người dùng</b>. Vui lòng liên hệ admin để reset lại mật khẩu.</p>
		            
		        </div>
        
	</div>
	<script type="text/javascript">
	document.frm.username.focus();

	 window.onload = function () {
            document.getElementById("quyenmatkhau").onclick = function () {
                var box = document.getElementById("qmk");

                if (box.style.display == "none") {
                    box.style.display = "block";
                } else {
                    box.style.display = "none";
                }

                return false;
            }
        }
	</script>
</body>
</html>