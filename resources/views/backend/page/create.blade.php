@extends('backend.layout')
@section('title','Thêm trang - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/page')}}">Trang</a></h2>
    <span>Tạo mới</span>
@endsection

@section('content')
  
  @include('backend._message')

    <form method="post" action="" id="frm">
      <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tiêu Đề Trang:</label>
                    </div>
                    <div class="col-md-8 required">
                        <div class="red">*</div>
                        <input name="title" id="namec" class="form-control" type="text" value="{{old('title')}}" />
                        <span class="desc">Hiển thị trên trình duyệt.</span>
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
                        <input name="url" id="urlc" class="form-control" type="text" value="{{old('url')}}" />
                        <span class="desc">Url truy cập vào trang. VD: gioi-thieu</span>
                    </div>
                </div><br />
            </div>
        </div><br />

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Mô tả về trang:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="meta_description" rows="4" class="form-control" type="text">{{old('meta_description')}}</textarea>
                        <span class="desc">Mô tả ngắn gọn vể trang. Meta Description dùng cho SEO</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Từ khóa tìm kiếm trang:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="meta_keywords" rows="4" class="form-control" type="text">{{old('meta_keywords')}}</textarea>
                        <span class="desc">Mỗi từ khóa cách nhau 1 dấu ','. Meta Keywords dùng cho SEO</span>
                    </div>
                </div><br />
            </div>
        </div><br />

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Nội Dung:</label>
                    </div>
                    <div class="col-md-10" id="tNicEdit" data-height="250">
                        <textarea style="width:100%;height:250px" name="content" id="content">{{old('content')}}</textarea>
                    </div>
                </div><br />
            </div>
        </div><br />

       <hr />
    <div class="row">
        <div class="col-sm-12 text-right">
            <input type="submit" value="Lưu lại" class="btn btn-success" />
            <input type="reset" value="Nhập lại" class="btn btn-default" />
        </div>
    </div>

    <input type="hidden" name="_token" value="{{csrf_token()}}" />


    </form>
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
<script type="text/javascript">
var asset_path="{{Asset('public')}}/";
</script>
<script type="text/javascript" src="<?php echo Asset('public/js/nicEdit.js') ?>"></script>
<script type="text/javascript">
  
  var currentPage = "#menu_page";
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
    
    $("#frm").kiemtra([
        {
          'name':'title',
          'trong':true
        },
        {
          'name':'url',
          'trong':true
        }
      ]);
    new nicEditor({ fullPanel: true }).panelInstance("content");
  });

  </script>
<script src="{{Asset('public/js/t_nicEdit.js')}}" ></script>
@endsection