@extends('ui.layout')

@section('title',$mucluc->name.' - '.$info->name)

@section('css')
<link href="{{Asset("public/css/docsach.css")}}" rel="stylesheet" />
@endsection

@section('meta')
	<meta property='og:title' content='{!!$info->title!!}'/>
@endsection


@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
				<?php 
				if($info->price==-1){
						$urlcate='sach-mien-phi';
						$namecate="Sách miễn phí";
					}else{
						$urlcate='sach-co-phi';
						$namecate="Sách có phí";
					}
				 ?>
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><a href="{{url($urlcate)}}">{{$namecate}}</a><span style="margin-left:5px;">»</span></li>
				<li><a href="{{url($info->url.'.html')}}">{{$info->name}}</a><span style="margin-left:5px;">»</span></li>
				<li><b>﻿{{$mucluc->name}}</b></li>
			</ul>
		</div>

		<div class="contentreads" style="background-color:{{$base_data['website']['background_content_read']}}">
			<h1 class="title">{{$info->name}}</h1>

			<div class="navigator">

				<div class="listchuong">
					Danh Sách:  &nbsp;&nbsp;
					<select>
						@foreach($muclucs as $item)
							<option value="{{$item->url.'.html'}}">{{$item->name}}</option>
						@endforeach
					</select>
				</div>

				<a href="#" class="btn btn-success cprev">Mục trước</a>
				<button class="btn btn-success" id="caidat">Điều chỉnh</button>
				<a href="#" class="btn btn-success cnext">Mục sau</a>

				<div id="option">
					Màu nền: <select id="backgroundcolor">
					<option value="transparent">Trong xuốt</option>
					<option value="#ffffff">Trắng</option>
					<option value="#000000">Đen</option>
					<option value="#f3f3f3">Xám</option>
				</select> &nbsp;&nbsp;
					Màu chữ: <select id="fontcolor">
						<option value="#333333" selected="selected">Đen</option>
						<option value="blue">Xanh</option>
						<option value="red">Đỏ</option>
						<option value="#fd00ff">Hồng</option>
						<option value="#af0dff">Tím</option>	
						<option value="#999999">Xám</option>

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
					<option value="23px">23</option>
					<option value="24px">24</option>
					<option value="25px">25</option>
				</select>
				</div>

				

			</div>



		</div><div class="contentreads" style="background-color:{{$base_data['website']['background_content_read']}}">
			
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

			<div id="content" style="font-size:{{$base_data['website']['content_size']}};color:{{$base_data['website']['content_color']}};line-height:{{((int)$base_data['website']['content_size'])+4}}px">
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
				
				<a href="#" class="btn btn-primary cprev">Mục trước</a>
				<a href="#" class="btn btn-primary cnext">Mục sau</a>

				
		<div class="listchuong">
					Danh Sách:  &nbsp;&nbsp;
					<select>
						@foreach($muclucs as $item)
							<option value="{{$item->url.'.html'}}">{{$item->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-4 col-md-4" id="bbrightt">
		@include('ui.boxright')
	</div><!--colright-->
</div>

<script type="text/javascript">
	pageId='readbook:{{$info->id.'-'.$mucluc->id}}';
</script>

@endsection

@section('script2')
<script type="text/javascript">
currentPage="Đọc sách";
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
		}).val("{{$base_data['website']['content_color']}}");

		$("#fontsize").change(function(){
			$("#content").css("font-size",$(this).val());
			$("#content").css("line-height",(parseInt($(this).val())+4)+"px");
		}).val("{{$base_data['website']['content_size']}}");

		$("#backgroundcolor").change(function(){
			$(".contentreads").css("background-color",$(this).val());
			if($(this).val()!="transparent"){
				$(".contentreads").css({"box-shadow":"0px 0px 2px #ccc","padding-left":"15px","padding-right":"15px"});
			}else{
				$(".contentreads").css("box-shadow","");
			}
		}).val("{{$base_data['website']['background_content_read']}}");

		if($("#backgroundcolor").val()!="transparent"){
			$(".contentreads").css({"padding-left":"15px","padding-right":"15px"});
		}
		$("#caidat").click(function(){
			$("#option").slideToggle();
		});

		$(".navigator").show();
	});
</script>
@endsection