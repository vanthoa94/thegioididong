@extends('backend.layout')
@section('title','Sửa nhóm admin - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/group-admin')}}">Nhóm Admin</a></h2>
    <span>Cập nhật</span>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/css/user.css')}}" />
@endsection

@section('content')


<?php 
function isChecked($id,&$arr){
  foreach($arr as $key => $item){
    if($item['role_id']==$id){
      unset($arr[$key]);
      return 'checked="checked"';
    }
  }
  return '';
}
 ?>
  
  @include('backend._message')

    <form method="post" action="{{url('admin/group-admin/update')}}" id="frm">
      <div class="row">
        <div class="col-sm-2">
              <label>Tên nhóm:</label>
            </div>
            <div class="col-sm-10 required">
              <span class="red">*</span>
              <textarea name="name" class="form-control">{{$data->name}}</textarea>
              <span class="desc">
                .
              </span>
            </div>
      </div><!--.row-->
      @if($data->id!=1)
      <h3>Quyền:</h3>
      <div id="roleuser" class="clearfix">
               
              @foreach($grouprole as $group)
       
                    <div class="clearfix">
                            <div class="title"><label><input type="checkbox" title="Chọn tất cả" /> <strong>{{$group->name}}</strong></label></div>

                            @foreach($roles as $role)
                            
                                @if ($group->id == $role->group_id)
                                
           
                            <label>
                                <input type="checkbox" class="CheckRoles" {{isChecked($role->id,$admingrouprole)}} name="CheckRoles[]" value="{{$role->id}}"/>
                                {{$role->name}}</label>
                                @endif
                            @endforeach
                    </div>
                    @endforeach

            </div>
            @endif
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