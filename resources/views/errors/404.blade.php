<!DOCTYPE html>
<html>
<head>
	<title>Địa chỉ không tòn tại</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<style type="text/css">
		body{
			margin:0px;
			padding:0px;
			font-family: Arial;
			font-size:13px;
			color:#333;
		}
		h1{
			margin:0px;
			padding:0px;
			padding:7px 20px;
			border-bottom:1px dotted #ccc;
		}
		#box{
			width:50%;
			box-shadow: 0px 0px 5px #ccc;
			-webkit-box-shadow: 0px 0px 5px #ccc;
			-moz-box-shadow: 0px 0px 5px #ccc;
			margin:5% auto;
		}
		#content{
			padding:15px 20px;
			line-height: 20px;
			text-align: center;
		}
		#content img{
			max-width: 100%;
		}
		a{
			color: blue;
			text-decoration: none;
		}
		a:hover{
			text-decoration: underline;
		}
		@media(max-width:768px){
			#box{
				width:90%;
			}
		}
	</style>
</head>
<body>
	<div id="box">
		<h1>404 URL Not Found</h1>
		<div id="content">
			<img src="{{Asset('public/images/404not.jpg')}}" /><br />
			Đường dẫn <b>{{Request::fullUrl()}}</b> không tồn tại hoặc đã bị xóa.<br /><br /> <a href="{{url()}}">Về trang chủ</a> hoặc gửi <a href="{{url('lien-he.html')}}">thông báo</a> cho chúng tôi.
		</div>
	</div>
</body>
</html>