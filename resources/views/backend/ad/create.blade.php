@extends('backend.layout')
@section('title','Thêm quảng cáo - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/ad')}}">Quảng cáo</a></h2>
    <span>Tạo mới</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" action="" id="frm">
      <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tiêu đề:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="title" class="form-control">{{old('title')}}</textarea>
                        <span class="desc">Nội dung hiển thị khi rê chuột vào</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Link:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="url" value="{{old('url')}}" class="form-control" />
                        <span class="desc">
                          Link khi click vào quảng cáo sẽ chuyển đến?
                        </span>
                    </div>
                   
                </div><br />
            </div>
        </div><br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Hình Ảnh:</label>
                    </div>
                    <div class="col-md-8 required boxupload">
                        <span class="red">*</span>
                        <img src="{{Asset('public/images/uploadimg.png')}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control " name="image" id="imagechooseval" />Hoặc upload ảnh khác.</div>
                    </div>
                </div><br />
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Vị trí:</label>
                    </div>
                    <div class="col-md-8 required">
                      <span class="red">*</span>
                        <select name="position" class="form-control">
                          <option value="-1">-- Lựa chọn --</option>
                          <option value="1">Bên trái web</option>
                          <option value="2">Bên phải web</option>
                          <option value="3">Khung quảng cáo</option>
                          <option value="4">Loại sản phẩm</option>
                          <option value="5">Box khuyến mãi</option>
                        </select>
                        <span class="desc">
                          Nơi hiển thị quảng cáo này?
                        </span>
                    </div>
                   
                </div><br />
            </div>
         
        </div><br />
   
      <div class="row">
        <div class="col-md-12 text-right" id="valiapp">
          <input type="submit" class="btn btn-success" disabled="disabled" value="Lưu Lại" />
          <input type="reset" class="btn btn-default" value="Nhập Lại" />
        </div>
      </div><br />
      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    </form>
@include('backend.upload')
<a class="nicupload showupload" href="#nicupload">Upload</a>
  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript" src="{{Asset('')}}public/js/dialog.js"></script>
<script type="text/javascript">
  var base_url_admin="{{url('admin')}}/";
    var asset_path="{{Asset('public')}}/";
    var __token="{{csrf_token()}}";
    var btnUpload=null;
     function callBackUpload(idobjclick,path){
            if(idobjclick=="#nicupload"){
                $("textarea"+btnUpload).parent().find(".nicEdit-main").append("<div class='postimg'><img src='"+asset_path+"images/"+path+"' /></div>");
                return false;
            }
            $(idobjclick).val(path);
            $(".boxupload img").attr("src",asset_path+"images/"+path);
    
            $("#frm input[name='image']").removeClass("error").next(".errortext").hide();
        }
    $(function(){
    
    $("#frm").kiemtra([
            {
                'name':'image',
                'trong':true
            },{
              'name':'position',
              'select':true
            }
      ]);

        $("#valiapp").show().find("input[type='submit']").removeAttr("disabled");
  });
</script>

<script type="text/javascript" src="{{Asset('')}}public/js/jsupload.js"></script>


<script type="text/javascript">
  
  var currentPage = "#menu_ad";
  

  $(document).ready(function(){
    
  });

  </script>

@endsection