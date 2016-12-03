@extends('ui.layout')

@section('title',$info['name'])

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="/">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>{{$info['name']}}</b></li>
			</ul>
		</div>


		<div class="box">
			<h2>{{$info['name']}} <a href="#"> Có {{count($products)}} sách</a></h2>
			<div class="contentbox clearfix">
				<div class="row">
					@foreach($products as $item)

					<div class="item col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="image">
							<a href="{{url($item->url.'.html')}}"><img src="{{\App\Product::showImage($item->image)}}" alt="﻿{{$item->name}}"></a>
						</div>
						<h3>
							<a href="{{url($item->url.'.html')}}">﻿{{$item->name}}</a>
						</h3>
						<span class="tacgia">{{$item->author}}</span>
						<p>
							@if($item->price!=0)
								@if($item->price_pro!=0 && $item->price_pro<$item->price)
									{{number_format($item->price_pro,0,'.',',')}} VNĐ <s>{{number_format($item->price,0,'.',',')}} VNĐ</s>
								@else
									{{number_format($item->price,0,'.',',')}} VNĐ
								@endif
							@else
								Miễn phí
							@endif
						</p>
					</div><!--item-->
					@endforeach
				</div>
			</div><!--content-box-->
		</div>


	</div>

	<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>


@endsection