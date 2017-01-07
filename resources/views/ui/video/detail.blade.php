@extends('ui.layout')

@section('title',$info->title)

@section('css')
<link href="{{Asset("public/css/detailvideo.css")}}" rel="stylesheet" />
@endsection

@section('meta')
	<meta name="keywords" content="xem video {!!$info->title!!}" />
	<meta property='og:title' content='{!!$info->title!!}'/>
@endsection


@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
				
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><a href="{{url('video.html')}}">Video</a><span style="margin-left:5px;">»</span></li>
				<li><b>﻿{{$info->title}}</b></li>
			</ul>
		</div>

		<div id="xemvideo">
				<iframe src="{{$info->video_url}}" frameborder="0" allowfullscreen=""></iframe>
			</div>

			<h1 class="entry-title">{{$info->title}}</h1>
			<p>
				Đăng lúc {{$info->updated_at}} - Xem {{$info->view}}
			</p>

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>

@endsection

@section('script2')
<script type="text/javascript">
currentPage="Xem video";
pageId='detailvideo:{{$info->id}}';
function thunhogioithieu(){
	$("#hidecontentgt").remove();

var noidungct=$("#noidungct").html();


	if(noidungct.length>640){
		var noidung=noidungct.substr(0,640)+"...<a href='#' id='morecontent'>Xem thêm</a>";
		$("#noidungct").html(noidung+"<div class='hide'>"+noidungct+"</div>");

		$("#morecontent").on('click',function(){
			var p=$(this).parents('#noidungct').eq(0);

			p.html(p.find('.hide:eq(0)').html()+"<a href='#' id='hidecontentgt'>Thu nhỏ</a>");

			$(this).off('click');
			$("#hidecontentgt").on('click',function(){
				thunhogioithieu();
				$(this).off('click');
				return false;
			});
			return false;
		});
	}

}
$(document).ready(function(){
	$("#ttt .tt1,#ttt1 .tt1").click(function(){
		window.location.href=$("#listcccc .contentboxx li:eq(0) h4 a").attr("href");
	});

	$("#ttt1 .tt4").click(function(){
		$("#noidung").slideToggle();
	});

	$("#ttt1 .tt3,#ttt .tt3").click(function(){
		var listchuong=$("#listcccc").offset().top;
		$("html, body").stop().animate({scrollTop:listchuong-100},500);
	});

	$("#ttt1 .tt2,#ttt .tt2").click(function(){
		window.location.href=$(".chappernew:eq(0) li:eq(0) h4 a").attr("href");
	});



thunhogioithieu();
});
</script>
@endsection