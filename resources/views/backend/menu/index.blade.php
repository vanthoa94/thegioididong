@extends('backend.layout')
@section('title','Menu - ACP')

@section('breadcrumb')
<h2>Menu</h2>
<h3 class="trole" data-role="menu/create">
        <a href="{{url('admin/menu/create')}}">Thêm Mới</a>
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
        <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-showmenutop"}' data-group-filter="a" data-subsubsub="true" href="#">Hiển thị menu <span class="count"></span></a>|</li>
        <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-showfooter"}' data-group-filter="a" data-subsubsub="true" href="#">Hiển thị dưới footer <span class="count"></span></a></li>
       
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

             
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"attr","attr_name":"data-parent"}' data-group-filter="a">
                    <option selected="selected" value="-1">- Con của -</option>
                    @foreach($data as $item)
                      @if($item->parent_id==0)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                      @endif
                    @endforeach
                </select>
                <input type="button" class="button fleft" data-target="#filter-by-date" value="Lọc">
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
      <table style="min-width:750px">
          <thead>
              <tr>
                  <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                  </th>
                  <th class="tsort" width="80px">Sắp Xếp</th>
                  <th width="200px">Tên</th>
                  <th width="150px">Url</th>
                  <th>H.Thị Menu Top</th>
                  <th>H.Thị menu Footer</th>
              </tr>
          </thead>
          <tbody>

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
                                            <tr data-showmenutop="{{$item->show_menu_top}}" data-showfooter="{{$item->show_footer}}" data-parent="{{$item->parent_id}}">
                                          <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                                          <td>
                                            <span>
                                              <i class="hidden">{{$item->index}}</i>
                                              <input type="text" class="inputTable" data-id="{{$item->id}}" value="{{$item->index}}" data-old="{{$item->index}}" />
                                            </span>
                                            
                                          </td>
                                         

                                          <td>
                                            <span>
                                              {{$text.' '.$item->name}}
                                                </span>
                                                <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/menu/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/menu/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa menu <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa ">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                          <td>
                                            {{$item->url}}
                                          </td>
                                          
                                          <td>
                                                    <span class="ascheckbox checkboxblock {{$item->show_menu_top==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/menu/show_menu_top')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="show_menu_top"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> menu <b>{name}</b> trên menu top?"></span>
                                          </td>

                                          <td>
                                                    <span class="ascheckbox checkboxblock {{$item->show_footer==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/menu/show_footer')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="show_footer"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiển thị}</b><b>{no=ẩn}</b> menu <b>{name}</b> ở menu footer?"></span>
                                          </td>


                                        </tr>
                                            <?php
                                            dequy($item->id,$arr,$text.'----');
                                        }
                                    }
                                }
                            dequy(0,$data);
                            ?>


          </tbody>

      </table>
      </div>
  </div><!--#ttable-->
    

@endsection

@section('script')
<script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
	var currentPage = "#menu_menu";
  
	$(document).ready(function(){
    

    new TTable($("#ttable"),{
      'token':"{{csrf_token()}}",
      'alert':getAlert,
      'confirm':getConfirm,
      "showcount":function(obj,item){
              var count = obj.find("table tbody tr[data-showmenutop='1']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');

              count = obj.find("table tbody tr[data-showfooter='1']").size();
              obj.find(".subsubsub li:eq(2) .count").html('(' + count + ')');
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
              TRunAjax(base_url+"/menu/sort",{"id":id,"data":data,"_token":this.token},function(result){
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
        'show_menu_top':function(target, result){
              target.parent().parent().attr('data-showmenutop',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-showmenutop='1']").size() + ")");
        },
        'show_footer':function(target, result){
             
              target.parent().parent().attr('data-showfooter',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-showfooter='1']").size() + ")");
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