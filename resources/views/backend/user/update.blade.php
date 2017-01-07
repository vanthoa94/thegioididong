@extends('backend.layout')
@section('title','Sửa người dùng - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/user')}}">Người dùng</a></h2>
    <span>Cập nhật</span>
@endsection

@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/user/update')}}" id="frm">
      <div class="row">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Tên:</label>
              </div>
              <div class="col-sm-8">
                <input type="text" name="name" class="form-control" value="{{$data->name}}" />
                
              </div>
            </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>ID:</label>
            </div>
            <div class="col-sm-8">
              <input type="hidden" name="username" class="form-control" value="{{$data->username}}" />
             {{$data->username}}<br><br><br><br>
            </div>
          </div>
        </div>

      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              
              <div class="col-sm-4">
                <label>Giới tính:</label>
              </div>
              <div class="col-sm-8">
                <label style="padding-right:10px"><input type="radio" name="gender" value="1" {{$data->gender==1?"checked='checked'":""}} /> Nam </label> 
                <label><input type="radio" name="gender" value="0" {{$data->gender==0?"checked='checked'":""}} /> Nữ</label>
                <span class="desc">.</span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Email:</label>
            </div>
            <div class="col-sm-8">
              <input type="hidden" name="email" value="{{$data->email}}" class="form-control" />
               {{$data->email}}
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
                <input type="text" name="phone" class="form-control" value="{{$data->phone}}" />
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
              <textarea name="address" rows="3" class="form-control">{{$data->address}}</textarea>
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
    <input type="hidden" name="id" value="{{$data->id}}" />
    <input type="hidden" name="password" value="111" />

    </form>

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_account";
  var subPage = 'list';

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