@extends('ui.layout')

@section('title',$info['name'])

@section('css')
<link href="{{Asset("public/css/detail.css")}}" rel="stylesheet" />
@endsection

@section('meta')
	<meta name="description" content="{!!$info['meta_description']!!}" />
	<meta name="keywords" content="{!!$info['meta_keywords']!!}" />
	<meta property='og:title' content='{!!$info['name']!!}'/>
	<meta property='og:description' content='﻿{!!$info['description']!!}'/>
	<meta property="og:image" content="{{\App\Product::showImage($info->image)}}" />
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

					$isLogin=($base_data['islogin']!==0);

					$classed="";
					if($isLogin){
						if($chuamua){
							$classed="muasachngay";
						}
					}else{
						$classed="loginweb";
					}

					$showurl=true;
					if($isLogin){
						if($chuamua){
							$showurl=false;
						}else{
							if(!$dakichhoat){
								$showurl=false;
							}
						}
					}else{
						$showurl=false;
					}

					if($info->price==-1){
						$showurl=true;
						$classed="";
					}

				 ?>
				<li><a href="{{url('/')}}">Trang chủ</a><span style="margin-left:5px;">»</span></li>
				<li><a href="{{url($urlcate)}}">{{$namecate}}</a><span style="margin-left:5px;">»</span></li>
				<li><b>﻿{{$info['name']}}</b></li>
			</ul>
		</div>
		@if(Session::has('error_message'))

		<?php $typeerror=session('error_message'); ?>

		<div class="alert alert-danger alert-dismissible">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		 
		  @if($typeerror=='1' || $typeerror=='3')
		   Bạn không thể đọc sách này do chưa <a href="#" class="{{$classed}}">đăng ký mua sách</a>.
		   @if($typeerror=='1')
		  	Nếu bạn đã mua sách này rồi. Vui lòng <a href="#" class="loginweb">đăng nhập</a> để đọc.
		  	@endif
		  @endif

		  @if($typeerror=='2')
		  	Bạn chưa đọc sách do sách chưa được kích hoạt.
		  @endif
		</div>
		@endif
		@if(Session::has('successs_message'))
		<div class="alert alert-success alert-dismissible">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<div class="text-center"><img src="{{Asset('public/images/agt_action_success.png')}}" /><br /><br /><b style="font-size:20px">ĐĂNG KÝ MUA SÁCH THÀNH CÔNG</b><br /><br /></div>

			<?php 
				$infomuasach=session('successs_message');
				$infomuasach=explode('|', $infomuasach);
			 ?>

		  	Bạn đã đăng ký mua sách <b>{{$info->name}}</b> thành công với giá <b>@if($info->price_pro!=-1 && $info->price_pro<$info->price)
									{{number_format($info->price_pro,0,'.',',')}} VNĐ
								@else
									{{number_format($info->price,0,'.',',')}} VNĐ
								@endif</b> vào lúc {{date('H:i d/m/Y',strtotime($ngay_mua_sach))}}. Sách sẽ được kích hoạt, sau khi bạn thanh toán <b>@if($info->price_pro!=-1 && $info->price_pro<$info->price)
									{{number_format($info->price_pro,0,'.',',')}} VNĐ
								@else
									{{number_format($info->price,0,'.',',')}} VNĐ @endif</b> vào tài khoản ngân hàng ở dưới, với nội dung chuyển tiền ghi: "mua sach {{$infomuasach[1]}}"<i>(Vui lòng không đổi số này, chúng tôi sẽ dựa vào số này để kích hoạt sách cho bạn.)</i>. <br />
								
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div style="padding:5px 10px;">
											<strong>THÔNG TIN TÀI KHOẢN</strong><br />
											{!!$base_data['website']['info_bank']!!}
										</div>
									
									</div>
									<div class="col-xs-12 col-sm-6">

										<div style="padding:5px;">
											<b>THÔNG TIN LIÊN HỆ</b><br />
											Họ tên: Phạm Minh Kha <br />
											Email: {{$base_data['website']['email']}}<br />
											Điện Thoại: {{$base_data['website']['hotline']}}
										</div>
									</div>
								</div>

									Chúng tôi sẽ gửi đến các thông tin liên quan, thông qua email <b>{!! $infomuasach[0] !!}</b>. Xin chân thành cảm ơn!
		</div>

		@endif

		<div class="row">

			<h1 class="title visible-xs" style="text-align:center; margin-bottom: 15px; text-transform:uppercase;">
					{{$info->name}}</h1>

			<div class="col-xs-4 col-sm-6 col-md-4">
				<img itemprop="image" alt="{{$info->name}}" title="{{$info->name}}" width="140" src="{{\App\Product::showImage($info->image)}}" style="box-shadow: 8px 8px 10px black;max-width:100%">
				
			</div>

			<div class="col-xs-8 col-sm-6 col-md-8" id="infobook">
				<h1 class="title hidden-xs" style="text-align:center; margin-bottom: 10px; text-transform:uppercase;">
					{{$info->name}}</h1>

				<p>
					<b>Tác giả:</b> <a href="{{url('tac-gia/'.$info->author.'.html')}}">{{$info->author}}</a>
				</p>

				<p><b>Thể loại:</b> <a href="{{url($urlcate)}}">{{$namecate}}</a></p>
				@if($info->price==-1)
				<p><b>Số chương:</b> {{$total}}</p>
				@else
				<p class="bookprice"><b>Giá sách:</b> @if($info->price_pro!=-1 && $info->price_pro<$info->price)
									{{number_format($info->price_pro,0,'.',',')}} VNĐ <s>{{number_format($info->price,0,'.',',')}} VNĐ</s>
								@else
									{{number_format($info->price,0,'.',',')}} VNĐ
								@endif</p>
				@endif
				<?php 
				$status=\App\Product::getStatus();

				$status=$status[$info->status];
				 ?>

				<p><b>Trạng Thái:</b> {{$status}}</p>

				<p><b>Lần đọc:</b> {{$info->viewer}}</p>

				<div id="likefb"><b class="hidden-xs">Like ngay:</b> 
					<div class="fb-like" data-href="{{Request::fullUrl()}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true">like</div>
				</div>
				
				<p id="ttt" class="hidden-xs">
					<span class="tt1">Đọc từ đầu</span>
					<span class="tt2">Đọc mục mới nhất</span>
					<span class="tt3">Danh sách mục</span>
				</p>

			</div>
			
		</div>

		@if($info->price>-1)
			@if($chuamua)
				<div class="clearfix" style="margin:15px auto;width:184px">
					<a href="#" class="btn btn-primary {{$classed}}" data-title="Đăng nhập mua sách">
						<img src="{{asset('public/images/v3_cart.png')}}" style="padding-right:7px" />
						<span style="font-size:15px">Đăng ký mua sách</span></a>
				</div>
			@else
				@if($dakichhoat)
					<div class="clearfix">
						<img src="{{asset('public/images/apply16x16.png')}}" width="20px" style="padding-right:5px" class="pull-left" />
						<strong class="pull-left">Bạn đã mua sách này</strong>
					</div>
				@else
					<div class="clearfix" style="margin:15px auto;width:220px">
						<a href="#" class="btn btn-primary clearfix huymuasach">
							<img src="{{asset('public/images/removeicon.png')}}" style="padding-right:2px;display:block;float:left;padding-top:3px;padding-bottom:3px" />
							<span style="font-size:14px;display:block;float:left;margin-top:-1.5px;padding:3px 5px">Hủy đăng ký mua sách này</span></a>
					</div>

					<div class="alert alert-warning">
						Bạn đã mua sách <strong>{{$info->name}}</strong> vào lúc {{date('H:i d/m/Y',strtotime($ngay_mua_sach))}} với giá <b>{{number_format($gia_mua,0,'.',',')}} VNĐ</b>. Sách sẽ được kích hoạt sau khi bạn thanh toán <b>{{number_format($gia_mua,0,'.',',')}} VNĐ</b> vào tài khoản ngân hàng, với nội dung chuyển tiền ghi: "mua sach {{$id_dk}}".
						<div style="padding:5px 10px;">
											<strong>THÔNG TIN TÀI KHOẢN</strong><br />
											{!!$base_data['website']['info_bank']!!}
										</div>
								Nếu bạn đã chuyển khoản rồi, sau vài giờ mà sách vẫn chưa được kích hoạt, vui lòng <a href="{{url('lien-he.html')}}">liên hệ</a> với chúng tôi.<br ><br > Trân trọng!
					</div>
				@endif
			@endif
		@endif

		<div id="ttt1" class="visible-xs clearfix">
				<span class="tt4">Giới thiệu sách</span>
				<span class="tt1">Đọc từ đầu</span>
				<span class="tt2">Đọc mục mới nhất</span>
				<span class="tt3">Danh sách mục</span>
		</div>

		<div id="noidung">
			<b>Nội Dung Sách:</b>
			<br />

			<div id="noidungct">{!!$info->promotion!!}</div>
		</div>



		<div class="boxchuong">

			<h2 class="titleboxx">{{count($muclucmoi)}} mục mới nhất</h2>
			<div class="contentboxx chappernew" id="list-chapter">
				@foreach($muclucmoi as $item)
					<li><h4>
						<a title="{{$item->name}}" href="{{$showurl?url($info->url.'/'.$item->url.'.html'):'javascript:void(0)'}}" class="{{$classed}}" data-title="Đăng nhập mua sách">{{$item->name}}</a></h4>
						<span class="w3-right w3-hide-small">{{date('d/m/Y',strtotime($item->created_at))}}</span>
					</li>
				@endforeach
			</div>
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


		<div class="boxchuong" id="listcccc">

			<h2 class="titleboxx">Danh sách mục "{{$info->name}}"</h2>
			<div class="contentboxx" id="list-chapter">
				@foreach($muclucs as $item)
					<li><h4>
						<a title="{{$item->name}}" href="{{$showurl?url($info->url.'/'.$item->url.'.html'):'javascript:void(0)'}}" class="{{$classed}}" data-title="Đăng nhập mua sách">{{$item->name}}</a></h4>
						<span class="w3-right w3-hide-small">{{date('d/m/Y',strtotime($item->created_at))}}</span>
					</li>
				@endforeach


			</div>
			
		</div>

		<div class="phantrang pull-right clearfix">
				{!! $muclucs->render() !!}
			</div> 

	</div>

	<div class="col-xs-12 col-sm-4 col-md-4" id="bbrightt">
		@include('ui.boxright')
	</div><!--colright-->
</div>

<style type="text/css">
.boxchuong{
	background-color: {{$base_data['website']['background_boxright']}}
}
</style>
<script type="text/javascript">
currentPage="Đọc sách";
	pageId='book:{{$info->id}}';
</script>

@endsection

@section('script2')
<script type="text/javascript">
function thunhogioithieu(){
	$("#hidecontentgt").remove();

var noidungct=$("#noidungct").html();


	if(noidungct.length>640){
		var noidung=noidungct.substr(0,640)+"...<a href='#' id='morecontent'>Xem thêm</a>";
		$("#noidungct").html(noidung+"<div class='hide'>"+noidungct+"</div>");

		$("#morecontent").on('click',function(){
			var p=$(this).parents('#noidungct').eq(0);

			p.html(p.find('.hide:eq(0)').html()+"<a href='#' id='hidecontentgt'>Thu nhỏ</a>");

			$(this).off('click');
			$("#hidecontentgt").on('click',function(){
				thunhogioithieu();
				$(this).off('click');
				return false;
			});
			return false;
		});
	}

}
$(document).ready(function(){
	$("#ttt .tt1,#ttt1 .tt1").click(function(){
		window.location.href=$("#listcccc .contentboxx li:eq(0) h4 a").attr("href");
	});

	$("#ttt1 .tt4").click(function(){
		$("#noidung").slideToggle();
	});

	$("#ttt1 .tt3,#ttt .tt3").click(function(){
		var listchuong=$("#listcccc").offset().top;
		$("html, body").stop().animate({scrollTop:listchuong-100},500);
	});

	$("#ttt1 .tt2,#ttt .tt2").click(function(){
		window.location.href=$(".chappernew:eq(0) li:eq(0) h4 a").attr("href");
	});



	thunhogioithieu();
});
</script>

@if(!$showurl)

<style type="text/css">
#dialogDkMuaSach,#dialogHuyDkMuaSach{
	display: none;
}

</style>

 <div id="dialogDkMuaSach">
     <div class='header'>
        <span>Đăng ký mua sách</span> <i title="close" class="closedialog"></i>
    </div>
    <div class='ct'>
        <div id="contentmuasach">
        	<div class="row">
        		<div class="col-xs-4">
					<img alt="{{$info->name}}" title="{{$info->name}}" width="80" src="{{\App\Product::showImage($info->image)}}" style="max-width:100%">
        		</div>
        		<div class="col-xs-8">
        			<h1 class="title" style="margin-bottom:5px;overflow:hidden;font-size:13px" title="{{$info->name}}">
					{{$info->name}}</h1>

						<div style="margin-bottom:3px">
							<b>Tác giả:</b> <a href="{{url('tac-gia/'.$info->author.'.html')}}">{{$info->author}}</a>
						</div>

						<div style="margin-bottom:3px"><b>Thể loại:</b> <a href="{{url($urlcate)}}">{{$namecate}}</a></div>

						<div style="margin-bottom:3px"><b>Số chương:</b> {{$total}}</div>
						
						<div><b>Lần đọc:</b> {{$info->viewer}}</div>
        		</div>
        	</div>
        	<br />
        	<div class="text-center" style="font-size:14px;font-weight:bold;border:1px dotted #ccc;padding:6px 2px">@if($info->price_pro!=-1 && $info->price_pro<$info->price)
								{{number_format($info->price_pro,0,'.',',')}} VNĐ <s style="color:#999">{{number_format($info->price,0,'.',',')}} VNĐ</s>
							@else
								{{number_format($info->price,0,'.',',')}} VNĐ
							@endif</div>
							<br />
							<div class="text-center">
			<div class="btn btn-info">Đăng ký mua</div>
			<div class="btn btn-default">Hủy bỏ</div>
			</div>
			 <div id="progressiconmuasach">
        </div>
        </div>
       
    </div>
</div>

 <div id="dialogHuyDkMuaSach" style="width:340px">
     <div class='header'>
        <span>Hủy đơn đăng ký mua sách</span> <i title="close" class="closedialog"></i>
    </div>
    <div style="position:relative">
    <div class='ct'>
        <p>Bạn có chắc muốn hủy đơn đăng ký mua sách <b>{{$info->name}}</b>?</p>
        

	    
    </div>
    <div style="position:absolute;bottom:0px;    width: 100%;padding:7px;border-top:1px solid #eee">
    	 <div class="text-right">	
	        <button id="dongyhuy" class="btn btn-success">Tôi đồng ý</button>
	        <button onclick="dialogHuyMuaSach.hide()" class="btn btn-default">Hủy bỏ</button>
	    </div>
    </div>

     <div id="progressiconhuymuasach">
	     </div>
    </div>

</div>

	<script type="text/javascript">

	var dialogMuaSach=null;
	var dialogHuyMuaSach=null;
	var book_id="{{$info->id}}";
	var book_price="{{$info->price_pro==-1?$info->price:$info->price_pro}}";
	var idDK="{{$id_dk or 0}}";
	var _token="{{csrf_token()}}";
	window['dkmuasach']=function(isLogin){
		if(dialogMuaSach==null){
            dialogMuaSach=new dialog($("#dialogDkMuaSach"),{
                "width":340,
                "height":285
            });
            dialogMuaSach.init();
            if(isLogin!=null){
            	$(".loginweb").off('click').addClass('muasachngay').removeClass(".loginweb");
            	$(".muasachngay").click(function(){
					window['dkmuasach']();
				});
        	}

        	dialogMuaSach.getObj().find(".btn-default").click(function(){
        		dialogMuaSach.hide();
        	});

        	dialogMuaSach.getObj().find(".btn-info").click(function(){
        		showProgressIconMS();
        		RunAjax(base_url+"/mua-sach",{'book_id':book_id,'price':book_price,"_token":_token},function(r){
			        if(r.success){
			            window.location.reload();
			        }else{
			            alert(r.message);
		              	hideProgressIconMS();
			        }
			      
			    });
        	});
        }
        if(isLogin==null)
        	dialogMuaSach.show();
    	else
    	{
    		dialogMuaSach.show();
    		showProgressIconMS();
    		RunAjax(base_url+"/kt-mua-sach",{'book_id':book_id,"_token":_token},function(r){
		        if(r=='OK'){
		             window.location.reload();
		        }
		        hideProgressIconMS();
		    });
    	}
	};

	function showProgressIconMS(){
	     dialogMuaSach.getObj().find("#progressiconmuasach").show();
	}

	function hideProgressIconMS(){
	     dialogMuaSach.getObj().find("#progressiconmuasach").hide();
	}


	$(document).ready(function(){
		$(".loginweb").attr("data-callback",'dkmuasach');
		$(".muasachngay").click(function(){
			window['dkmuasach']();
		});
		$(".alert-dismissible .close").click(function(){
			$(this).parent().fadeOut();
			return false;
		});

		$(".huymuasach").click(function(){
			if(dialogHuyMuaSach==null){
				$("#dialogHuyDkMuaSach").show();
	            dialogHuyMuaSach=new dialog($("#dialogHuyDkMuaSach"),{
	                "width":340,
	                "height":$("#dialogHuyDkMuaSach .ct:eq(0) p:eq(0)").height()+110
	            });
	            dialogHuyMuaSach.getObj().find("#dongyhuy").click(function(){
	            	 dialogHuyMuaSach.getObj().find("#progressiconhuymuasach").show();
	            	RunAjax(base_url+"/mua-sach/huy",{'id':idDK,"_token":_token},function(r){
				        if(r.success){
				            window.location.reload();
				        }else{
				            alert(r.message);
			              	 dialogHuyMuaSach.getObj().find("#progressiconhuymuasach").hide();
				        }
				      
				    });
	            });
	            dialogHuyMuaSach.init();
	        }
	        dialogHuyMuaSach.show();
	        return false;
		});
	});
	</script>
@endif

@endsection