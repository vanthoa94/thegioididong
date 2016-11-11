@extends('backend.layout')
@section('title','Thêm người dùng - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/user')}}">Người dùng</a></h2>
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
              <div class="col-sm-8">
                <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                
              </div>
            </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Username:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="username" class="form-control" value="{{old('username')}}" />
              <span class="desc">
                Tên đăng nhập. Không dấu và không có ký tự đặc biệt
              </span>
            </div>
          </div>
        </div>

      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Mật khẩu:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <input type="password" name="password" class="form-control" value="{{old('password','123456')}}" />
                <span class="desc">Mật khẩu đăng nhập. Mặc định là <b>123456</b></span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Email:</label>
            </div>
            <div class="col-sm-8">
              <input type="text" name="email" value="{{old('email')}}" class="form-control" />
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
                <label>Số điện thoại:</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" />
                <span class="desc">.</span>
              </div>

              <div class="col-sm-4">
                <label>Giới tính:</label>
              </div>
              <div class="col-sm-8">
                <label style="padding-right:10px"><input type="radio" name="gender" value="1" checked="checked" /> Nam </label> 
                <label><input type="radio" name="gender" value="0" /> Nữ</label>
                <span class="desc">.</span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Địa chỉ:</label>
            </div>
            <div class="col-sm-8">
              <textarea name="address" rows="3" class="form-control">{{old('address')}}</textarea>
              <span class="desc">
                .
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
  
  var currentPage = "#menu_account";
  var subPage = 'new';

  $(document).ready(function(){
    
    $("#frm").kiemtra([
        {
          'name':'username',
          'trong':true
        },
        {
          'name':'password',
          'trong':true
        }
      ]);

  });

  </script>

@endsection