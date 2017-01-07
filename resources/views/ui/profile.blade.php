@extends('ui.layout')

@section('title','Thông tin cá nhân')


@section('content')


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8">
		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>Thông tin cá nhân</b></li>
			</ul>
		</div>
		
		<form method="post" action="" id="frm">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Họ tên(*):
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
					<input type="text" placeholder="Họ và tên của bạn." class="form-control" name="name" value="{{$info->name}}" />
				</div>
			</div><br />
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Email:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					{{$info->email}}<div style="height:10px"></div>
				</div>
			</div><br />
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Giới tính:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
					<label>Nam <input type="radio" name="gender" value="1" {{$info->gender==1?"checked='checked'":""}} /></label>  &nbsp;&nbsp;
					<label>Nữ <input type="radio" name="gender" value="0" {{$info->gender==0?"checked='checked'":""}} /></label>
				</div>
			</div><br />
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Số điện thoại:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
					<input type="text" class="form-control" name="phone" value="{{$info->phone}}" />
				</div>
			</div><br />
			
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					Địa chỉ:
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
					<textarea rows="5" class="form-control" name="address">{{$info->address}}</textarea>
				</div>
			</div>
			<br />

			<div class="row">
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 text-right">
		          <input type="submit" class="btn btn-success" value="Lưu lại" />
		          <input type="reset" class="btn btn-default" value="Nhập Lại" />
		        </div>
		      </div>
     		 <input type="hidden" name="_token" value="{{csrf_token()}}"/>
		</form>

		<style type="text/css">
		.form-control{
			font-size:13px;
		}
		label{
			font-weight: normal;
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

<script type="text/javascript">
pageId='profile';

</script>
@endsection