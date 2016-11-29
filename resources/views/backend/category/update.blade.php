@extends('backend.layout')
@section('title','Sửa loại sách - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/category')}}">Loại sách</a></h2>
    <span>Cập nhật</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" id="frm" action="{{url('admin/category/update')}}">
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
                Tên loại sách. Hiển thị trên web
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
                <input type="text" name="url" id="urlc" value="{{$data->url}}" class="form-control" />
                <span class="desc">
                  Url truy cập vào trang loại sách. Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: sach-mien-phi
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Loại sách cha:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="parent" class="form-control" id="parentId">
                  <option value="0">-- Không thuộc --</option>
                  
                        <?php 
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
                            dequy(0,$listCategory);
                            ?>

                </select>
                <span class="desc">
                  Loại sách này thuộc loại sách nào?
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label for="show_home">Hiển thị trang chủ:</label>
              </div>
              <div class="col-sm-8">
                <input type="checkbox" id="show_home" name="show_home" />
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Mô tả:</label>
              </div>
              <div class="col-sm-8">
                <textarea name="meta_description" rows="4" class="form-control">{{$data->meta_description}}</textarea>
                <span class="desc">
                  Mô tả về loại sách này. Dùng cho SEO
                </span>
              </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Từ khóa:</label>
              </div>
              <div class="col-sm-8">
                <textarea name="meta_keywords" rows="4" class="form-control">{{$data->meta_keywords}}</textarea>
          <span class="desc">
            Từ khóa tìm kiếm loại sách trên google. Dùng cho SEO
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

    </form>
  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript">
  
  var currentPage = "#menu_product";
  var subPage = 'category';

  var isShowHome="{{$data->show_home}}";
  var parentId="{{$data->parent}}";


  $(document).ready(function(){
    if(isShowHome==='1'){
      $("#show_home").prop('checked',true);
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