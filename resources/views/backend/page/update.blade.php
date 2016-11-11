@extends('backend.layout')
@section('title','Sửa trang - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/page')}}">Trang</a></h2>
    <span>Cập nhật</span>
@endsection

@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/page/update')}}" id="frm">
      <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tiêu Đề Trang:</label>
                    </div>
                    <div class="col-md-8 required">
                        <div class="red">*</div>
                        <input name="title" id="namec" class="form-control" type="text" value="{{$data->title}}" />
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
                        <input name="url" id="urlc" class="form-control" type="text" value="{{$data->url}}" />
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
                        <textarea name="meta_description" rows="4" class="form-control" type="text">{{$data->meta_description}}</textarea>
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
                        <textarea name="meta_keywords" rows="4" class="form-control" type="text">{{$data->meta_keywords}}</textarea>
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
                        <textarea style="width:100%;height:250px" name="content" id="content">{{$data->content}}</textarea>
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
<input type="hidden" name="id" value="{{$data->id}}" />

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
 
  $(document).ready(function(){

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