@if(isset($cothemuondoc))
	<div class="bright brightf">
		<h2>Có thể bạn muốn đọc</h2>
		<div class="contentbox boxbook">
			@foreach($cothemuondoc as $item)
			<div class="item clearfix">

				<div class="pull-left imagebook">
					<a href="{{url($item->url.'.html')}}"><img src="{{\App\Product::showImage($item->image)}}" /></a>
				</div>
				<div class="namebook">
					<a href="{{url($item->url.'.html')}}">
						{{$item->name}}
					</a>

					<span>Lượt xem: {{$item->viewer}}</span>

					<span>Tác giả: {{$item->author}}</span>
					<span>Giá: @if($item->price==0) 
						Miễn phí 
						@elseif($item->price_pro==0) 
							{{number_format($item->price,0,'.',',')}} VNĐ
						@else 
							{{number_format($item->price_pro,0,'.',',')}} VNĐ
						@endif</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endif

@if(isset($base_data['featured']))
	<div class="bright brightf">
		<h2>Sách nổi bật</h2>
		<div class="contentbox boxbook">
			@foreach($base_data['featured'] as $item)
			<div class="item clearfix">

				<div class="pull-left imagebook">
					<a href="{{url($item->url.'.html')}}"><img src="{{\App\Product::showImage($item->image)}}" /></a>
				</div>
				<div class="namebook">
					<a href="{{url($item->url.'.html')}}">
						{{$item->name}}
					</a>

					<span>Lượt xem: {{$item->viewer}}</span>

					<span>Tác giả: {{$item->author}}</span>
					<span>Giá: @if($item->price==0) 
						Miễn phí 
						@elseif($item->price_pro==0) 
							{{number_format($item->price,0,'.',',')}} VNĐ
						@else 
							{{number_format($item->price_pro,0,'.',',')}} VNĐ
						@endif</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endif

@if(isset($base_data['newbooks']))
	<div class="bright brightf">
		<h2>Sách mới</h2>
		<div class="contentbox boxbook">
			@foreach($base_data['newbooks'] as $item)
			<div class="item clearfix">

				<div class="pull-left imagebook">
					<a href="{{url($item->url.'.html')}}"><img src="{{\App\Product::showImage($item->image)}}" /></a>
				</div>
				<div class="namebook">
					<a href="{{url($item->url.'.html')}}">
						{{$item->name}}
					</a>

					<span>{{date('d/m/Y H:i',strtotime($item->updated_at))}}</span>

					<span>Tác giả: {{$item->author}}</span>
					<span>Giá: @if($item->price==0) 
						Miễn phí 
						@elseif($item->price_pro==0) 
							{{number_format($item->price,0,'.',',')}} VNĐ
						@else 
							{{number_format($item->price_pro,0,'.',',')}} VNĐ
						@endif</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endif

<style type="text/css">
#boxfacebookline{
	overflow: hidden;
}

</style>
<div id="fb-root"></div>
<div class="bright brightf">
	<h2>Facebook</h2>
	<div class="contentbox" id="boxfacebookline">
		<!--<div class="fb-like-box" id="facebook_like_box" data-href="{{$base_data['website']['facebook']}}" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>-->
	</div>
</div>




@if(isset($base_data['qc'][2]) && count($base_data['qc'][2])>0)

<?php  function showUrlPage2($path){
                                if(strpos($path, "http")===0)
                                    return $path;
                                return url($path);
                            } ?>
<div class="bright brightf">
	
	<div class="contentbox">
		@foreach($base_data['qc'][2] as $item)
			 <a href="{{$item['url']==''?'#':showUrlPage2($item['url'])}}" title="{{$item['title']}}" style="display:block;text-align:center;margin-bottom:10px"><img style="max-width:100%" alt="{{$item['title']}}" src="{{\App\Product::showImage($item['image'])}}" /></a>
		@endforeach
	</div>
</div>

@endif

@if(isset($base_data['videos']))
<div class="bright brightf" id="byoutube">
	<h2>Youtube
		<a href="{{url('video.html')}}">Xem thêm >></a>
	</h2>
	<div class="contentbox">
		<div class="row">
			@foreach($base_data['videos'] as $item)
			<div class="itemboxy col-xs-12 col-sm-6 col-md-6" style="margin:5px auto;" title="Click để xem" data-video="{{$item->video_url}}">
				
				<img src="{{\App\Product::showImage($item->image)}}" />
				<h3 style="padding:5px 0px">{{$item->name}}</h3>
			</div>
			@endforeach
			
		</div>
	</div>
</div>

<div id="dialogvideo">
	 <div class='header'>
        <span>Dialog</span> <i title="close" class="closedialog"></i>
    </div>
    <div class='ct'>
    	<div id="ctvideo">

    	</div>
    	
    </div>
</div>


@endif

@section('script')
<script>
$(window).load(function(){
	var widthbox=document.getElementById('boxfacebookline').offsetWidth;
	document.getElementById('facebook_like_box').setAttribute('data-width',widthbox);
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
});

if($("#byoutube .contentbox div").size()==0){
$("#byoutube").hide();
}
var dialogvideo=null;
$(document).ready(function(){
	dialogvideo=new dialog($("#dialogvideo"),{
        "width":600,
        "height":380,
        "removeObj":"#ctvideo"
    });
    dialogvideo.init();
    $("#byoutube .itemboxy").click(function(){
        var obj=dialogvideo.getObj();
        obj.find(".header span").html($(this).find("h3").eq(0).html());
        obj.find(".ct #ctvideo").html('<iframe width="560" height="315" src="'+$(this).attr("data-video")+'" frameborder="0" allowfullscreen></iframe>');
        dialogvideo.show();
        return false;
    });
});

</script>

@endsection