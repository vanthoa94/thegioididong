@extends('backend.layout')
@section('title','Thông Tin Cá Nhân - ACP')

@section('breadcrumb')
<h2>Thông Tin Cá Nhân</h2>
    <span>Đổi mật khẩu</span>
@endsection


@section('content')
  
  @include('backend._message')

  <form method="post" action="" id="frm">
    <div class="row margin">
      <div class="col-sm-0 col-md-2"></div>
      <div class="col-md-2"><label>Mật khẩu cũ: </label></div>
      <div class="col-md-4 required">
          <span class="red">*</span>
           <input type="password" name="passwordold" class="form-control" />
      </div>
    </div>

    <div class="row margin">
      <div class="col-sm-0 col-md-2"></div>
      <div class="col-md-2"><label>Mật khẩu mới: </label></div>
      <div class="col-md-4 required">
          <span class="red">*</span>
           <input type="password" name="passwordnew" class="form-control" />
      </div>
    </div>

    <div class="row margin">
      <div class="col-sm-0 col-md-2"></div>
      <div class="col-md-2"><label>Nhập lại mật khẩu mới: </label></div>
      <div class="col-md-4 required">
          <span class="red">*</span>
           <input type="password" name="repassword" class="form-control" />
      </div>
    </div>

     <hr />
    <div class="row">
        <div class="col-sm-12 text-center">
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
  
  var currentPage = "#menu_home";
  

  $(document).ready(function(){
    
    $("#frm").kiemtra([
        {
          'name':'passwordold',
          'trong':true
        },
        {
          'name':'passwordnew',
          'trong':true
        },
        {
          'name':'repassword',
          'name2':'passwordnew',
          'sosanhdoituong':true,
          'message':'Nhập lại mật khẩu sai'
        }
      ]);

  });

  </script>

@endsection