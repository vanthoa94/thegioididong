@extends('backend.layout')
@section('title','Sửa loại tin tức - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/news-category')}}">Loại tin tức</a></h2>
    <span>Cập nhật</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/news-category/update')}}" id="frm">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Tên:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="name" id="namec" value="{{$data->name}}" class="form-control" />
              <span class="desc">
                Tên loại tin tức. Hiển thị trên web
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
                <input type="text" name="url" id="urlc" value="{{$data->url}}" class="form-control" />
                <span class="desc">
                  Url truy cập vào trang loại tin tức. Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: tin-khuyen-mai
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

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

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_news";
  var subPage="category";


  $(document).ready(function(){
    
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

  });

  </script>

@endsection