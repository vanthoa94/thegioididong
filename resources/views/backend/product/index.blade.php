@extends('backend.layout')
@section('title','Sách - ACP')

@section('breadcrumb')
<h2>Sách</h2>
<h3 class="trole" data-role="product/create">
        <a href="{{url('admin/product/create')}}">Thêm Mới</a>
    </h3>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
@endsection

@section('content')

<?php 
function showImage($path){
        if(strpos($path, "http")===0)
            return $path;
        return Asset('public/images/'.$path);
    }
 ?>

@include('backend._message')

    <div id="ttable" class="ttable">
    <ul class="subsubsub">
        <li><a data-filter="all" data-group-filter="a" data-subsubsub="true" href="#" class="current">Tất cả <span class="count"></span></a>|</li>
        <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang ẩn <span class="count"></span></a>|</li>
        <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-showhome"}' data-group-filter="a" data-subsubsub="true" href="#">Hiện thị trang chủ <span class="count"></span></a>
 @if(isset($_GET['id']))
|
 @endif
        </li>
       
       @if(isset($_GET['id']))
        <li><a data-filter='{"type":"attr","value":"{{$_GET['id']}}","attr_name":"data-id"}' href="#">Tìm kiếm <span class="count">(1)</span></a></li>
       @endif
       
    </ul>

     <?php 
              $arr_status=\App\Product::getStatus();
            ?>
    <!--.subsubsub-->
    <div class="row captiontable">
        <div class="col-sm-7 col-md-8">

          <div class="group-action">
                <select id="bulk-action-selector-top" style="width:115px" class="fleft" data-ajax=".checkboxb.checked" data-href='{"hiện":"{{url('admin/product/displays')}}","ẩn":"{{url('admin/product/hides')}}","hiện thị trang chủ":"{{url('admin/product/showhomes')}}","ẩn trang chủ":"{{url('admin/product/hidehomes')}}"}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} sách?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="hiện" data-success="displays">Hiện</option>
                    <option value="ẩn" data-success="hides">Ẩn</option>
                    <option value="hiện thị trang chủ" data-success="displayhomes">Hiện trang chủ</option>
                    <option value="ẩn trang chủ" data-success="hidehomes">Ẩn trang chủ</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>

            <div class="group-action">
                <select id="bulk-action-selector-top1" class="fleft" data-ajax=".checkboxb.checked" data-href='' data-before="action">
                    <option value="1" selected="selected">Lưu s.xếp</option>
                    
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top1" value="Lưu">
            </div>

             
            <div class="group-action">
                 <select style="width:120px" id="filter-by-date" data-filter='{"type":"column","column":"select","filtertype":"="}'>
                    <option selected="selected" value="-1" data-id="-1">- Tất cả loại -</option>
                    
                    @foreach($listCategory as $item)
                      <option value="{{$item->name}}" data-id="{{$item->id}}" data-column="4">{{$item->name}}</option>
                    @endforeach
                </select>
                <input type="button" class="button fleft" data-target="#filter-by-date" value="Lọc">
            </div>

            <div class="group-action">
                 <select style="width:120px" id="filter-by-status" data-filter='{"type":"attr","attr_name":"data-status"}'>
                    <option selected="selected" value="-1" data-id="-1">- Tất cả status -</option>
                    
                    @foreach($arr_status as $key => $value)
                      <option value="{{$key}}" data-id="{{$key}}" data-column="4">{{$value}}</option>
                    @endforeach
                </select>
                <input type="button" class="button fleft" data-target="#filter-by-status" value="Lọc">
            </div>

            <div class="clearfloat"></div>
        </div>
        <!--col left-->
        <div class="col-sm-5 col-md-4 captionright">
            <div class="gsearchtable">
                <input type="button" class="button fright" data-target="#filter-by-search" value="Tìm kiếm" />
                <div class="searchicon">
                    <input type="text" id="filter-by-search" placeholder="Nhập nội dung cần tìm..." class="searchtable fright"
                        data-filter='{"type":"column","column":"all","fiter_column":[2,3,4,5,8]}' />
                    <i title="Xóa nội dung tìm kiếm.">&times;</i>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
    <!--.captiontable-->
  <div style="overflow-x:auto;">
      <table style="min-width:1000px">
          <thead>
              <tr>
                  <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                  </th>
                    <th class="tsort" width="60px">S.Xếp</th>
                    <th width="280px">Sách</th>
                    <th class="tsort" width="170px">Giá</th>
                   <th class="tsort">Loại</th>
                   <th class="tsort">Đọc</th>
                   <th>H.Thị</th>
                   <th>H.T TC</th>
                   <th class="tsort">Cập nhật</th>
              </tr>
          </thead>
          <tbody>
           
            @foreach($data as $item)
            
                                            <tr data-display="{{$item->display}}" data-status="{{$item->status}}" data-showhome="{{$item->show_home}}" data-id="{{$item->id}}">
                                          <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                                          <td>
                                            <span>
                                              <i class="hidden">{{$item->index_home}}</i>
                                              <input type="text" class="inputTable" data-id="{{$item->id}}" value="{{$item->index_home}}" data-old="{{$item->index_home}}" />
                                            </span>
                                            
                                          </td>
                                         <td>
                      <span class="clearfix">
                        <img class="pull-left" style="margin-right:5px;margin-top:2px;max-width:80px" src="{{showImage($item->image)}}" height="85" />
                        <div class="pull-left" style="width:200px">
                         
                          <b><a href="{{url($item->url.'.html')}}" target="_black">{{$item->name}}</a></b><br />
                          <small>{{date('d/m/Y H:i',strtotime($item->created_at))}} <br /> Tác giả: {{$item->author}}<br /> status: {{$arr_status[$item->status]}}
<br /> SL: {{$item->quantity}}
                          </small>
                        </div>
                      </span>
                                            <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/product/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span title="Mục lục"><a href="{{url('admin/muc-luc/'.$item->id)}}">Mục lục</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span title="Danh sách đơn đăng ký mua"><a href="{{url('admin/order?bookid='.$item->id)}}">Đơn hàng</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/product/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa sách <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>

                                          <td>
                                          <div class="clearfix"> 
                                            <b class="pull-left" style="width:60px">Giá:</b> {{$item->price==-1?'Miễn phí':number_format($item->price,0,',','.')}}<br />
                                            <b class="pull-left" style="width:60px">Giá km: </b> {{$item->price==-1?'Miễn phí':($item->price_pro==-1?number_format($item->price,0,',','.'):number_format($item->price_pro,0,',','.'))}}<br />
                                         
                                            </div>
                                          </td>
                                          
                                          <td><span class="cate_id" data-id="{{$item->cate_id}}"></span></td>
                                         


                                        <td>Tổng: {{$item->viewer}}<br />
                                          ToDay: {{$item->doctn}}</td>

                                          <td>
                                                    <span class="ascheckbox checkboxblock {{$item->display==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/product/display')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> sách <b>{name}</b>?"></span>
                                          </td>

                                          <td>
                                                    <span class="ascheckbox checkboxblock {{$item->show_home==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/product/show_home')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="show_home"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiển thị}</b><b>{no=ẩn}</b> sách <b>{name}</b> ngoài trang chủ?"></span>
                                          </td>

                                          <td>
                                    {{date('d/m/Y H:i',strtotime($item->updated_at))}}
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
	var currentPage = "#menu_product";
  var subPage='list';
  var IdBook="{{$_GET['id'] or 0}}";
  
	$(document).ready(function(){
    
    if ($(window).width()>769 && !$("#col-left").hasClass("hidemenu")) {
                $("#togglemenu").click();
            }
    new TTable($("#ttable"),{
      'token':"{{csrf_token()}}",
      'alert':getAlert,
      'confirm':getConfirm,
      "showcount":function(obj,item){
        obj.find(".subsubsub li:eq(0) .count").html('(' + item + ')');
              var count = obj.find("table tbody tr[data-display='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');
              count = obj.find("table tbody tr[data-showhome='1']").size();
              obj.find(".subsubsub li:eq(2) .count").html('(' + count + ')');

              if (IdBook != 0) {
                        var s=obj.find('table tbody tr[data-id="' + IdBook + '"]').size();
                        obj.find(".subsubsub li:eq(3) .count").html('(' + s + ')');
                    }

             
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
              TRunAjax(base_url+"/product/sort",{"id":id,"data":data,"_token":this.token},function(result){
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
        },
        'show_home':function(target, result){

        },
        "displays": function (message, target, data, value, result) {
            
            target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                if ($(this).hasClass("checked")) {
                    $(this).parents("tr").eq(0).attr("data-display","1").find("td:eq(6) .checkboxblock").addClass("checked");
                   
                }
            });
            target = target.parents(".ttable").eq(0);
            target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-display='0']").size() + ")");
        },
        "hides": function (message, target, data, value, result) {
            target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                if ($(this).hasClass("checked")) {
                    $(this).parents("tr").eq(0).attr("data-display","0").find("td:eq(6) .checkboxblock").removeClass("checked");
                   
                }
            });
            target = target.parents(".ttable").eq(0);
            target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-display='0']").size() + ")");
        },
        "displayhomes": function (message, target, data, value, result) {
            target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                if ($(this).hasClass("checked")) {
                    $(this).parents("tr").eq(0).attr("data-showhome","1").find("td:eq(7) .checkboxblock").addClass("checked");
                   
                }
            });
            target = target.parents(".ttable").eq(0);
            target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-showhome='1']").size() + ")");
        }
        ,
        "hidehomes": function (message, target, data, value, result) {
            target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                if ($(this).hasClass("checked")) {
                    $(this).parents("tr").eq(0).attr("data-showhome","0").find("td:eq(7) .checkboxblock").removeClass("checked");
                   
                }
            });
            target = target.parents(".ttable").eq(0);
            target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-showhome='1']").size() + ")");
        }
      });

if(IdBook!=0)
            $("#ttable").find(".subsubsub a:eq(3)").click();


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


    var bobj=$("#ttable table tbody .cate_id");
    $("#filter-by-date option").each(function(){
      var id=$(this).attr('data-id');
      if(id!=='-1'){
        var name=$(this).html();
        
        var count=0;
        bobj.each(function(){
          if($(this).attr('data-id')==id){
            count++;
            $(this).html(name);
          }
        });

        $(this).html(name+" ("+count+")");
      }
    });


	});

	</script>
@endsection