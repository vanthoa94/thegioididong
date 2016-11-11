@extends('backend.layout')
@section('title','Admin Control Panel')

@section('breadcrumb')
<h2>Trang Chủ</h2>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/css/morris.css')}}" />

@endsection

@section('content')
<div class="row">



	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-12 text-right">
						<div class="huge">{{$data->o}}</div>
						<div>Khách đang truy cập :: <a href='javascript:void(0)' data-toggle="modal" data-target="#ModalOnline" id="viewUserOnline">xem</a></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!--//box-->
	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-12 text-right">
						<div class="huge">{{$data->oday}}</div>
						<div>Khách truy cập trong ngày</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!--//box-->

	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					
					<div class="col-xs-12 text-right">
						<div class="huge">{{$data->omonth}}</div>
						<div>Khách truy cập trong tháng</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//box-->

	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-12 text-right">
						<div class="huge">{{$data->s}}</div>
						<div>Tổng số lượt truy cập</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//box-->



	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-cube fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->sanpham}}</div>
						<div>Sản phẩm</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/product')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->
	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-globe fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->tintuc}}</div>
						<div>Tin tức</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/news')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->

	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-list fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->menu}}</div>
						<div>Menu</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/menu')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->

	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-picture-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->slide}}</div>
						<div>Slideshow</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/slide')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->


	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-bullhorn fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->quangcao}}</div>
						<div>Quảng cáo</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/ad')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->
	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-th fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->ungdung}}</div>
						<div>Ứng dụng</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/app')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->

	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-youtube-play fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->video}}</div>
						<div>Video</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/video')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->

	<!--box-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-bookmark fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{$data->page}}</div>
						<div>Trang</div>
					</div>
				</div>
			</div>
			<a href="{{url('admin/page')}}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<!--//box-->


	<div class="col-md-12">
		<hr />
		<div>
			<form method="get" action="" class="pull-right">
				<select name="thang"  style="height:28px">
					<?php 
					for($i=1;$i<=12;$i++){ ?>
					<option <?php echo ($i==$currentMonth?"selected='selected'":'') ?> value="<?php echo $i ?>">Tháng <?php echo $i ?></option>
					<?php } ?>
				</select>
				<select name="nam" style="height:28px">
					<?php 
					for($i=2016;$i<=$year;$i++){ ?>
					<option <?php echo ($i==$currentYear?"selected='selected'":'') ?> value="<?php echo $i ?>">Năm <?php echo $i ?></option>
					<?php } ?>
				</select>
				<input type="submit" value="Xem" class="button s1" />
			</form>
		</div>
		<br />
		<div id="morris-area-chart"></div>
		<div class="text-center">Biểu đồ truy cập website tháng <?php echo $currentMonth ?> năm <?php echo $currentYear ?></div><br />

	</div><!--//Biểu Đồ-->

</div>

<div id="ModalOnline" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Khách đang truy cập</h4>
			</div>
			<div class="modal-body">
				<div style="width:90px;margin:10px auto" class="clearfix">
					<span style="display:block;font-size:13px;margin-top:1px">Loading...</span>
				</div>
			</div>

			<div class="modal-footer">
                    <button class="btn btn-primary">Tải lại</button>
                    <button class="btn" data-dismiss="modal">Đóng</button>
                </div>
		</div>

	</div>
</div>

<style type="text/css">
	.panel .huge{
		font-size: 30px;
	}
</style>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('public/js/RunAjax.js')}}"></script>
<script src="{{Asset('public/js/moris/morris.min.js')}}"></script>
<script src="{{Asset('public/js/moris/raphael-min.js')}}"></script>
<script type="text/javascript">
var token="{{csrf_token()}}";
var currentPage="#menu_home";

function loadUserOnline(callback){
	RunAjax(base_url+"/listonline",{"_token":token},function(result){
			var html="<table class='table'><tr bgcolor='#f5f5f5'><th width='20%'>IP</th><th width='25%'>Truy Cập Lúc</th><th width='30%'>Vị trí</th><th width='25%'>Quốc gia</th></tr>";

			for(var i=0;i<result.length;i++){
				html+="<tr><td>"+result[i].ip+"</td><td>"+result[i].last_visit+"</td><td>"+result[i].position+"</td><td><a href='#' data-ip='"+result[i].ip+"'>Xem</a></td></tr>";
			}
			html+="</table>";
			$("#ModalOnline .modal-body").html(html);

			if(callback!=null){
				callback();
			}
		});
}

$(document).ready(function(){
	$("#ModalOnline").on('show.bs.modal',function(){
		if(!$(this).hasClass("success")){
			var th=$(this);
			th.find(".modal-footer").hide();
			loadUserOnline(function(){
				th.addClass("success");
				th.find(".modal-footer").show();
			});
			
		}
	}).find(".btn-primary").click(function(){
		loadUserOnline();
	});

	$("#ModalOnline .modal-body").on('click','a',function(){
		var th=$(this);
		if(th.hasClass("running"))
			return false;
		if(th.attr("data-ip")!="::1"){
			th.addClass("running");
			th.html('Đang tải...');
			$.get('http://ip-api.com/json/'+th.attr('data-ip'),function(r){
				if(r.status=="success"){
					th.parent().html(r.city+"/"+r.country);
				}
				else
					th.html("Không xác định");

				th.removeClass("running");
			});
		}else{
			th.parent().html("localhost");
		}
		return false;
	});

	$(".side-nav li").eq(0).addClass("active");

						Morris.Area({
							element: 'morris-area-chart',
							data: [
							<?php foreach ($thongke as $itk) {?>
								{
									day: "<?php echo $itk['d'] ?>",
									sl:<?php echo $itk['sl'] ?>
								},
								<?php } ?>
								],
								xkey: 'day',
								ykeys: ['sl'],
								labels: ['Lượt truy cập'],
								pointSize: 2,
								hideHover: 'auto',
								resize: true,
								parseTime: false,
								smooth: false
							});

						$("#viewUserOnline").click(function(){
							if(!$(this).hasClass("success")){
								LoadJson(base_url_admin+'ajax/loaduseronline',{},function(result){
									var html="<table class='table'><tr bgcolor='#f5f5f5'><th>Lần Truy Cập Cuối</th><th>IP</th></tr>";

									for(var i=0;i<result.length;i++){
										html+="<tr><td>"+result[i].last_visit+"</td><td>"+result[i].ip+"</td></tr>";
									}
									html+="</table>";
									$("#ModalOnline .modal-body").html(html);
								});
							}
						});
});
</script>

@endsection