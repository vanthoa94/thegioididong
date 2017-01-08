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
                <input type="text" name="url" id="urls" value="{{$data->url}}" class="form-control" />
                <span class="desc">
                   Url khi click vào menu sẽ chuyển đến. <a href="#" id="showviewpage">Chọn từ trang</a>
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

<div id="pagelist" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Trang</h4>
      </div>
      <div class="modal-body">
        <iframe src="" width="100%" height="500px" style="border:0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="choose">Chọn</button>
          <button type="button" class="btn btn-success" id="refresh">Tải lại</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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

      var base_url_admin="{{url('admin')}}/";

   $(document).ready(function(){

    $("#pagelist").on('shown.bs.modal',function(){
      if($(this).find("iframe:eq(0)").attr("src")==""){
        $(this).find("iframe:eq(0)").attr("src",base_url_admin+"page/iframe");

        $("#choose").click(function(){
          var contentmodal=$("#pagelist iframe:eq(0)").contents();
          var tb=contentmodal.find("#ttable table:eq(0) tbody:eq(0) tr.checkboxcheck:eq(0)");
          if(!tb.length){
            getAlert('Vui lòng chọn 1 trang');
            return false;
          }


          $("#urls").val(tb.find(".ascheckbox:eq(0)").attr('data-value'));

          $("#pagelist").modal('hide');
        });

        $("#refresh").click(function(){
$("#pagelist").find("iframe:eq(0)").attr("src",base_url_admin+"page/iframe");
        });

      }
    });

    $("#showviewpage").click(function(){


$("#pagelist").modal('show');


    });


  });

  </script>

@endsection