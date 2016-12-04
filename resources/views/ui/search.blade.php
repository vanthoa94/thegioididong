@extends('ui.layout')

@section('title','Tìm kiếm')

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
<link href="{{Asset("public/css/paginate.css")}}" rel="stylesheet" />
<link href="{{Asset("public/css/videos.css")}}" rel="stylesheet" />
@endsection

@section('content')


<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="/">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>Tìm kiếm</b></li>
			</ul>
		</div>

		@if($total>0)
		<div class="box">
			<h2>Kết quả tìm kiếm sách <a href="#"> tìm thấy {{$total}} sách</a></h2>
			<div class="contentbox clearfix">
				<div class="row">
					@foreach($products as $item)

					<div class="item col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="image">
							<a href="{{url($item->url.'.html')}}"><img src="{{\App\Product::showImage($item->image)}}" alt="﻿{{$item->name}}" /></a>
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
		
		<div class="phantrang pull-right clearfix">
				{!! $products->render() !!}
		</div>
		<br />
		@endif 

		@if($total1>0)
		<div class="box">
			<h2>Kết quả tìm kiếm video <a href="#"> tìm thấy {{$total1}} video</a></h2>
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

		@endif

		@if($total==0 && $total1==0)
			Không tìm thấy bất kỳ kết quả nào cho từ khóa <strong>{{$_GET['q']}}</strong>. <a href="{{url('lien-he.html')}}">Liên hệ</a> với chúng tôi để biết thêm thông tin. Cảm ơn.
		@endif

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
		@include('ui.boxright')
	</div><!--colright-->
</div>


@endsection

@section('script2')
<script type="text/javascript">
$(document).ready(function(){
	var query="{{$_GET['q']}}";
	$(".pagination a").each(function(){
		$(this).attr('href',$(this).attr('href')+"&q="+query);
	});
});
</script>
@endsection