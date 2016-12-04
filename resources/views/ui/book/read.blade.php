@extends('ui.layout')

@section('title',$mucluc->name.' - '.$info->name)

@section('css')
<link href="{{Asset("public/css/docsach.css")}}" rel="stylesheet" />
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
				<li><a href="{{url($info->url.'.html')}}">{{$info->name}}</a><span style="margin-left:5px;">»</span></li>
				<li><b>﻿{{$mucluc->name}}</b></li>
			</ul>
		</div>

		<div class="navigator">

			<div class="listchuong">
				Danh Sách Chương:  &nbsp;&nbsp;
				<select>
					@foreach($muclucs as $item)
						<option value="{{$item->url.'.html'}}">{{$item->name}}</option>
					@endforeach
				</select>
			</div>

			<a href="#" class="btn btn-primary cprev">Chương trước</a>
			<button class="btn btn-success" id="caidat">Cài đặt</button>
			<a href="#" class="btn btn-primary cnext">Chương sau</a>

			<div id="option">
				Màu chữ: <select id="fontcolor">
					<option value="black" selected="selected">Đen</option>
					<option value="blue">Xanh</option>
					<option value="red">Đỏ</option>
					<option value="#fd00ff">Hồng</option>
					<option value="#af0dff">Tím</option>	
					<option value="#999">Xám</option>

			</select> &nbsp;&nbsp;
				Kích thước chữ: <select id="fontsize">
				<option value="15px">15</option>
				<option value="16px">16</option>
				<option value="17px" selected="selected">17</option>
				<option value="18px">18</option>
				<option value="19px">19</option>
				<option value="20px">20</option>
				<option value="21px">21</option>
				<option value="22px">22</option>
			</select>
			</div>

			

		</div>

		<h1 class="title">{{$info->name}}</h1>
		<h2 class="nmucluc">{{$mucluc->name}}</h2>

		@if($mucluc->video!='')
			<div id="xemvideo">
				<iframe width="560" src="//www.youtube.com/embed/{{$mucluc->video}}" frameborder="0" allowfullscreen=""></iframe>
			</div>
		@endif

		@if($mucluc->audio!='')
			<div id="ngheaudio">
				<audio controls="controls" loop="true" id="audio"><source src="{{$mucluc->audio}}" type="audio/mpeg">Your browser does not support the audio tag.</audio>
			</div>
		@endif

		@if($mucluc->image!='')
			<img id="imagemucluc" src="{{\App\Product::showImage($mucluc->image)}}" alt="{{$info->name}}" />
			
		@endif

		<div id="content">
			{!!$mucluc->content!!}
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


		<div class="navigator">
			
			<a href="#" class="btn btn-primary cprev">Chương trước</a>
			<a href="#" class="btn btn-primary cnext">Chương sau</a>

			
<div class="listchuong">
				Danh Sách Chương:  &nbsp;&nbsp;
				<select>
					@foreach($muclucs as $item)
						<option value="{{$item->url.'.html'}}">{{$item->name}}</option>
					@endforeach
				</select>
			</div>
		</div>

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>

@endsection

@section('script2')
<script type="text/javascript">
	var bookurl="{{$info->url}}";
	var urlMucLuc="{{$mucluc->url.'.html'}}";

	$(document).ready(function(){
		$(".listchuong").each(function(){
			$(this).find("select:eq(0) option").each(function(){
			$(this).val(bookurl+"/"+$(this).val());
			});
		});

		$(".listchuong").each(function(){
			$(this).find("select").change(function(){
			if($(this).val()!=bookurl+"/"+urlMucLuc){
				window.location.href=base_url+"/"+$(this).val();
			}	
		}).val(bookurl+"/"+urlMucLuc);
		});

		var currentC=$(".listchuong select:eq(0) option:selected");
		var cnext=currentC.next("option").attr('value');
		var cprev=currentC.prev("option").attr('value');

		if(typeof cnext=='undefined'){
			$(".cnext").addClass("disabled");	
		}else{
			$(".cnext").attr("href",base_url+"/"+cnext);
		}

		if(typeof cprev=='undefined'){
			$(".cprev").addClass("disabled");	
		}else{
			$(".cprev").attr("href",base_url+"/"+cprev);
		}

		$("#fontcolor").change(function(){
			$("#content").css("color",$(this).val());
		});

		$("#fontsize").change(function(){
			$("#content").css("font-size",$(this).val());
			$("#content").css("line-height",(parseInt($(this).val())+4)+"px");
		});
		
		$("#caidat").click(function(){
			$("#option").slideToggle();
		});

		$(".navigator").show();
	});
</script>
@endsection