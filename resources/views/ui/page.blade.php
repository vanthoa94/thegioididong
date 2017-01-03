@extends('ui.layout')

@section('title',$info->title)

@section('css')
<link href="{{Asset("public/css/page.css")}}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>{{$info->title}}</b></li>
			</ul>
		</div>

		<h1 id="title">{{$info->title}}</h1>
		<div id="navvv" class="clearfix">
			<small>Đăng lúc {{date('d/m/Y H:i',strtotime($info->updated_at))}} - Lần xem {{$info->viewer}}</small> 
			<div class="pull-right">
				<div class="fb-like" data-href="{{Request::fullUrl()}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
			</div>
		</div>

		<div id="contentpage">
			{!!$info->content!!}
		</div>


	</div>

	<div class="col-xs-12 col-sm-4 col-md-4" id="bbrightt">
		@include('ui.boxright')
	</div><!--colright-->
</div>
<script type="text/javascript">
currentPage="Trang";
pageId='page:{{$info->id}}';
</script>


@endsection