@extends('backend.layout')
@section('title','Sửa Mục Lục - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/muc-luc/'.$sach->id)}}">Sách "{{$sach->name}}"</a></h2>
    <span>Cập nhật mục lục</span>
@endsection

<?php 
function showImage($path){
        if(strpos($path, "http")===0)
            return $path;
        return Asset('public/images/'.$path);
    }
 ?>


@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/muc-luc/update')}}" id="frm">
      <div class="row">

            <div class="col-sm-6">
                <div class="row">
                  
                    <div class="col-sm-4">
                        <label>Tên mục lục:</label>
                    </div>
                    <div class="col-sm-8 required">
                        <span class="red">*</span>
                        <textarea name="name" rows="3" id="namec" class="form-control">{{$data->name}}</textarea>
                        <span class="desc">
                          VD: Bài 1: mở đầu
                        </span>
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Url:</label>
                    </div>
                    <div class="col-md-8 required">
                        <span class="red">*</span>
                        <textarea name="url" rows="3" id="urlc" class="form-control">{{$data->url}}</textarea>
                        <span class="desc">
                          Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: bai-1-mo-dau
                        </span>
                    </div>
                    
                </div>
            </div>
        </div><br />

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Hình Ảnh:</label>
                    </div>
                    <div class="col-md-8 boxupload">
                       <i class="fa fa-times"></i>
                        <img src="{{showImage($data->image==''?Asset('public/images/uploadimg.png'):$data->image)}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control" value="{{$data->image}}" name="image" id="imagechooseval" />Hoặc upload ảnh khác. Kích thước chuẩn 168x120</div>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Video:</label>
                    </div>
                    <div class="col-md-8">
                       <textarea rows="3" name="video" class="form-control">{{$data->video!=''?'https://www.youtube.com/watch?v='.$data->video:''}}</textarea>
                        <span class="desc">Link video youtube</span>
                    </div>
                    <div class="col-md-4">
                        <label>Audio:</label>
                    </div>
                    <div class="col-md-8">
                       <textarea rows="2" name="audio" class="form-control">{{$data->audio}}</textarea>
                        <span class="desc">Link audio. <a href="http://tienghoadidong.com/uploadaudio.php" target="_black">Upload</a></span>
                    </div>
                </div><br />
            </div>
        </div><br />



        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Nội dung:</label>
                    </div>
                    <div class="col-md-10" id="tNicEdit" data-height="250">
                        <textarea style="width:100%;height:250px" name="content" id="content">{{$data->content}}</textarea>
                      <span class="desc">.</span>
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
      <input type="hidden" name="idsach" value="{{$sach->id}}"/>
      <input type="hidden" name="id" value="{{$data->id}}"/>
    </form>
@include('backend.upload')
<a class="nicupload showupload" href="#nicupload">Upload</a>

<style type="text/css">
  .nicEdit-panelContain.on{
    position: fixed;
    top: 50px;
    z-index: 9999;
  }
  .boxupload{
    position: relative;
  }
  .boxupload i.fa-times{
        position: absolute;
        top: -4px;
    left: 11px;
    cursor: pointer;
    display: none;
    color:#555;
  }
  .boxupload i.fa-times:hover{
    color:#000;
  }
</style>
  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript" src="{{Asset('')}}public/js/dialog.js"></script>
<script type="text/javascript">
  var base_url_admin="{{url('admin')}}/";
    var asset_path="{{Asset('public')}}/";
    var __token="{{csrf_token()}}";
    var btnUpload=null;
    var slImages=0;
    function callBackUpload(idobjclick,path){
        if(idobjclick=="#nicupload"){
            $("textarea"+btnUpload).parent().find(".nicEdit-main").append("<div class='postimg'><img src='"+asset_path+"images/"+path+"' /></div>");
            return false;
        }
        if(idobjclick=="#imagechooseval"){
           $(idobjclick).val(path).parent().parent().find("img").attr("src",asset_path+"images/"+path);
           $("#frm input[name='image']").removeClass("error").next(".errortext").hide();
           $(idobjclick).parent().parent().find(".fa-times").show();
       }else{

        if(idobjclick.indexOf('#imageschooseval')===0 || idobjclick.indexOf('#imagesschooseval')===0){
            var oo=$(idobjclick).val(path).parent().parent();
           
        }else{
           $(idobjclick).val(path);
       }
   }
}
    $(function(){
    

    $("#frm").kiemtra([
            {
                'name':'name',
                'trong':true
            },
            {
                'name':'url',
                'trong':true
            }
      ]);

    $(".boxupload .fa-times").click(function(){
          $(this).parent().find("img").attr('src',asset_path+"images/uploadimg.png");
          $(this).parent().find(".form-control").val("");
          $(this).hide();
        });

    $(".boxupload").each(function(){
      if($(this).find(".form-control").val()!=""){
        $(this).find(".fa-times").show();
      }
    });

        $("#valiapp").show().find("input[type='submit']").removeAttr("disabled");
  });
</script>

<script type="text/javascript" src="{{Asset('')}}public/js/jsupload.js"></script>
<script type="text/javascript" src="<?php echo Asset('public/js/nicEdit.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        

        new nicEditor({ fullPanel: true }).panelInstance("content");
    });
</script>

<script src="{{Asset('public/js/t_nicEdit.js')}}" ></script>

<script type="text/javascript">
  
  var currentPage = "#menu_product";


  </script>

@endsection