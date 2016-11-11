@extends('backend.layout')
@section('title','Sửa video - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/video')}}">Video</a></h2>
    <span>Cập nhật</span>
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

    <form method="post" action="{{url('admin/video/update')}}" id="frm">
      <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tên video:</label>
                    </div>
                    <div class="col-md-8 required">
                      <span class="red">*</span>
                        <textarea name="name" id="namec" class="form-control">{{$data->name}}</textarea>
                        <span class="desc">Tên video hiển thị ở trang video</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tiêu đề:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="title" class="form-control">{{$data->title}}</textarea>
                        <span class="desc">Tiêu đề hiển thị trên trình duyệt khi vào trang xem video.<br />
                        <b><i style="color:red">Nếu để trống thì sẽ lấy theo tên video</i></b></span>
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
                    <div class="col-md-8 boxupload">
                       <img src="{{showImage($data->image)}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control" value="{{$data->image}}" name="image" id="imagechooseval" />Hoặc upload ảnh khác. Kích thước chuẩn 160x120</div>
                      <span class="desc"><b><i style="color:red">Nếu để trống sẽ lấy theo hình ảnh video youtube</i></b></span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Url:</label>
                    </div>
                    <div class="col-md-8 required">
                      <span class="red">*</span>
                        <textarea name="url" id="urlc" class="form-control">{{$data->url}}</textarea>
                        <span class="desc">Url vào trang xem video. Tiếng việt không dấu, mỗi từ cách nhau 1 dấu '-'. VD cong-nghe</span>
                    </div>

                    <div class="col-md-4">
                        <label>Link Video Youtube:</label>
                    </div>
                    <div class="col-md-8 required">
                      <span class="red">*</span>
                        <textarea name="video_url" class="form-control">{{$data->video_url}}</textarea>
                        <span class="desc">Copy link video youtube dán vào.</span>
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
      <input type="hidden" name="id" value="{{$data->id}}"/>
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
    
    $("#frm").kiemtra([{
                'name':'name',
                'trong':true
            },{
                'name':'video_url',
                'trong':true
            },{
                'name':'url',
                'trong':true
            }
      ]);

        $("#valiapp").show().find("input[type='submit']").removeAttr("disabled");
  });
</script>

<script type="text/javascript" src="{{Asset('')}}public/js/jsupload.js"></script>


<script type="text/javascript">
  
  var currentPage = "#menu_video";


  </script>

@endsection