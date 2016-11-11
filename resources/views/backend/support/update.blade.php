@extends('backend.layout')
@section('title','Sửa hỗ trợ - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/support')}}">hỗ trợ</a></h2>
    <span>Cập nhật</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/support/update')}}" id="frm">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Tên:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="name" value="{{$data->name}}" class="form-control" />
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
                <input type="text" name="phone" value="{{$data->phone}}" class="form-control" />
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
                <input type="text" name="skype" value="{{$data->skype}}" class="form-control" />
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
                <input type="text" name="yahoo" value="{{$data->yahoo}}" class="form-control" />
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
                <input type="text" name="email" value="{{$data->email}}" class="form-control" />
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
                <select name="group" id="group" class="form-control">
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
    <input type="hidden" name="id" value="{{$data->id}}" />

    </form>

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_support";
  var idGroup="{{$data->group}}";
  $(document).ready(function(){
    $("#group").val(idGroup);
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