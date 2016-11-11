@extends('backend.layout')
@section('title','Tin tức - ACP')

@section('breadcrumb')
<h2>Tin tức</h2>
<h3 class="trole" data-role="news/create">
        <a href="{{url('admin/news/create')}}">Thêm Mới</a>
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
            <li><a data-filter="all" data-group-filter="a" data-subsubsub="true"  href="#" class="current">Tất cả <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang ẩn <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-hot"}' data-group-filter="a" data-subsubsub="true" href="#">Tin tiêu điểm <span class="count"></span></a></li>
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{"Xóa":"{{url('admin/news/deletes')}}","đặt là tin tiêu điểm":"{{url('admin/news/hots')}}","ẩn":"{{url('admin/news/displays')}}"}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} tin tức?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="đặt là tin tiêu điểm" data-success="hots">Là tin tiêu điểm</option>
                    <option value="ẩn" data-success="displays" class="trole">Ẩn</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="news/delete">Xóa</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
  
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"column","column":"select","filtertype":"="}'>
                    <option selected="selected" value="-1" data-id="-1">- Tất cả loại tin -</option>
                    
                    @foreach($listNewsCate as $item)
                      <option value="{{$item->name}}" data-id="{{$item->id}}" data-column="2">{{$item->name}}</option>
                    @endforeach
                </select>
                <input type="button" class="button fleft" data-target="#filter-by-date" value="Lọc">
            </div>
            <div class="clearfloat"></div>
        </div>
        <!--col left-->
        <div class="col-sm-4 captionright">
            <div class="gsearchtable">
                <input type="button" class="button fright" data-target="#filter-by-search" value="Tìm kiếm" />
                <div class="searchicon">
                    <input type="text" id="filter-by-search" placeholder="Nhập nội dung cần tìm..." class="searchtable fright"
                        data-filter='{"type":"column","column":"all","fiter_column":[1,2,3,4,7]}' />
                    <i title="Xóa nội dung tìm kiếm.">&times;</i>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
       <!--.captiontable-->
       <div style="overflow-x:auto;">
          <table style="min-width:800px">
             <thead>
                <tr>
                   <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                   </th>
                   <th width="250px">Tin tức</th>
                   <th width="100px">Loại tin</th>
                   <th width="150px">Mô tả</th>
                   <th width="150px">Từ khóa</th>
                   <th>Tiêu điểm</th>
                   <th>H.Thị</th>
                   <th class="tsort">Ngày cập nhật</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-display="{{$item->display}}" data-hot="{{$item->hot}}">
                  <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                  <td>
                      <span class="clearfix">
                        <img class="pull-left" style="margin-right:5px;margin-top:2px" src="{{showImage($item->image)}}" width="70" height="60" />
                        <b>{{$item->title}}</b><br />
                        <small>{{date('d/m/Y H:i',strtotime($item->created_at))}} - {{$item->viewer}} lượt xem</small>
                      </span>
                                            <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/news/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/news/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->title}}"
                                                                data-confirm="Bạn có chắc muốn xóa tin tức <b>{{$item->title}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                          <td><span class="cate_id" data-id="{{$item->cate_id}}"></span></td>
                                <td>
                                  <span class="cutlength" max-length="50">{{$item->description}}</span>
                                </td>
                                <td>
                                  <span class="cutlength" max-length="50">{{$item->keywords}}</span>
                                </td>
                               
                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->hot==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/news/hot')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->title}}"
                                                data-success="hot"
                                                data-confirm="Bạn có chắc cho tin tức <i>{name}</i> <b>{yes=là tin hot}</b><b>{no=không phải tin hot}</b>?"></span>
                                </td>
                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->display==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/news/display')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->title}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc <b>{yes=hiện thị}</b><b>{no=ẩn}</b> tin tức <b>{name}</b>?"></span>
                                </td>
                                <td>
                                    {{date('d/m/Y H:i',strtotime($item->updated_at))}}
                                </td>
                </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
    <!--#ttable-->
</div>


@endsection

@section('script')
<script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
  var currentPage = "#menu_news";
  var subPage = 'list';

  $(document).ready(function(){

    new TTable($("#ttable"),{
      'alert':getAlert,
      'confirm':getConfirm,
      'token':'{{csrf_token()}}',
      "showcount":function(obj,item){
              var count = obj.find("table tbody tr[data-display='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');
count = obj.find("table tbody tr[data-hot='1']").size();
              obj.find(".subsubsub li:eq(2) .count").html('(' + count + ')');
          },
        'display':function(target, result){
              target.parent().parent().attr('data-display',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-display='0']").size() + ")");
        },
        'hot':function(target, result){
              target.parent().parent().attr('data-hot',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-hot='1']").size() + ")");
        },
        "hots": function (message, target, data, value, result) {
                    getAlert(message);
                    target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                        if ($(this).hasClass("checked")) {
                            $(this).parents("tr").eq(0).attr("data-hot","1").find("td:eq(5) .checkboxblock").addClass("checked");
                           
                        }
                    });
                    target = target.parents(".ttable").eq(0);
                    target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-hot='1']").size() + ")");
                },
                "displays": function (message, target, data, value, result) {
                    getAlert(message);
                    target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                        if ($(this).hasClass("checked")) {
                            $(this).parents("tr").eq(0).attr("data-display","0").find("td:eq(6) .checkboxblock").removeClass("checked");
                           
                        }
                    });
                    target = target.parents(".ttable").eq(0);
                    target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-display='0']").size() + ")");
                }
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