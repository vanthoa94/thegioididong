@extends('backend.layout')
@section('title','Thêm hỗ trợ - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/support')}}">Hỗ trợ</a></h2>
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
              <input type="text" name="name" value="{{old('name')}}" class="form-control" />
              <span class="desc">
                Tên loại hỗ trợ. VD: Phân phối sỉ
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Số điện thoại:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" />
                <span class="desc">
                  .
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Id Skype:</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="skype" value="{{old('skype')}}" class="form-control" />
                <span class="desc">
                  .
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Id Yahoo:</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="yahoo" value="{{old('yahoo')}}" class="form-control" />
                <span class="desc">
                  .
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Email:</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="email" value="{{old('email')}}" class="form-control" />
                <span class="desc">
                  Email dùng cho hỗ trợ trức tuyến
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Nhóm:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="group" class="form-control">
                  <option value="-1">-- Lựa chọn --</option>
                  <option value="1">Phân phối</option>
                  <option value="2">Hỗ trợ</option>
                </select>
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
  
  var currentPage = "#menu_support";
  
  $(document).ready(function(){
    
    $("#frm").kiemtra([
        {
          'name':'name',
          'trong':true
        },
        {
          'name':'phone',
          'sodt':true
        },
        {
          'name':'group',
          'select':true
        }
      ]);

  });

  </script>

@endsection