@extends('backend.layout')
@section('title','Nhóm Admin')

@section('breadcrumb')
<h2>Nhóm Admin</h2>
<h3 class="trole" data-role="groupadmin/create">
        <a href="{{url('admin/group-admin/create')}}">Thêm Mới</a>
    </h3>
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
@endsection

@section('content')

@include('backend._message')
<div id="ttable" class="ttable">
       <ul class="subsubsub">
            <li><a data-filter="all" data-group-filter="a" data-subsubsub="true"  href="#" class="current">Tất cả <span class="count"></span></a></li>
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{{url('admin/group-admin/deletes')}}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} nhóm?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="groupadmin/delete">Xóa</option>
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
                        data-filter='{"type":"column","column":"all","fiter_column":[1]}' />
                    <i title="Xóa nội dung tìm kiếm.">&times;</i>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
       <!--.captiontable-->
       <div style="overflow-x:auto;">
          <table style="min-width:700px">
             <thead>
                <tr>
                   <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                   </th>
                   <th class="tsort">Tên nhóm</th>
                   <th class="tsort">Số thành viên trong nhóm</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-zone="{{$item->zone}}">
                  <td>
                    <span class="ascheckbox center {{$item->count==0?'checkboxb':'disabled'}}" data-value="{{$item->id}}">
</span></td>
                  
                                <td>
                                  <span>{{$item->name}}</span>
                                  <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/group-admin/'.$item->id)}}">Sửa</a>
                                                        @if($item->count==0)
                                                        <small>| </small>
                                                        @endif
                                                    </span>
                                                    @if($item->count==0)
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/group-admin/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa nhóm <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa chi nhánh này">Xóa</a>
                                                    </span>
                                                     @endif
                                                </div>
                                </td>
                                <td>{{$item->count}}</td>

                              
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
	var currentPage = "#menu_admin";
	var subPage = 'group';

	$(document).ready(function(){

		new TTable($("#ttable"),{
			'alert':getAlert,
			'confirm':getConfirm,
      'token':'{{csrf_token()}}'
    	});

   

	});

	</script>
@endsection