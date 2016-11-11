@extends('backend.layout')
@section('title','Thêm nhóm admin - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/group-admin')}}">Nhóm Admin</a></h2>
    <span>Tạo mới</span>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/css/user.css')}}" />
@endsection

@section('content')
  
  @include('backend._message')

    <form method="post" action="" id="frm">
      <div class="row">
        <div class="col-sm-2">
              <label>Tên nhóm:</label>
            </div>
            <div class="col-sm-10 required">
              <span class="red">*</span>
              <textarea name="name" class="form-control">{{old('name')}}</textarea>
              <span class="desc">
                .
              </span>
            </div>
      </div><!--.row-->

      <h3>Quyền:</h3>
      <div id="roleuser" class="clearfix">
               
              @foreach($grouprole as $group)
       
                    <div class="clearfix">
                            <div class="title"><label><input type="checkbox" title="Chọn tất cả" /> <strong>{{$group->name}}</strong></label></div>

                            @foreach($roles as $role)
                            
                                @if ($group->id == $role->group_id)
                                
           
                            <label>
                                <input type="checkbox" class="CheckRoles" name="CheckRoles[]" value="{{$role->id}}"/>
                                {{$role->name}}</label>
                                @endif
                            @endforeach
                    </div>
                    @endforeach

            </div>

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
<script src="{{Asset('public/js/permission.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_admin";
  var subPage = 'group';

  $(document).ready(function(){
    
    $("#frm").kiemtra([
        {
          'name':'name',
          'trong':true
        }
      ]);

  });

  </script>

@endsection