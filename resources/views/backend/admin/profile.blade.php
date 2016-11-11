@extends('backend.layout')
@section('title','Thông Tin Cá Nhân - ACP')

@section('breadcrumb')
<h2>Thông Tin Cá Nhân</h2>
    <span>Cập nhật</span>
@endsection

@section('css')
<link href="{{Asset('public/css/uploadimg.css')}}" rel="stylesheet" />
@endsection

@section('content')
  
  @include('backend._message')

    <form method="post" action="" id="frm" enctype="multipart/form-data">
      <div class="row">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Tên:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <input type="text" name="name" class="form-control" value="{{$data->name}}" />
                <span class="desc">Tên hiển thị khi đăng nhập.</span>
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
              <input type="text" name="username" class="form-control" value="{{$data->username}}" />
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
              <label>Email:</label>
            </div>
            <div class="col-sm-8">
              <input type="text" name="email" value="{{$data->email}}" class="form-control" />
              <span class="desc">
                .
              </span>
            </div>
          </div>
        </div>

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

      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Avatar:</label>
            </div>
            <div class="col-sm-8">
               <label for="avatar" class="uploadimg">
                        <img src="{{url("public/images/avatar/".$data->id.".jpg")}}" data-img="{{url("public/images/avatar/".$data->id.".jpg")}}" />
                        <input id="avatar" class="hide lockcontrol" type="file" name="avatar" />
                        <i class="removefile">&times;</i>
                    </label>
                            <span class="desc">Hình đại diện(<500 KB).<br />
                                Hỗ trợ file: jpg, png, gif, bimap, ico</span>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              

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
<input type="hidden" name="group_id" value="{{$data->group_id}}" />
    </form>

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript" src="{{Asset('public/js/uploadimg.js')}}"></script>
<script type="text/javascript">
  
  var currentPage = "#menu_home";
  

  $(document).ready(function(){
    
    $("#frm").kiemtra([
        {
          'name':'username',
          'trong':true
        },
        {
          'name':'password',
          'trong':true
        },
        {
          'name':'name',
          'trong':true
        }
      ]);

  });

  </script>

@endsection