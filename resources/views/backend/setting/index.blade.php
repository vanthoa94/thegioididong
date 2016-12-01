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
   
    $(function(){

    
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
