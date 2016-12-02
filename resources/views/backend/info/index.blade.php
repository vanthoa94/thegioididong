@extends('backend.layout')
@section('title','Thông tin website - ACP')

@section('breadcrumb')
<h2>Thông tin website</h2>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
@endsection

@section('content')

<?php 
function showImage($path){
        if(strpos($path, "http")===0)
            return $path;
        return Asset('public/images/'.$path);
    }
 ?>

@include('backend._message')

<div>
<h4 style="margin-bottom:0px;padding-bottom:0px">Thông Tin Chung</h4>
	<hr style="margin-top:10px;padding-top:0px" />
<form method="post" id="frm-all" action="{{Asset('admin/info/postinfoall')}}">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Tiêu đề:</label>
				</div>
				<div class="col-md-8 required">
					<div class="red">*</div>
					<textarea rows="3" class="form-control" name="title"><?php echo $data['title'] ?></textarea>
					<span class="desc">Tên website</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Mô Tả:</label>
				</div>
				<div class="col-md-8">
					<textarea rows="3" class="form-control" name="meta_description"><?php echo $data['meta_description']?></textarea>
					<span class="desc">Dùng cho SEO</span>
				</div>
			</div><br />
		</div>
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Từ Khóa:</label>
				</div>
				<div class="col-md-8">
					<textarea rows="3" class="form-control" name="meta_keywords"><?php echo $data['meta_keywords']?></textarea>
					<span class="desc">Mỗi từ khóa cách nhau 1 dấu ','</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				
				<div class="col-md-4">
					<label>Copyright:</label>
				</div>
				<div class="col-md-8">
					<textarea rows="3" class="form-control" name="copyright"><?php echo str_replace("<br>","\n",$data['copyright'])?></textarea>
					<span class="desc">Thông tin bản quyền</span>
				</div>
			</div><br />
		</div>
	</div>

	


	<div class="row">
    		<div class="col-md-12 text-right">
    			<input type="submit" class="btn btn-success" value="Lưu Lại" />
    			<input type="reset" class="btn btn-default" value="Nhập Lại" />
    		</div>
    	</div><br />
    	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>
</div><!--//Thông Tin Chung-->

<div>
<h4 style="margin-bottom:0px;padding-bottom:0px">Thông Tin Liên hệ</h4>
	<hr style="margin-top:10px;padding-top:0px" />
<form method="post" id="frm-contact" action="{{Asset('admin/info/contact')}}">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Hotline:</label>
				</div>
				<div class="col-md-8 required">
					<div class="red">*</div>
					<input type="text" class="form-control" name="hotline" value="<?php echo $data['hotline']?>" />
					<span class="desc">Các số điện thoại nóng</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Email:</label>
				</div>
				<div class="col-md-8 required">
					<div class="red">*</div>
					<input type="text" class="form-control" name="email" value="<?php echo $data['email']?>" />
					<span class="desc">Email</span>
				</div>
			</div><br />
		</div>
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Zalo:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" name="zalo" value="<?php echo $data['zalo']?>" />
					<span class="desc">Link zalo</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Facebook:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" name="facebook" value="<?php echo $data['facebook']?>" />
					<span class="desc">Link facebook</span>
				</div>
			</div><br />
		</div>
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Skype:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" name="skype" value="<?php echo $data['skype']?>" />
					<span class="desc">Link skype</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Youtube:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" name="google" value="<?php echo $data['google']?>" />
					<span class="desc">Link kênh youtube</span>
				</div>
			</div><br />
		</div>
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Địa chỉ:</label>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" name="address"><?php echo $data['address']?></textarea>
					<span class="desc">Địa chỉ công ty</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Giấy phép kinh doanh:</label>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" name="GPKD"><?php echo $data['GPKD']?></textarea>
					<span class="desc">Thông tin giấy phép kinh doanh</span>
				</div>
			</div><br />
		</div>
		
	</div>
	


	<div class="row">
    		<div class="col-md-12 text-right">
    			<input type="submit" class="btn btn-success" value="Lưu Lại" />
    			<input type="reset" class="btn btn-default" value="Nhập Lại" />
    		</div>
    	</div><br />
    	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>
</div><!--//Thông Tin Chung-->


<div>
<h4 style="margin-bottom:0px;padding-bottom:0px">Cấu hình email nhận liên hệ</h4>
	<hr style="margin-top:10px;padding-top:0px" />
<form method="post" id="frm-setting" action="{{Asset('admin/info/setting')}}">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Email:</label>
				</div>
				<div class="col-md-8 required">
					<div class="red">*</div>
					<input type="text" class="form-control" name="email_send" value="<?php echo $data['email_send']?>" />
					<span class="desc">Email nhận liên hệ khi có khách gửi liên hệ. Nếu là gmail thì <a target="_black" href="https://thachpham.com/wordpress/wordpress-tutorials/smtp-gmail-wordpress.html">vào đây</a> xem cách tắt bảo mật</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Password:</label>
				</div>
				<div class="col-md-8 required">
					<span class="red">*</span>
					<input type="password" class="form-control" name="password_send" value="<?php echo $data['password_send']?>" />
					<span class="desc">Password của email</span>
				</div>
			</div><br />
		</div>
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>SMTP Email Server:</label>
				</div>
				<div class="col-md-8 required">
					<div class="red">*</div>
					<input type="text" class="form-control" name="host_send" value="<?php echo $data['host_send']?>" />
					<span class="desc">VD: của gmail là: smtp.gmail.com, yahoo là: smtp.mail.yahoo.com. <a target="_black" href="http://kienthuc.pavietnam.vn/article/Email-Server/Huong-dan-Thu-thuat/Danh-sach-port-POP3---SMTP-Email-Server.html">Vào đây</a> để xem thêm</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Port SMTP Server:</label>
				</div>
				<div class="col-md-8 required">
					<span class="red">*</span>
					<input type="text" class="form-control" name="port_send" value="<?php echo $data['port_send']?>" />
					<span class="desc">VD: của gmail là: 465 hoặc 587, yahoo là: 465, 995. <a target="_black" href="http://kienthuc.pavietnam.vn/article/Email-Server/Huong-dan-Thu-thuat/Danh-sach-port-POP3---SMTP-Email-Server.html">Vào đây</a> để xem thêm</span>
				</div>
			</div><br />
		</div>
	</div>
		
	</div>
	


	<div class="row">
    		<div class="col-md-12 text-right">
    			<input type="submit" class="btn btn-success" value="Lưu Lại" />
    			<input type="reset" class="btn btn-default" value="Nhập Lại" />
    		</div>
    	</div><br />
    	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>
</div><!--//Thông Tin liên hệ-->




<div id="logofavicon" class="padding-content">
<h4>
	Logo & Favicon
	 
</h4>
	<hr />
	
	<div class="row">
			<div class="col-md-6">
				<b>Logo</b><br /><br />
				<form method="post" action="<?php echo Asset('admin/info/changelogo') ?>" id="frmchangelogo" enctype="multipart/form-data">
				<label for="logo" class="uploadimg">
					<div>
						<img class="img-thumbnail" src="{{Asset('public/images/logo.jpg')}}" data-old="logo.jpg" />
					</div>
					<br />
					<input type="file" name="logo" class="hide" id="logo" />
					</label>
					<span class="desc">Kích thước chuẩn: 220x94</span>
					<input type="submit" class="btn btn-success btn-xs disabled" disabled="disabled" value="Lưu Lại" />
					<input type="reset"  disabled="disabled" class="btn btn-primary btn-xs disabled" value="Hủy Bỏ" />
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				</form>
			</div>
			<div class="col-md-6">
				<b>Favicon</b><br /><br />
				<form method="post" action="<?php echo Asset('admin/info/changefavicon') ?>"  enctype="multipart/form-data">
				<label for="favicon" class="uploadimg">
					<div>
						<img class="img-thumbnail" src="{{Asset('public/images/favicon.ico')}}" data-old="favicon.ico" />
					</div>
					<br />
					<input type="file" name="favicon" class="hide" id="favicon" />
					</label>
					<br /><br />
					<br />
					<span class="desc">Kích thước chuẩn: 16x16.</span>

					<input type="submit" class="btn btn-success btn-xs disabled" disabled="disabled" value="Lưu Lại" />
					<input type="reset"  disabled="disabled" class="btn btn-primary btn-xs disabled" value="Hủy Bỏ" />
					<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				</form>
			</div>
		</div>

</div><!--//Logo và favicon-->


@endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>

<script type="text/javascript">
var currentPage = "#menu_info";
var subPage='info';
var asset_path="{{Asset('public')}}/";
function isImage(file) {
    file = file.split(".").pop();
    switch (file) {
        case "jpg": case "png": case "gif": case "bimap": case "jpeg": case "ico":
            return true;
        default:
            return false;
    }
    return false;
}
	function readURL(input) {
		if (input.files && input.files[0]) {
			if(isImage(input.files[0].name)){
				var reader = new FileReader();
				reader.onload = function (e) {
					$(input).parent().find(".img-thumbnail").attr("src",e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}else{
				alert("vui lòng chọn 1 hình ảnh");
			}
		}
		else {
			$(input).parent().find(".img-thumbnail").attr("src",  $(input).val());
		}
	}

$(document).ready(function(){

	$("#frm-all").kiemtra([
		{
			'name':'title',
			'trong':true
		}

	]);

	$("#frm-contact").kiemtra([
		{
			'name':'hotline',
			'trong':true
		},{
			'name':'email',
			'email':true
		}

	]);

	$("#frm-setting").kiemtra([
		{
			'name':'email_send',
			'email':true
		},{
			'name':'password_send',
			'trong':true
		},{
			'name':'host_send',
			'trong':true
		},{
			'name':'port_send',
			'so':true
		}

	]);

		$("label.uploadimg .hide").change(function(){
			if(this.files){
			readURL(this);
		}
			$(this).parent().parent().find(".disabled").removeClass("disabled").removeAttr("disabled");
		});
		$("#logofavicon form input[type='reset']").click(function(){
			var img=$(this).parent().find(".img-thumbnail");
			img.attr("src",asset_path+"images/"+img.attr("data-old"));
			var file = $(this).parent().find("input[type='file']");
			file.replaceWith(file.val('').clone(true));

			$(this).parent().find("input[type='submit']").addClass("disabled").attr("disabled","disabled");
			$(this).addClass("disabled").attr("disabled","disabled");
		});
});

</script>

@endsection
