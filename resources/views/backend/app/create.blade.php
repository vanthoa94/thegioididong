@extends('backend.layout')
@section('title','Thêm ứng dụng - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/app')}}">Ứng dụng</a></h2>
    <span>Tạo mới</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" action="" id="frm">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Tên:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="name" id="namec" value="{{old('name')}}" class="form-control" />
              <span class="desc">
                Tên ứng dụng. Hiển thị trên web
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Url:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <input type="text" name="url" id="urlc" value="{{old('url')}}" class="form-control" />
                <span class="desc">
                  Url truy cập vào trang ứng dụng. Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: gioi-thieu
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Hình Ảnh:</label>
                    </div>
                    <div class="col-md-8 required boxupload">
                        <span class="red">*</span>
                        <img src="{{Asset('public/images/uploadimg.png')}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control " name="image" id="imagechooseval" />Hoặc upload ảnh khác. Kích thước chuẩn 160x160</div>
                    </div>
                </div><br />
            </div>

          <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Giới thiệu:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea rows="6" class="form-control" name="description">{{old('description')}}</textarea>
                        <span class="desc">Giới thiệu ngắn gọn về ứng dụng. VD: chức năng, công dụng,..</span>
                    </div>
                </div><br />
            </div>

        
      </div><!--.row-->


      <div class="row margin">
       
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Loại ứng dụng:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="cate_id" class="form-control">
                  <option value="-1">-- Lựa chọn --</option>
                  
                        <?php 
                                function dequy($parentid,$arr,$text = ''){
                                    $temp=array();
                                    foreach ($arr as $key => $value) {
                                        if($value->parent==$parentid){
                                          $temp[]=$value;

                                          unset($arr[$key]);  
                                        }
                                    }

                                    if(count($temp)>0){
                                        foreach($temp as $item){
                                            ?>
                                            <option value="{{$item->id}}">{{$text.$item->name}}</option>
                                            <?php
                                            dequy($item->id,$arr,$text.'----');
                                        }
                                    }
                                }
                            dequy(0,$data);
                            ?>

                </select>
                <span class="desc">
                  .
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Loại:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select class="form-control" id='status' name="status">
                          <option value="Miễn phí">Miễn phí</option>
                          <option value="Có phí">Có phí</option>
                          <option value="0">Khác</option>
                        </select><br />
                        <div id="loaikhac" style="display:none">
                        Nhập loại: <input type="text" id="statusvalue" /><input type="button" value="Lưu" id="savestatus" />
                  </div>
                <span class="desc">
                  .
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Dung lượng:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="capacity" class="form-control" value="{{old('capacity')}}" />
                        <span class="desc">VD: 2MB, 500KB</span>
                    </div>
                </div><br />
            </div>

          <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Yêu cầu:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="{{old('require')}}" name="require" class="form-control" />
                        <span class="desc">VD: Android 4.1 trở lên, dung lượng trống 20MB,...</span>
                    </div>
                </div><br />
            </div>

        
      </div><!--.row-->


    <div class="row margin">

        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Phiên bản hiện tại:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="version" class="form-control" value="{{old('version')}}" />
                        <span class="desc">VD: 2.0</span>
                    </div>
                </div><br />
            </div>

          <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Nhóm phát triển:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="{{old('developers')}}" name="developers" class="form-control" />
                        <span class="desc">.</span>
                    </div>
                </div><br />
            </div>

        
      </div><!--.row-->

      <div class="row margin">

        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Url tải app:</label>
                    </div>
                    <div class="col-md-8 required">
                      <span class="red">*</span>
                        <input type="text" name="app_url" class="form-control" value="{{old('app_url')}}" />
                        <span class="desc">Url dẫn đến trang tải app hoặc đến file apk</span>
                    </div>
                </div><br />
            </div>

          <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Từ khóa tìm kiếm:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="{{old('keywords')}}" name="keywords" class="form-control" />
                        <span class="desc">Mỗi từ khóa cách nhau 1 dấu ','</span>
                    </div>
                </div><br />
            </div>

        
      </div><!--.row-->

      <div class="row margin">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Bài viết về ứng dụng:</label>
                    </div>
                    <div class="col-md-10" id="tNicEdit" data-height="250">
                        <textarea style="width:100%;height:250px" name="content" id="content">{{old('content')}}</textarea>
                    </div>
                </div><br />
            </div>
        </div>


       <hr />
    <div class="row">
        <div class="col-sm-12 text-right">
            <input type="submit" value="Lưu lại" class="btn btn-success" />
            <input type="reset" value="Nhập lại" class="btn btn-default" />
        </div>
    </div>

    <input type="hidden" name="_token" value="{{csrf_token()}}" />

    </form>
@include('backend.upload')
<a class="nicupload showupload" href="#nicupload">Upload</a>
<style type="text/css">
  .nicEdit-panelContain.on{
    position: fixed;
    top: 50px;
    z-index: 9999;
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
     function callBackUpload(idobjclick,path){
            if(idobjclick=="#nicupload"){
                $("textarea"+btnUpload).parent().find(".nicEdit-main").append("<div class='postimg'><img src='"+asset_path+"images/"+path+"' /></div>");
                return false;
            }
            $(idobjclick).val(path);
            $(".boxupload img").attr("src",asset_path+"images/"+path);
    
            $("#frm input[name='image']").removeClass("error").next(".errortext").hide();
        }
  
  var currentPage = "#menu_app";

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

    $("#status").change(function(){
        if(this.value=="0"){
          $("#loaikhac").show().find("#statusvalue").focus();  
        }else{
          $("#loaikhac").hide();  
        }
    });
    $("#savestatus").click(function(){
      var value=$.trim($("#statusvalue").val());
      $("#status").prepend('<option value="'+value+'">'+value+'</option>').val(value);
      $("#loaikhac").hide();
    });

    $("#statusvalue").on('keyup keypress',function(e){
      var keyCode = e.keyCode || e.which;
      if(keyCode==13){
        $("#savestatus").click();

        e.preventDefault();
        return false;
      }
    });


    $("#frm").kiemtra([
        {
          'name':'name',
          'trong':true
        },
        {
          'name':'url',
          'trong':true
        },
        {
          'name':'image',
          'trong':true
        },
        {
          'name':'cate_id',
          'select':true
        },
        {
          'name':'app_url',
          'url':true
        }
      ]);

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

@endsection