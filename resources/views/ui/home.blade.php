@extends('ui.layout')

@section('title',$base_data['website']['title'])

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
@endsection


@section('content')
<style type="text/css">

#headermenu .danhmuc ul{
    display: block;
}
</style>
<div class="row">

	<div id="slide" class="col-xs-offset-0 col-sm-offset-4 col-md-offset-3" style="padding-right:15px;height:250px">
		@foreach($slideshow as $item)
			<a href="{{$item->url==''?'#':$item->url}}" title="{{$item->title}}"><img src="{{\App\Product::showImage($item->image)}}" alt="{{$item->title}}"></a>
		@endforeach
		
	</div>
</div>

<div class="row contentmain">
	<div class="col-xs-12 col-sm-6 col-md-6">

		@foreach($listCateInHome as $value)

		<div class="box">
			<h2>{{$value->name}} <a href="{{url($value->url)}}"> Xem thêm &gt;&gt;</a></h2>
			<div class="contentbox clearfix">
				<div class="row">
					@foreach($listBookNew[$value->id] as $item)

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
		</div><br />

		@endforeach
	</div><!--colleft-->

	<div class="col-xs-12 col-sm-6 col-md-6" id="bbrightt">
		@include('ui.boxright')
	</div><!--colright-->
</div>

<script type="text/javascript">
currentPage="Trang chủ";
pageId='home';
</script>

@endsection

@section('script2')

    <script src="{{Asset("public/js/jshome.js")}}" type="text/javascript"></script>
@endsection