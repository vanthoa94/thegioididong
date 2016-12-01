@extends('backend.layout')
@section('title','Thêm Mục Lục - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/muc-luc/'.$sach->id)}}">Sách "{{$sach->name}}"</a></h2>
    <span>Tạo mới</span>
@endsection


@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/muc-luc/create')}}" id="frm">
      <div class="row">

            <div class="col-sm-6">
                <div class="row">
                  
                    <div class="col-sm-4">
                        <label>Tên mục lục:</label>
                    </div>
                    <div class="col-sm-8 required">
                        <span class="red">*</span>
                        <textarea name="name" rows="3" id="namec" class="form-control">{{old('name')}}</textarea>
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
                        <textarea name="url" rows="3" id="urlc" class="form-control">{{old('url')}}</textarea>
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
                        <img src="{{Asset('public/images/uploadimg.png')}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control " name="image" id="imagechooseval" value="{{old('image')}}" />Hoặc upload ảnh khác. Kích thước chuẩn 168x120</div>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Video:</label>
                    </div>
                    <div class="col-md-8">
                       <textarea rows="3" name="video" class="form-control">{{old('video')}}</textarea>
                        <span class="desc">Link video youtube</span>
                    </div>
                    <div class="col-md-4">
                        <label>Audio:</label>
                    </div>
                    <div class="col-md-8">
                       <textarea rows="2" name="audio" class="form-control">{{old('audio')}}</textarea>
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
                        <textarea style="width:100%;height:250px" name="content" id="content">{{old('content')}}</textarea>
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

        $("#valiapp").show().find("input[type='submit']").removeAttr("disabled");

        $(".boxupload .fa-times").click(function(){
          $(this).parent().find("img").attr('src',asset_path+"images/uploadimg.png");
          $(this).parent().find(".form-control").val("");
          $(this).hide();
        });
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

  function change_alias(alias)
  {
      var str = alias;
      str= str.toLowerCase(); 
      str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
      str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
      str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
      str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
      str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
      str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
      str= str.replace(/đ/g,"d"); 
      str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
      /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
      str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
      str= str.replace(/^\-+|\-+$/g,""); 
      //cắt bỏ ký tự - ở đầu và cuối chuỗi 
      return str;
  }

  $(document).ready(function(){
    var urlc=$("#urlc");
    var isChange=true;
    $("#namec").on('keyup',function(){
      if(isChange){
        urlc.val(change_alias($.trim($(this).val())));
      }else{
        $(this).off('keyup');
      }
    });
    urlc.on('keyup',function(){
      isChange=false;
      $(this).off('keyup');
    });



  

  });

  </script>

@endsection