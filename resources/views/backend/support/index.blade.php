@extends('backend.layout')
@section('title','Hỗ trợ - ACP')

@section('breadcrumb')
<h2>Hỗ trợ</h2>
<h3 class="trole" data-role="support/create">
        <a href="{{url('admin/support/create')}}">Thêm Mới</a>
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
            <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang ẩn <span class="count"></span></a></li>
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{{url('admin/support/deletes')}}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} đại lý?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="support/delete">Xóa</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
  
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"column","column":"select","filtertype":"="}'>
                    <option selected="selected" value="-1" data-id="-1">- Tất cả nhóm -</option>
                    <option value="Phân phối" data-column="6">Phân phối</option>
                    <option value="Hỗ trợ" data-column="6">Hỗ trợ</option>
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
                        data-filter='{"type":"column","column":"all","fiter_column":[1,2,3,4]}' />
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
                   <th class="tsort" width="150px">Tên</th>
                   <th width="150px">Số ĐT</th>
                   <th width="70px">Skype</th>
                   <th width="70px">Yahoo</th>
                   <th width="250px">Email</th>
                   <th>Nhóm</th>
                   <th>Hiển thị</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-display="{{$item->display}}">
                  <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                  <td>
                      <span>{{$item->name}}</span>
                                            <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/support/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/support/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa hỗ trợ <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                <td>
                                  {{$item->phone}}
                                </td>
                                <td>
                                  @if($item->skype!="")
                                  <a href="skype:{{$item->skype}}?chat"><i class="fa fa-skype"></i></a>
                                  @endif
                                </td>
                                <td>
                                  @if($item->yahoo!="")
                                  <a href="ymsgr:sendim?{{$item->yahoo}}" mce_href="ymsgr:sendim?{{$item->yahoo}}" border="0"><img src="http://opi.yahoo.com/online?u={{$item->yahoo}}&t=1" mce_src="http://opi.yahoo.com/online?u={{$item->yahoo}}&t=1"></a>
                                  @endif
                                </td>
                                <td>
                                  {{$item->email}}
                                </td>
                                <td>
                                  @if($item->group==1)
                                  Phân phối
                                  @else
                                  Hỗ trợ
                                  @endif
                                </td>
                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->display==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/support/display')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> hỗ trợ <b>{name}</b>?"></span>
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
	var currentPage = "#menu_support";
	

	$(document).ready(function(){

		new TTable($("#ttable"),{
			'alert':getAlert,
			'confirm':getConfirm,
      'token':'{{csrf_token()}}',
      "showcount":function(obj,item){
              var count = obj.find("table tbody tr[data-display='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');

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