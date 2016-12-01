@extends('ui.layout')

@section('title',$base_data['website']['title'])

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
@endsection

@section('content')

<div class="banner clearfix">
	<div style="width:300px;height:1px" class="pull-left">

	</div>
	<div id="slide" class="pull-left"><div id="contentslide" style="width: 780px; margin-left: 0px;"><a href="http://www.tienghoadidong.com"><img src="http://www.tienghoadidong.com/style/images/slide/qc%203.jpg" alt=""></a></div><div id="prev" class="slidehide"></div><div id="next" class="slidehide"></div><div id="arrow" class=""><li class="active"></li></div></div>
</div>


<div class="row contentmain">
	<div class="col-xs-12 col-sm-8 col-md-6">
		<div class="box">
			<h2>Sách Tiếng Hoa <a href=""> Xem thêm &gt;&gt;</a></h2>
			<div class="contentbox clearfix">
				<div class="row">
					@foreach($listBookNew as $item)

					<div class="item col-xs-6 col-sm-4 col-md-4">
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

	<div class="col-xs-12 col-sm-4 col-md-6">
		@include('ui.boxright')
	</div><!--colright-->
</div>

@endsection