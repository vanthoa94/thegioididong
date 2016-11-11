@extends('backend.layout')
@section('title','Đại lý - ACP')

@section('breadcrumb')
<h2>Đại lý</h2>
<h3 class="trole" data-role="agency/create">
        <a href="{{url('admin/agency/create')}}">Thêm Mới</a>
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
            <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-displayfoolter"}' data-group-filter="a" data-subsubsub="true" href="#">Hiển thị cuối web <span class="count"></span></a></li>
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{{url('admin/agency/deletes')}}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} đại lý?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="agency/delete">Xóa</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
  
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"column","column":"select","filtertype":"="}'>
                    <option selected="selected" value="-1" data-id="-1">- Tất cả chi nhánh -</option>
                    
                    @foreach($listBranch as $item)
                      <option value="{{$item->name}}" data-id="{{$item->id}}" data-column="4">{{$item->name}}</option>
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
                   <th class="tsort" width="200px">Tên đại lý</th>
                   <th>Số điện thoại</th>
                   <th width="200px">Địa chỉ</th>
                   <th width="150px">Chi nhánh</th>
                   <th>H.Thị cuối web</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-displayfoolter="{{$item->display_footer}}">
                  <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                  <td>
                      <span>{{$item->name}}</span>
                                            <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/agency/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/agency/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa đại lý <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                <td>
                                  {{$item->phone}}
                                </td>
                                <td>
                                  {{$item->address}}
                                </td>
                                <td><span class="brand_id" data-id="{{$item->branch_id}}"></span></td>
                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->display_footer==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/agency/display_footer')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="display_footer"
                                                data-confirm="Bạn có chắc muốn <b>{yes=hiện thị}</b><b>{no=ẩn}</b> đại lý <b>{name}</b> dưới cuối trang?"></span>
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
	var currentPage = "#menu_branch";
	var subPage = 'agency';

	$(document).ready(function(){

		new TTable($("#ttable"),{
			'alert':getAlert,
			'confirm':getConfirm,
      'token':'{{csrf_token()}}',
      "showcount":function(obj,item){
              var count = obj.find("table tbody tr[data-displayfoolter='1']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');

          },
          'display_footer':function(target, result){
              
              target.parent().parent().attr('data-displayfoolter',(target.hasClass('checked')?1:0));
              target = target.parents(".ttable");

              target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-displayfoolter='1']").size() + ")");
        }
    	});
    var bobj=$("#ttable table tbody .brand_id");
    $("#filter-by-date option").each(function(){
      var id=$(this).attr('data-id');
      if(id!=='-1'){
        var name=$(this).html();
        //branchlist[$(this).attr('value')]=$(this).html();
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