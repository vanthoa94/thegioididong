@extends('ui.layout')

@section('title','Video')

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
<link href="{{Asset("public/css/paginate.css")}}" rel="stylesheet" />
<link href="{{Asset("public/css/videos.css")}}" rel="stylesheet" />
@endsection

@section('meta')
	<meta name="description" content="Video {!!$base_data['website']['meta_description']!!}" />
	<meta name="keywords" content="video {!!$base_data['website']['meta_keywords']!!}" />
	<meta property='og:title' content='Video'/>
	<meta property='og:description' content='﻿{!!$base_data['website']['meta_description']!!}'/>
@endsection

@section('content')


<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>Video</b></li>
			</ul>
		</div>


		<div class="box">
			<h2>Youtube <a href="#"> Có {{$total}} video</a></h2>
			<div class="contentbox clearfix boxvideos">
				<div class="row">
					@foreach($videos as $item)

					<div class="item col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="image">
							<a href="{{url('video/'.$item->url.'.html')}}"><img src="{{\App\Product::showImage($item->image)}}" alt="﻿{{$item->name}}" /></a>
						</div>
						<h3>
							<a href="{{url('video/'.$item->url.'.html')}}">﻿{{$item->name}}</a>
						</h3>
						
					</div><!--item-->
					@endforeach
				</div>
			</div><!--content-box-->
		</div>
		
		<div class="phantrang pull-right clearfix">
				{!! $videos->render() !!}
			</div> 

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>

<script type="text/javascript">
currentPage="Xem danh sách video";
pageId='video';
</script>
@endsection
