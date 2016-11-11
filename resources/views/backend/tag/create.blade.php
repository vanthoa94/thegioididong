@extends('backend.layout')
@section('title','Thêm tag - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/tag')}}">Tag</a></h2>
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
                Tên loại ứng dụng. Hiển thị trên web
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Link:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <input type="text" name="url" value="{{old('url')}}" class="form-control" />
                <span class="desc">
                  Link khi click vào tag sẽ chuyển đến
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

    </form>

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_tag";


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