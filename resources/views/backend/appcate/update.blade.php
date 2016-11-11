@extends('backend.layout')
@section('title','Sửa loại ứng dụng - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/app-category')}}">Loại ứng dụng</a></h2>
    <span>Cập nhật</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" id="frm" action="{{url('admin/app-category/update')}}">
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Tên:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="name" id="namec" value="{{$data->name}}" class="form-control" />
              <span class="desc">
                Tên loại ứng dụng. Hiển thị trên web
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
                  Url truy cập vào trang loại ứng dụng. Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: ung-dung-play
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Loại ứng dụng cha:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="parent" id="parentId" class="form-control">
                  <option value="0">-- Không thuộc --</option>
                  
                        <?php
                        if(isset($listMenu)){ 
                                function dequy($parentid,$arr,$text = ''){
                                    $temp=array();
                                    foreach ($arr as $key => $value) {
                                        if($value->parent==$parentid){
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
                          }
                            ?>

                </select>
                <span class="desc">
                  Loại ứng dụng này thuộc loại nào?
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label for="display">Hiển thị:</label>
              </div>
              <div class="col-sm-8">
                <input type="checkbox" id="display" name="display" />
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
  
  var currentPage = "#menu_app";
  var subPage = 'category';
  

  var isShowHome="{{$data->display}}";
  var parentId="{{$data->parent}}";


  $(document).ready(function(){
    if(isShowHome=='1'){
      $("#display").prop('checked',true);
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