@extends('backend.layout')
@section('title','Loại tin tức - ACP')

@section('breadcrumb')
<h2>Loại tin tức</h2>
<h3 class="trole" data-role="newscate/create">
        <a href="{{url('admin/news-category/create')}}">Thêm Mới</a>
    </h3>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
@endsection

@section('content')

@include('backend._message')
<div id="ttable" class="ttable">
       <ul class="subsubsub">
            <li><a data-filter="all" data-group-filter="a" data-subsubsub="true"  href="#" class="current">Tất cả <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang Ẩn <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-showhome"}' data-group-filter="a" data-subsubsub="true" href="#">Hiện thị trang chủ <span class="count"></span></a></li>
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{{url('admin/news-category/deletes')}}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} loại tin tức?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="newscate/delete">Xóa</option>
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
                        data-filter='{"type":"column","column":"all","fiter_column":[1,2]}' />
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
                   <th class="tsort" width="200px">Tên</th>
                   <th>url</th>
                  
                   <th>H.Thị</th>
                   <th>H.Thị trang chủ</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-display="{{$item->display}}" data-showhome="{{$item->show_home}}">
                  <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                  <td>
                      <span>{{$item->name}}</span>
                                            <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/news-category/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/news-category/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa loại tin tức <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
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
                                                data-href="{{url('admin/news-category/display')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> loại tin tức <b>{name}</b>?"></span>
                                </td>

                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->show_home==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/news-category/show_home')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="show_home"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> loại tin tức <b>{name}</b> trong trang chủ?"></span>
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
	var subPage = 'category';

	$(document).ready(function(){

		new TTable($("#ttable"),{
			'alert':getAlert,
			'confirm':getConfirm,
      'token':'{{csrf_token()}}',
      "showcount":function(obj,item){
              var count = obj.find("table tbody tr[data-display='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');

              count = obj.find("table tbody tr[data-showhome='1']").size();
              obj.find(".subsubsub li:eq(2) .count").html('(' + count + ')');

          },
        'show_home':function(target, result){
             
              target.parent().parent().attr('data-showhome',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(2) span.count").html("(" + target.find("table tbody tr[data-showhome='1']").size() + ")");
        },
        'display':function(target, result){
              
              target.parent().parent().attr('data-display',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-display='0']").size() + ")");
        }
    	});

	});

	</script>
@endsection