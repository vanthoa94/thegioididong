@extends('backend.layout')
@section('title','Thêm đại lý - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/agency')}}">Đại lý</a></h2>
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
                Tên đại lý. Hiển thị trên web
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
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" />
                <span class="desc">
                  Các số điện thoại của đại lý
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Chi nhánh:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="branch_id" class="form-control">
                  <option value="-1">-- Lựa chọn --</option>
                  @foreach($data as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
                <span class="desc">
                  Đại lý thuộc chi nhánh nào?
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label for="display_footer">Hiện thị dưới cuối trang:</label>
              </div>
              <div class="col-sm-8">
                <input type="checkbox" id="display_footer" checked="checked" name="display_footer" />
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row">
        <div class="col-sm-2">
              <label>Địa chỉ:</label>
            </div>
            <div class="col-sm-10 required">
              <span class="red">*</span>
              <textarea name="address" class="form-control">{{old('address')}}</textarea>
              <span class="desc">
                .
              </span>
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
  
  var currentPage = "#menu_branch";
  var subPage = 'agency';
  var isShowHome="{{old('display_footer')}}";

  $(document).ready(function(){
    if(isShowHome==='on'){
      $("#display_footer").prop('checked',true);
    }
   
    $("#frm").kiemtra([
        {
          'name':'name',
          'trong':true
        },
        {
          'name':'branch_id',
          'select':true
        },
        {
          'name':'address',
          'trong':true
        }
      ]);

  });

  </script>

@endsection