@extends('ui.layout')

@section('title',$base_data['website']['title'])

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">

	<div id="slide" class="col-xs-offset-0 col-sm-offset-4 col-md-offset-3" style="padding-right:15px">
		@foreach($slideshow as $item)
			<a href="{{$item->url==''?'#':$item->url}}" title="{{$item->title}}"><img src="{{\App\Product::showImage($item->image)}}" alt="{{$item->title}}"></a>
		@endforeach
		
	</div>
</div>

<div class="row contentmain">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<div class="box">
			<h2>Sách Tiếng Hoa <a href=""> Xem thêm &gt;&gt;</a></h2>
			<div class="contentbox clearfix">
				<div class="row">
					@foreach($listBookNew as $item)

					<div class="item col-xs-6 col-sm-6 col-md-4">
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
	</div><!--colleft-->

	<div class="col-xs-12 col-sm-6 col-md-6 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>

@endsection