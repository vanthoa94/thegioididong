@extends('backend.layout')
@section('title','Chi nhánh')

@section('breadcrumb')
<h2>Chi nhánh</h2>
<h3 class="trole" data-role="branch/create">
        <a href="{{url('admin/branch/create')}}">Thêm Mới</a>
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
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{{url('admin/branch/deletes')}}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} chi nhánh?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="branch/delete">Xóa</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
            <div class="group-action">
                <select id="save_index" class="fleft" data-ajax=".checkboxb.checked" data-href='' data-before="action">
                   <option value="1">Lưu sắp xếp</option>
                </select>
                <input type="button" class="button fleft" data-target="#save_index" value="Lưu">
            </div>
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"column","column":"select","filtertype":"="}'>
                    <option selected="selected" value="-1">- Tất cả k.vực -</option>
                    
                    <option value="Bắc" data-column="3">Bắc</option>
                    <option value="Trung" data-column="3">Trung</option>
                    <option value="Nam" data-column="3">Nam</option>
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
                        data-filter='{"type":"column","column":"all","fiter_column":[2,3,4]}' />
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
                   <th class="tsort" width="80px">Sắp xếp</th>
                   <th class="tsort">Tên</th>
                   <th>Khu mực</th>
                   <th>Tỉnh/Thành phố</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-zone="{{$item->zone}}">
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
                                                    <span title="Sửa thông tin"><a href="{{url('admin/branch/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/branch/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa chi nhánh <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa chi nhánh này">Xóa</a>
                                                    </span>
                                                </div>
                                </td>

                                <td>
                                  <?php 
                                    switch ($item->zone) {
                                      case '1':
                                        echo 'Bắc';
                                        break;
                                      case '2':
                                        echo 'Trung';
                                        break;
                                      case '3':
                                        echo 'Nam';
                                        break;
                                    }
                                   ?>
                                </td>
                                <td>
                                  {{$item->city_name}}
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
	var subPage = 'list';

	$(document).ready(function(){

		new TTable($("#ttable"),{
			'alert':getAlert,
			'confirm':getConfirm,
      'token':'{{csrf_token()}}',
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
              TRunAjax(base_url+"/branch/sort",{"id":id,"data":data,"_token":this.token},function(result){
                $("#ttable table tbody .isChanged").each(function(){
                  var d=parseInt(this.value);
                 

                  $(this).removeClass('isChanged');
                  $(this).val(d);
                  $(this).attr('data-old',d);
              });
              });
            }

          return false;
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