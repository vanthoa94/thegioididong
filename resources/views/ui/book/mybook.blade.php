@extends('ui.layout')

@section('title','Sách của bạn')

@section('css')
<link href="{{Asset("public/css/index.css")}}" rel="stylesheet" />
<link href="{{Asset("public/css/paginate.css")}}" rel="stylesheet" />
@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">

		<div id="breadcrumb-global">
			<ul class="clearfix">
		
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><b>Sách của bạn</b></li>
			</ul>
		</div>


		<div class="box">
			<h2>Sách bạn mua <a href="#"> Có {{$total}} sách</a></h2>
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
						<p style="color:#777">
							{{date('d/m/Y H:i',strtotime($item->created_at))}}
						</p>
						<p>
							Giá mua: {{number_format($item->gia_mua,0,'.',',')}} VNĐ
						</p>
					</div><!--item-->
					@endforeach
				</div>
			</div><!--content-box-->
		</div>

		<div class="phantrang pull-right clearfix">
				{!! $products->render() !!}
			</div> 


	</div>

	<div class="col-xs-12 col-sm-4 col-md-4" id="bbrightt">
		@include('ui.boxright')
	</div><!--colright-->
</div>
<script type="text/javascript">
	pageId='mybook';
</script>
@endsection