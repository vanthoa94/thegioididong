@extends('backend.layout')
@section('title','Cấu hình website - ACP')

@section('breadcrumb')
<h2>Cấu hình website</h2>
@endsection


@section('content')


@include('backend._message')



<form method="post" id="frm" action="{{url('admin/setting/update')}}">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu menu top:</label>
				</div>
				<div class="col-md-8 ">
					<input type="color" name="background_menutop" style="height:100px;width:100px" value="<?php echo $data['background_menutop'] ?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu nền:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="background_color" style="height:100px;width:100px" value="<?php echo $data['background_color'] ?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
	</div>
	

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu banner:</label>
				</div>
				<div class="col-md-8 boxupload">
					<input type="color" name="background_header" style="height:100px;width:100px" value="<?php echo $data['background_header'] ?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu chữ menu:</label>
				</div>
				<div class="col-md-8 required">
					<span class="red">*</span>
					<input type="color" name="background_color_menu" style="height:50px;width:100px" value="<?php echo $data['background_color_menu']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu chữ hover menu:</label>
				</div>
				<div class="col-md-8 required">
					<span class="red">*</span>
					<input type="color" name="background_hover_menu" style="height:50px;width:100px" value="<?php echo $data['background_hover_menu']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu footer:</label>
				</div>
				<div class="col-md-8 required">
					<span class="red">*</span>
					<input type="color" name="background_footer" style="height:50px;width:100px" value="<?php echo $data['background_footer']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu menu:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="background_menu" style="height:50px;width:100px" value="<?php echo $data['background_menu']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu chữ:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="TextColor" style="height:50px;width:100px" value="<?php echo $data['TextColor']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu chữ hover:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="TextColorHover" style="height:50px;width:100px" value="<?php echo $data['TextColorHover']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu chữ menu top:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="text_color_menutop" style="height:50px;width:100px" value="<?php echo $data['text_color_menutop']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu nền box right:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="background_boxright" style="height:50px;width:100px" value="<?php echo $data['background_boxright']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Border box right:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="border_box_right" style="height:50px;width:100px" value="<?php echo $data['border_box_right']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Hiển thị bóng box right:</label>
				</div>
				<div class="col-md-8">
					<input type="checkbox" name="show_box_shadow" <?php echo $data['show_box_shadow']==1?"checked='checked'":"" ?> />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			
			<div class="row">
				<div class="col-md-4">
					<label>Màu nền trang đọc sách:</label>
				</div>
				<div class="col-md-8">
					<input type="color" name="background_content_read" style="height:50px;width:100px" value="<?php echo $data['background_content_read']?>" />
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>

	<div class="row margin">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Màu chữ trang đọc sách:</label>
				</div>
				<div class="col-md-8">
					<select name="content_color" id="content_color">
						<option value="#333333">Đen</option>
						<option value="blue">Xanh</option>
						<option value="red">Đỏ</option>
						<option value="#fd00ff">Hồng</option>
						<option value="#af0dff">Tím</option>	
						<option value="#999999">Xám</option>

					</select>
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>


		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
					<label>Kích thước chữ trang đọc sách:</label>
				</div>
				<div class="col-md-8">
					<select name="content_size" id="content_size">
						<option value="15px">15</option>
						<option value="16px">16</option>
						<option value="17px">17</option>
						<option value="18px">18</option>
						<option value="19px">19</option>
						<option value="20px">20</option>
						<option value="21px">21</option>
						<option value="22px">22</option>
					</select>
					<span class="desc">.</span>
				</div>
			</div><br />
		</div>
		
	</div>


	<div class="row">
    		<div class="col-md-12 text-right">
    			<input type="submit" class="btn btn-success" value="Lưu Lại" />
    			<input type="button" class="btn btn-default" value="Hủy bỏ" onclick="window.location.reload()" />
    		</div>
    	</div><br />
    	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
</form>

@endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>

<script type="text/javascript">
  var base_url_admin="{{url('admin')}}/";
    var asset_path="{{Asset('public')}}/";
    var __token="{{csrf_token()}}";
    var btnUpload=null;

    var content_color="{{$data['content_color']}}";
    var content_size="{{$data['content_size']}}";
   
    $(function(){

    	$("#content_color").val(content_color);
    	$("#content_size").val(content_size);

    
    $("#frm").kiemtra([
        {
          'name':'title',
          'trong':true
        },
            {
                'name':'image',
                'trong':true
            },
            {
                'name':'description',
                'trong':true
            },
            {
                'name':'cate_id',
                'select':true
            }
      ]);

        
  });
</script>



<script type="text/javascript">
  
  var currentPage = "#menu_info";
  var subPage="setting";


  $(document).ready(function(){
    

  });

  </script>
@endsection
