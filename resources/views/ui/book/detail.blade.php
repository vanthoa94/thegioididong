@extends('ui.layout')

@section('title',$info['name'])

@section('css')
<link href="{{Asset("public/css/detail.css")}}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
				<?php 
				if($info->cate_id!=2){
					if($info->price==0){
						$urlcate='sach-mien-phi';
						$namecate="Sách miễn phí";
					}else{
						$urlcate='sach-co-phi';
						$namecate="Sách có phí";
					}
				}else{
						$urlcate='sach-hoc-vien';
						$namecate="Sách học viên";
					}
				 ?>
				<li><a href="/">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><a href="{{url($urlcate)}}">{{$namecate}}</a><span style="margin-left:5px;">»</span></li>
				<li><b>﻿{{$info['name']}}</b></li>
			</ul>
		</div>


		<div class="row">

			<h1 class="title visible-xs" style="text-align:center; margin-bottom: 15px; text-transform:uppercase;">
					{{$info->name}}</h1>

			<div class="col-xs-4 col-sm-6 col-md-4">
				<img itemprop="image" alt="{{$info->name}}" title="{{$info->name}}" width="140" src="{{\App\Product::showImage($info->image)}}" style="box-shadow: 8px 8px 10px black;max-width:100%">
			</div>

			<div class="col-xs-8 col-sm-6 col-md-8" id="infobook">
				<h1 class="title hidden-xs" style="text-align:center; margin-bottom: 10px; text-transform:uppercase;">
					{{$info->name}}</h1>

				<p>
					<b>Tác giả:</b> <a href="{{url('tac-gia/'.$info->author.'.html')}}">{{$info->author}}</a>
				</p>

				<p><b>Thể loại:</b> <a href="{{url($urlcate)}}">{{$namecate}}</a></p>

				<p><b>Số chương:</b> {{$total}}</p>

				<?php 
				$status=\App\Product::getStatus();

				$status=$status[$info->status];
				 ?>

				<p><b>Trạng Thái:</b> {{$status}}</p>

				<p><b>Lần đọc:</b> {{$info->viewer}}</p>

				<div id="likefb"><b class="hidden-xs">Like ngay:</b> 
					<div class="fb-like" data-href="{{Request::fullUrl()}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"><span style="color:white">.</span></div>
				</div>
				<p id="ttt" class="hidden-xs">
					<span class="tt1">Đọc từ đầu</span>
					<span class="tt2">Đọc chương mới nhất</span>
					<span class="tt3">Danh sách chương</span>
				</p>
			</div>
			
		</div>

		<div id="ttt1" class="visible-xs clearfix">
					<span class="tt4">Giới thiệu sách</span>
					<span class="tt1">Đọc từ đầu</span>
					<span class="tt2">Đọc chương mới nhất</span>
					<span class="tt3">Danh sách chương</span>
				</div>

		<div id="noidung">
			<b>Nội Dung Sách:</b>
			<br />

			<div id="noidungct">{!!$info->promotion!!}</div>
		</div>



		<div class="boxchuong">

			<h2 class="titleboxx">Các chương mới nhất</h2>
			<div class="contentboxx chappernew" id="list-chapter">
				@foreach($muclucmoi as $item)
					<li><h4>
						<a title="{{$item->name}}" href="{{url($info->url.'/'.$item->url.'.html')}}">{{$item->name}}</a></h4>
						<span class="w3-right w3-hide-small">{{date('d/m/Y',strtotime($item->updated_at))}}</span>
					</li>
				@endforeach
			</div>
		</div>

		<div id="qcbv">
			@if($qc!=null)
			<?php function showUrlPage3($path){
                                if(strpos($path, "http")===0)
                                    return $path;
                                return url($path);
                            } ?>
                          
			<a href="{{$qc->url==''?'#':showUrlPage3($qc->url)}}" title="{{$qc->title}}"><img alt="{{$qc->title}}" src="{{\App\Product::showImage($qc->image)}}" /></a>
			
			@endif
		</div>


		<div class="boxchuong" id="listcccc">

			<h2 class="titleboxx">Danh sách chương "{{$info->name}}"</h2>
			<div class="contentboxx" id="list-chapter">
				@foreach($muclucs as $item)
					<li><h4>
						<a title="{{$item->name}}" href="{{url($info->url.'/'.$item->url.'.html')}}">{{$item->name}}</a></h4>
						<span class="w3-right w3-hide-small">{{date('d/m/Y',strtotime($item->updated_at))}}</span>
					</li>
				@endforeach


			</div>
			
		</div>

		<div class="phantrang pull-right clearfix">
				{!! $muclucs->render() !!}
			</div> 

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>

@endsection

@section('script2')
<script type="text/javascript">
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