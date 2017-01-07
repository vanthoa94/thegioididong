@extends('ui.layout')

@section('title','Thêm sách')


@section('content')


<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8">
		<div id="breadcrumb-global">
			<ul class="clearfix">
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><a href="{{url('sach-cua-ban.html')}}">Sách của bạn</a><span style="margin-left:5px;">»</span></li>
				<li><b>﻿Thêm sách</b></li>
			</ul>
		</div>
		
	</div><!--colleft-->


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
pageId='createbook';

</script>
@endsection