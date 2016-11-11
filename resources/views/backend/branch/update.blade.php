@extends('backend.layout')
@section('title','Sửa chi nhánh - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/branch')}}">Chi nhánh</a></h2>
    <span>Cập nhật</span>
@endsection

@section('content')
  
  @include('backend._message')

    <form method="post" action="{{url('admin/branch/update')}}" id="frm">
      <div class="row">
        <div class="col-sm-2">
              <label>Tên chi nhánh:</label>
            </div>
            <div class="col-sm-10 required">
              <span class="red">*</span>
              <textarea name="name" class="form-control">{{$data->name}}</textarea>
              <span class="desc">
                .
              </span>
            </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Khu vực:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="zone" id="idZone" class="form-control">
                  <option value="-1">-- Chọn khu vực --</option>
                  
                  <option value="1">Bắc</option>
                  <option value="2">Trung</option>
                  <option value="3">Nam</option>
                </select>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Tên tỉnh/thành phố:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="city_name" value="{{$data->city_name}}" class="form-control" />
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
    <input type="hidden" name="index" value="{{$data->index}}" />

    </form>

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_branch";
  var subPage = 'list';
var idZone="{{$data->zone}}";
  $(document).ready(function(){
    $("#idZone").val(idZone);
    $("#frm").kiemtra([
        {
          'name':'name',
          'trong':true
        },
        {
          'name':'city_name',
          'trong':true
        },
        {
          'name':'zone',
          'select':true
        }
      ]);

  });

  </script>

@endsection