@extends('backend.layout')
@section('title','Tag - ACP')

@section('breadcrumb')
<h2>Tag</h2>
<h3 class="trole" data-role="tag/create">
        <a href="{{url('admin/tag/create')}}">Thêm Mới</a>
    </h3>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
@endsection

@section('content')

@include('backend._message')

    <div id="ttable" class="ttable">
    <ul class="subsubsub">
        <li><a data-filter="all" data-group-filter="a" data-subsubsub="true" href="#" class="current">Tất cả <span class="count"></span></a>|</li>
        <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang Ẩn <span class="count"></span></a></li>
       
    </ul>
    <!--.subsubsub-->
    <div class="row captiontable">
        <div class="col-sm-6 col-md-7">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='' data-before="action">
                    <option value="1" selected="selected">Lưu sắp xếp</option>
                    
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Lưu">
            </div>
            <div class="clearfloat"></div>
        </div>
        <!--col left-->
        <div class="col-sm-6 col-md-5 captionright">
            <div class="gsearchtable">
                <input type="button" class="button fright" data-target="#filter-by-search" value="Tìm kiếm" />
                <div class="searchicon">
                    <input type="text" id="filter-by-search" placeholder="Nhập nội dung cần tìm..." class="searchtable fright"
                        data-filter='{"type":"column","column":"all","fiter_column":[2,3]}' />
                    <i title="Xóa nội dung tìm kiếm.">&times;</i>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
    <!--.captiontable-->
  <div style="overflow-x:auto;">
      <table style="min-width:650px">
          <thead>
              <tr>
                  <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                  </th>
                  <th class="tsort" width="80px">Sắp Xếp</th>
                  <th width="250px">Tên</th>
                  <th>Link</th>
                  <th>Hiện thị</th>
              </tr>
          </thead>
          <tbody>
            @foreach($data as $item)
               <tr data-display="{{$item->display}}">
                                          <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                                          <td>
                                            <span>
                                              <i class="hidden">{{$item->index}}</i>
                                              <input type="text" class="inputTable" data-id="{{$item->id}}" value="{{$item->index}}" data-old="{{$item->index}}" />
                                            </span>
                                            
                                          </td>
                                         

                                          <td>
                                              <span>{{$item->name}}</span>
                                                <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/tag/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/tag/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa tag <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa ">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                          <td>
                                            {{$item->url}}
                                          </td>
                                          
                                          <td>
                                                    <span class="ascheckbox checkboxblock {{$item->display==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/tag/display')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> tag <b>{name}</b>?"></span>
                                          </td>


                                        </tr>
                                    @endforeach
          </tbody>

      </table>
      </div>
  </div><!--#ttable-->
    

@endsection

@section('script')
<script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
  var currentPage = "#menu_tag";
  
  $(document).ready(function(){
    

    new TTable($("#ttable"),{
      'token':"{{csrf_token()}}",
      'alert':getAlert,
      'confirm':getConfirm,
      "showcount":function(obj,item){
              var count = obj.find("table tbody tr[data-display='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');

          },
        'action':function(href,arr,target){
          var id=[];
            var data=[];
            $("#ttable table tbody .isChanged").each(function(){
              var d=parseInt(this.value);
              if(!isNaN(d)){
                id.push($(this).attr('data-id'));
                data.push(d);
              }else{
                $(this).removeClass('isChanged');
                $(this).val($(this).attr('data-old'));
              }
            });
            if(id.length>0){
              TRunAjax(base_url+"/tag/sort",{"id":id,"data":data,"_token":this.token},function(result){
                $("#ttable table tbody .isChanged").each(function(){
                  var d=parseInt(this.value);
                 

                  $(this).removeClass('isChanged');
                  $(this).val(d);
                  $(this).attr('data-old',d);
              });
              });
            }

          return false;
        },
        'display':function(target, result){
              target.parent().parent().attr('data-display',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-display='0']").size() + ")");
        }

      });

    $("#ttable table tbody .inputTable").keyup(function(){
        var val=parseInt($(this).val());
        if(isNaN(val)){
          $(this).val($(this).attr('data-old'));
          return false;
        }

        if(val!=$(this).attr('data-old')){
          $(this).addClass('isChanged');
        }else{
          $(this).removeClass('isChanged');
        }
    }).focus(function(){
      $(this).select();
    });


  });

  </script>
@endsection