@extends('ui.layout')

@section('title','Liên hệ')


@section('content')


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8">
		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>Liên hệ</b></li>
			</ul>
		</div>
		<p>
			<strong style="font-size:15px">THÔNG TIN LIÊN HỆ</strong>
		</p>

		Bạn có thể liên hệ với chúng tôi theo một trong các trong tin bên dưới<br /><br />

		<strong>Địa chỉ: </strong>{{$base_data['website']['address']}}<br />
		<strong>Điện thoại: </strong>{{$base_data['website']['hotline']}}<br />
		<strong>Zalo: </strong>{{$base_data['website']['zalo']}}<br />
		<strong>Email: </strong>{{$base_data['website']['email']}}<br />
		<hr>
		Hoặc liên hệ với chúng tôi bằng cách điền đầy đủ thông tin vào mẫu sau:<br /><br />

@include('backend._message')
		<form method="post" action="" id="frm">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Họ tên:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					<input type="text" placeholder="Họ và tên của bạn." class="form-control" name="name" value="{{old('name')}}" />
				</div>
			</div><br />
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Email:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					<input type="text" placeholder="Chúng tôi sẽ trả lời bạn qua email này." class="form-control" name="email" value="{{old('email')}}" />
				</div>
			</div><br />
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Tiêu đề:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
					<input type="text" class="form-control" name="subject" value="{{old('subject')}}" />
				</div>
			</div><br />
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Nội dung:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
					<textarea rows="8" class="form-control" placeholder="Bạn thắc mắc điều gì?" name="message">{{old('message')}}</textarea>
				</div>
			</div>
			<br />

			<div class="row">
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 text-right">
		          <input type="submit" class="btn btn-success" value="Lưu Lại" />
		          <input type="reset" class="btn btn-default" value="Nhập Lại" />
		        </div>
		      </div>
     		 <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		</form>

		<style type="text/css">
		.form-control{
			font-size:13px;
		}
		</style>

	</div><!--colleft-->

	<div class="col-xs-12 col-sm-6 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>
<style type="text/css">
.errortext{
	color:#A74141 !important;
	margin-left: 3px;
	margin-top: 3px;
	font-size:12px;
	display: block;
}
.error, .error:focus {
    border-color: #A74141 !important;
}
</style>
@endsection



@section('script2')
<script src="{{Asset('public/js/validate.js')}}" ></script>

<script type="text/javascript">
pageId='contact';
$(document).ready(function(){
$("#frm1").kiemtra([
            {
                'name':'name',
                'trong':true,
                'message':'Vui lòng nhập họ tên của bạn.'
            },{
              'name':'email',
              'email':true,
                'message':'Vui lòng nhập email của bạn.'
            }
            ,{
              'name':'subject',
              'trong':true,
                'message':'Vui lòng nhập tiêu đề'
            },{
              'name':'message',
              'trong':true,
                'message':'Vui lòng nhập nội dung'
            }
      ]);

$(".alert .close").click(function(){
	$(this).parent().hide();
});
});

</script>
@endsection