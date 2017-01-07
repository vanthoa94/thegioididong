@extends('backend.layout')
@section('title','Đơn đăng ký mua sách - ACP')

@section('breadcrumb')
<h2>Đơn đăng ký mua sách</h2>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
@endsection

@section('content')


@include('backend._message')
<div id="ttable" class="ttable">
       <ul class="subsubsub">
            <li><a data-filter="all" data-group-filter="a" data-subsubsub="true"  href="#" class="current">Tất cả <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-active"}' data-group-filter="a" data-subsubsub="true" href="#">Chưa kích hoạt <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-active"}' data-group-filter="a" data-subsubsub="true" href="#">Đã kích hoạt <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"column","column":"8","filtertype":"^","value":"{{$currentDate}}"}' data-group-filter="a" data-subsubsub="true" href="#">Mới <span class="count"></span></a>
 @if(isset($_GET['userid']) || isset($_GET['bookid']))

|
 @endif
            </li>
        
        @if(isset($_GET['userid']))
        <li><a data-filter='{"type":"attr","value":"{{$_GET['userid']}}","attr_name":"data-userid"}' href="#">Tìm kiếm <span class="count">(1)</span></a></li>
        @endif
        @if(isset($_GET['bookid']))
        <li><a data-filter='{"type":"attr","value":"{{$_GET['bookid']}}","attr_name":"data-bookid"}' href="#">Tìm kiếm <span class="count">(1)</span></a></li>
        @endif
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{"Xóa":"{{url('admin/order/deletes')}}","Kích hoạt":"{{url('admin/order/actives')}}","Hủy kích hoạt":"{{url('admin/order/deactives')}}"}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} đơn đăng ký?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                 
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="order/delete">Xóa</option>
                    <option value="Kích hoạt" data-success="displays" class="trole" data-role="order/active">Kích hoạt</option>
                    <option value="Hủy kích hoạt" data-success="deactive" class="trole" data-role="order/active">Hủy kích hoạt</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
  
         
            <div class="clearfloat"></div>
        </div>
        <!--col left-->
        <div class="col-sm-4 captionright">
            <div class="gsearchtable">
                <input type="button" class="button fright" data-target="#filter-by-search" value="Tìm kiếm" />
                <div class="searchicon">
                    <input type="text" id="filter-by-search" placeholder="Nhập nội dung cần tìm..." class="searchtable fright"
                        data-filter='{"type":"column","column":"all","fiter_column":[1,2,3,4,7,8]}' />
                    <i title="Xóa nội dung tìm kiếm.">&times;</i>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
       <!--.captiontable-->
       <div style="overflow-x:auto;">
          <table style="min-width:1080px">
             <thead>
                <tr>
                   <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                   </th>
                   <th width="50px" class="tsort">ID</th>
                   <th width="150px" class="tsort">Sách</th>
                   <th width="250px">Người mua</th>
                   <th width="100px">Giá mua</th>
                   <th>Kích hoạt</th>
                   <th>Xem</th>
                   <th>IP</th>
                   <th class="tsort">Ngày mua</th>
                   <th class="tsort">Ngày kích hoạt</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-active="{{$item->active}}" data-userid="{{$item->user_id}}" data-bookid="{{$item->book_id}}">
                  <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                  <td>
                    {{$item->id}}
                  </td>
                  <td>
                      <span>
                        <a href="{{url('admin/product?id='.$item->book_id)}}" target="black">{{$item->book_name}}</a>
                        </span>
                                            <div class="row-action">
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/order/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->id}}"
                                                                data-confirm="Bạn có chắc muốn xóa đơn đăng ký <b>{{$item->id}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                     <td>
                                      <div style="width:250px;overflow:hidden">
                                        <b title="{{$item->username}}" class="fa fa-user" style="color:#999"></b> {{$item->username}}<br />
                                        <b title="{{$item->email}}" class="fa fa-envelope" style="color:#999"></b> {{$item->email}}<br />
                                        <b title="{{$item->phone}}" class="fa fa-phone" style="color:#999"></b> {{$item->phone}}<br />
                                        <div class="row-action">
                                          <span>
                                            <a href="{{url('admin/user?id='.$item->user_id)}}">Xem chi tiết</a>
                                             <small>| </small>
                                          </span>
                                          <span>
                                            <a href="{{url('admin/order?userid='.$item->user_id)}}">Sách đã mua</a>
                                          </span>
                                        </div>
                                        </div>
                                     </td>
                                <td>
                                  {{number_format($item->gia_mua,0,',','.')}}
                                </td>
                               
                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->active==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/order/active')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->id}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc <b>{yes=kích hoạt}</b><b>{no=bỏ kích hoạt}</b> đơn đăng ký <b>{name}</b>?"></span>
                                </td>
                                <td>
                                  Tổng: {{$item->viewer}}<br />
                                  Day: {{$item->viewer_day}}
                                </td>
                                <td>
                                    IP Mua: {{$item->ip_mua}}<br />
                                    Ip Đọc: <a href="javascript:void(0)" data-toggle="modal" data-target="#MDoc" data-doc="{{$item->ip_doc}}">Xem ds</a>
                                </td>
                                <td>
                                    {{date('d/m/Y H:i',strtotime($item->created_at))}}
                                </td>
                                <td>
                                  @if($item->active==0)
                                  Chưa kích hoạt
                                  @else
                                    {{date('d/m/Y H:i',strtotime($item->updated_at))}}
                                    @endif
                                </td>
                </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
    <!--#ttable-->
</div>

<!-- Modal -->
<div id="MDoc" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ip Đọc</h4>
      </div>
      <div class="modal-body">
        <div class="ttable">
        <table>
          <thead>
          <tr>
            <th>IP</th>
            <th>Xem</th>
            <th>Lần đọc cuối</th>
          </tr> 
</thead>
<tbody id="listIpDoc">
</tbody>


        </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection

@section('script')
<script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
  var currentPage = "#menu_product";
  var subPage='order';
var UserId="{{$_GET['userid'] or 0}}";
var BookId="{{$_GET['bookid'] or 0}}";
var ColumnClick="{{$_GET['cl'] or 0}}";
  $(document).ready(function(){

    if ($(window).width()>769 && !$("#col-left").hasClass("hidemenu")) {
                $("#togglemenu").click();
            }

    new TTable($("#ttable"),{
      'alert':getAlert,
      'confirm':getConfirm,
      'token':'{{csrf_token()}}',
      "showcount":function(obj,item){
        
              var count = obj.find("table tbody tr[data-active='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');
              count = obj.find("table tbody tr[data-active='1']").size();
              obj.find(".subsubsub li:eq(2) .count").html('(' + count + ')');

              var cl3=jQuery.parseJSON(obj.find(".subsubsub li:eq(3) a").attr("data-filter"));
              var length=cl3.value.length;
              count=0;
              obj.find("tbody tr").each(function(){
                if($.trim($(this).find("td:eq("+cl3.column+")").text()).substr(0,length)===cl3.value){
                  count++;
                }
              });

              obj.find(".subsubsub li:eq(3) .count").html('(' + count + ')');

               if (UserId != 0) {
                        var s=obj.find('table tbody tr[data-userid="' + UserId + '"]').size();
                        obj.find(".subsubsub li:eq(4) .count").html('(' + s + ')');
                    }
                    if (BookId != 0) {
                        var s=obj.find('table tbody tr[data-bookid="' + BookId + '"]').size();
                        obj.find(".subsubsub li:eq(4) .count").html('(' + s + ')');
                    }

          },
        'display':function(target, result){
              target.parent().parent().attr('data-active',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-active='0']").size() + ")");
              target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-active='1']").size() + ")");


        },"displays": function (message, target, data, value, result) {
            
            target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                if ($(this).hasClass("checked")) {
                    $(this).parents("tr").eq(0).attr("data-active","1").find("td:eq(5) .checkboxblock").addClass("checked");
                   
                }
            });
            target = target.parents(".ttable").eq(0);
            target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-active='0']").size() + ")");
              target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-active='1']").size() + ")");
        },
        "deactive": function (message, target, data, value, result) {
             target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                if ($(this).hasClass("checked")) {
                    $(this).parents("tr").eq(0).attr("data-active","0").find("td:eq(5) .checkboxblock").removeClass("checked");
                   
                }
            });
            target = target.parents(".ttable").eq(0);
            target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-active='0']").size() + ")");
              target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-active='1']").size() + ")");
        }
      });

if(UserId!=0 || BookId!=0)
            $("#ttable").find(".subsubsub a:eq(4)").click();

          if(ColumnClick!=0){
            $("#ttable").find(".subsubsub a:eq("+ColumnClick+")").click();
          }

          var objDoc=null;

          $("#MDoc").on('shown.bs.modal',function(e){
           var target=$(e.relatedTarget);

           var listIpDoc=target.attr("data-doc");

           if(objDoc==null){
objDoc=$("#listIpDoc");
           }

           if(listIpDoc==""){
            objDoc.html('');
           return;
           }
            listIpDoc=jQuery.parseJSON(listIpDoc);
            for(var key in listIpDoc){
objDoc.html('<tr><td>'+listIpDoc[key].ip+'</td><td>'+listIpDoc[key].view+'</td><td>'+listIpDoc[key].date+'</td></tr>');
            }
          });

  });

  </script>
@endsection