@extends('backend.layout')
@section('title','Quản trị viên - ACP')

@section('breadcrumb')
<h2>Quản trị viên</h2>
<h3 class="trole" data-role="admin/create">
        <a href="{{url('admin/admin/create')}}">Thêm Mới</a>
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
        <li><a data-filter='{"type":"attr","value":"True","attr_name":"data-block"}' data-group-filter="a" data-subsubsub="true" href="#">Đang khóa <span class="count"></span></a></li>
       
    </ul>
    <!--.subsubsub-->
    <div class="row captiontable">
        <div class="col-sm-7 col-md-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{"Xóa":"{{url('admin/admin/deletes')}}","Khóa":"{{url('admin/admin/blocks')}}","Mở Khóa":"{{url('admin/admin/unlocks')}}"}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} admin?" data-success-type="option" data-ajax-value="ischeck">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Khóa" data-success="blocks" class="trole" data-role="admin/block">Khóa</option>
                    <option value="Mở Khóa" data-success="unlocks" class="trole" data-role="admin/block">Mở Khóa</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="admin/delete">Xóa</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"attr","attr_name":"data-group"}' data-group-filter="a">
                    <option selected="selected" data-id="-1" value="-1">- Tất cả nhóm -</option>
                    @foreach($listGroup as $value)
                    <option value="{{$value->id}}" data-id="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                </select>
                <input type="button" class="button fleft" data-target="#filter-by-date" value="Lọc">
            </div>
            <div class="clearfloat"></div>
        </div>
        <!--col left-->
        <div class="col-sm-5 col-md-4 captionright">
            <div class="gsearchtable">
                <input type="button" class="button fright" data-target="#filter-by-search" value="Tìm kiếm" />
                <div class="searchicon">
                    <input type="text" id="filter-by-search" placeholder="Nhập nội dung cần tìm..." class="searchtable fright"
                        data-filter='{"type":"column","column":"all","fiter_column":[1,3,4,8]}' />
                    <i title="Xóa nội dung tìm kiếm.">&times;</i>
                </div>
                <div class="clearfloat"></div>
            </div>
            <div class="clearfloat"></div>
        </div>
    </div>
    <!--.captiontable-->
<div style="overflow-x:auto;">
    <table style="min-width:950px">
        <thead>
            <tr>
                <th width="35px">
                    <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                </th>
                <th class="tsort" width="180px">Username</th>
          
                <th width="70px">Tên</th>
                <th>Số ĐT</th>
                <th>Email</th>
                <th>Nhóm</th>
                <th width="70px">Khóa</th>
                <th class="tsort">Ngày Tạo</th>
                <th class="tsort">Ngày Cập Nhật</th>
                <th class="tsort">Truy cập cuối</th>
            </tr>
        </thead>
        <tbody>
          <?php $IdUser=$admin_info['id']; ?>
            @foreach ($data as $item)
                <tr data-block="{{$item->block}}" data-group="{{$item->group_id}}">
                    <td>
                        
                        <span class="ascheckbox center {{$item->id==$IdUser?"disabled":"checkboxb"}}" data-value="{{$item->id}}"></span>
                    </td>
                    <td>
                        <span>{{$item->username}}</span>
                        <div class="row-action">
                            <span class="trole" data-role="admin/update"><a href="{{url('admin/admin/'.$item->id)}}" title="Sửa thông tin">Sửa</a>
                                <small>| </small>
                            </span>
                           <?php if($item->id!=$IdUser){ ?>
                            <span class="delete trole" data-role="admin/delete">
                                <a class="event" 
                                        data-ajax="true" 
                                        data-href="{{url('admin/admin/delete')}}"
                                         data-value="{{$item->id}}" 
                                        data-success-remove="true" 
                                        data-name="{{$item->name}}" 
                                        data-confirm="Bạn có chắc muốn xóa admin <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                        href="#" title="Xóa admin này">Xóa</a>
                                <small>| </small>
                            </span>
                           <?php } ?>
                                <span class="trole" data-role="admin/reset"><a class="event"
                                        data-ajax="true" 
                                         data-href="{{url('admin/admin/reset')}}"
                                         data-value="{{$item->id}}" 
                                         data-success="resetpass"
                                        data-before="enterpass"
                                        href="#" title="Cập nhật lại mật khẩu cho admin">Reset pass</a>
                                </span>
                        </div>
                    </td>
                   
                    <td>
<div class="text-center">
                        <img width="50px" src="{{Asset('public/images/avatar/'.$item->id.'.jpg')}}" />
                        <div style="margin-top:5px">{{$item->name}}</div></div>
                    </td>
                    <td>{{$item->phone}}</td>
                    <td>
                        @if(strlen($item->email)<15)
                            {{$item->email}}
                        @else
                            {!!substr($item->email,0,15).'<br>'.substr($item->email,15)!!}
                        @endif
                    </td>
                    <td><span class="group_id" data-id="{{$item->group_id}}"></span></td>
                    <td><span class="ascheckbox checkboxblock {{$item->block==1? "checked" : ""}} {{$item->id==$IdUser?"disabled":""}}" 
                        data-background="none" 
                        data-ajax="true" 
                        data-href="{{url('admin/admin/block')}}"
                        data-value="{{$item->id}}" 
                        data-name="{{$item->name}}"
                        data-success="block"
                        data-confirm="Bạn có chắc muốn <b>{yes=khóa}</b><b>{no=mở khóa}</b> admin {name}?"></span></td>
                    <td>
                                    {{date('d/m/Y H:i',strtotime($item->created_at))}}
                                </td>
                    <td>
                                    {{date('d/m/Y H:i',strtotime($item->updated_at))}}
                                </td>
                                
                                 <td>
                                    {{date('d/m/Y H:i',strtotime($item->after_last_visit))}}
                                </td>
                </tr>
            @endforeach

        </tbody>

    </table>
    </div>
</div><!--#ttable-->

<div class="modal fade" id="enterpass" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nhập mật khẩu mới</h4>
            </div>
            <div class="modal-body">
                <div class="red text-center"></div><br />
                <div class="row margin">
                    <div class="col-sm-3">
                        Mật khẩu mới:
                    </div>
                    <div class="col-sm-9">
                         <input type="password" name="password" class="form-control" />
                    </div>
                </div>
                <div class="row margin">
                    <div class="col-sm-3">
                        Nhập lại mật khẩu:
                    </div>
                    <div class="col-sm-9">
                         <input type="password" name="repassword" class="form-control" />
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Lưu lại</button>
                <button class="btn" data-dismiss="modal">Hủy bỏ</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
<script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
   var currentPage = "#menu_admin";
        var subPage = 'list';
var _token="{{csrf_token()}}";
  $(document).ready(function(){


    if ($(window).width()>769 && !$("#col-left").hasClass("hidemenu")) {
                $("#togglemenu").click();
            }

     $("#enterpass .btn-success").click(function () {
                var modal=$("#enterpass");
                var pass = $.trim(modal.find("input[name='password']").val());
                var repass = $.trim(modal.find("input[name='repassword']").val());
                if (pass == '') {
                    modal.find(".red").html("Vui lòng nhập mật khẩu");
                    modal.find("input[name='password']").focus();
                    return false
                }
                if (pass != repass) {
                    modal.find(".red").html("Nhập lại mật khẩu sai");
                    modal.find("input[name='repassword']").val('').focus();
                    return false;
                }

                TRunAjax(modal.attr('data-href'), { "data": modal.attr('data-value'), "pass": pass,"_token":_token }, function (result) {
                    getAlert(result.message);
                    modal.modal('hide');
                });

                return false;
            });

            if ($("#bulk-action-selector-top option").size() == 1) {
                $("#ttable table .ascheckbox").addClass("disabled");
            } else {
                if (!checkRole("admin/block")) {
                    $("#ttable table .ascheckbox.checkboxblock").addClass("disabled");
                }
            }


            new TTable($("#ttable"), {
                "resetpass": function (message, target, data, value,result) {
                    getAlert(message);
                },
                "enterpass": function (href, data, target) {
                    var modal = $("#enterpass");
                    modal.attr('data-href', href);
                    modal.attr('data-value', data);
                    modal.modal('show');
                },
                "block": function (target, result) {
                  target.parent().parent().attr('data-block',(target.hasClass('checked')?1:0));
                    getAlert((target.hasClass('checked')?'Khóa':'Mở khóa')+' thành công admin '+target.attr('data-name'));
                    target = target.parents(".ttable");
                    target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-block='1']").size() + ")");
                },
                "blocks": function (message, target, data, value, result) {
                    getAlert(message);
                    target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                        if ($(this).hasClass("checked")) {
                            $(this).parents("tr").attr("data-block","1").find("td:eq(6) .checkboxblock").addClass("checked");
                           
                        }
                    });
                    target = target.parents(".ttable");
                    target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-block='1']").size() + ")");
                },
                "unlocks": function (message, target, data, value, result) {
                    getAlert(message);
                    target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                        if ($(this).hasClass("checked")) {
                            $(this).parents("tr").attr("data-block", "0").find("td:eq(6) .checkboxblock").removeClass("checked");
                        }
                    });
                    target = target.parents(".ttable");
                    target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-block='1']").size() + ")");

                },
                "confirm": getConfirm,
                "alert":getAlert,
                "token":_token,
                "showcount": function (obj, sumitem) {

                    obj.find(".subsubsub li:eq(0) .count").html('(' + sumitem + ')');
                    var count = obj.find("table tbody tr[data-block='1']").size();
                    obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');
                }
            });

var bobj=$("#ttable table tbody .group_id");
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