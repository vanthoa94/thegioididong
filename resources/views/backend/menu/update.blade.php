@extends('backend.layout')
@section('title','Sửa menu - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/menu')}}">Menu</a></h2>
    <span>Cập nhật</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" id="frm" action="{{url('admin/menu/update')}}">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Tên:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              @if(mb_strtolower($data->name)!="kho ứng dụng")
              <input type="text" name="name" id="namec" value="{{$data->name}}" class="form-control" />
              @else
              <input type="text" disabled="disabled" value="{{$data->name}}" class="form-control" />
              <input type="hidden" name="name" value="{{$data->name}}" class="form-control" />
              @endif
              <span class="desc">
                Tên menu. Hiển thị trên web
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Url:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <input type="text" name="url" value="{{$data->url}}" class="form-control" />
                <span class="desc">
                  Url truy cập vào trang menu. Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: gioi-thieu
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Menu cha:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="parent_id" id="parentId" class="form-control">
                  <option value="0">-- Không thuộc --</option>
                  
                        <?php 
                                function dequy($parentid,$arr,$text = ''){
                                    $temp=array();
                                    foreach ($arr as $key => $value) {
                                        if($value->parent_id==$parentid){
                                          $temp[]=$value;

                                          unset($arr[$key]);  
                                        }
                                    }

                                    if(count($temp)>0){
                                        foreach($temp as $item){
                                            ?>
                                            <option value="{{$item->id}}">{{$text.$item->name}}</option>
                                            <?php
                                            dequy($item->id,$arr,$text.'----');
                                        }
                                    }
                                }
                            dequy(0,$listMenu);
                            ?>

                </select>
                <span class="desc">
                  Menu này thuộc menu nào?
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label for="show_menu_top">Hiển thị menu top:</label>
              </div>
              <div class="col-sm-8">
                <input type="checkbox" id="show_menu_top" name="show_menu_top" />
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
  
  var currentPage = "#menu_menu";
  

  var isShowHome="{{$data->show_menu_top}}";
  var parentId="{{$data->parent_id}}";


  $(document).ready(function(){
    if(isShowHome=='1'){
      $("#show_menu_top").prop('checked',true);
    }
    $("#parentId").val(parentId);

    $("#frm").kiemtra([
        {
          'name':'name',
          'trong':true
        },
        {
          'name':'url',
          'trong':true
        }
      ]);
    
  });

  </script>

@endsection