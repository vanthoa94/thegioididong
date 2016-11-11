@extends('backend.layout')
@section('title','Người dùng - ACP')

@section('breadcrumb')
<h2>Người dùng</h2>
<h3 class="trole" data-role="user/create">
        <a href="{{url('admin/user/create')}}">Thêm Mới</a>
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
        <li><a data-filter='{"type":"attr","value":"1","attr_name":"data-block"}' data-group-filter="a" data-subsubsub="true" href="#">Đang khóa <span class="count"></span></a></li>
       
    </ul>
    <!--.subsubsub-->
    <div class="row captiontable">
        <div class="col-sm-7 col-md-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{"Xóa":"{{url('admin/user/deletes')}}","Khóa":"{{url('admin/user/blocks')}}","Mở Khóa":"{{url('admin/user/unlocks')}}"}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} người dùng?" data-success-type="option" data-ajax-value="ischeck">
                    <option value="-1" selected="selected">- Hành động -</option>
                    <option value="Khóa" data-success="blocks" class="trole" data-role="user/block">Khóa</option>
                    <option value="Mở Khóa" data-success="unlocks" class="trole" data-role="user/block">Mở Khóa</option>
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="user/delete">Xóa</option>
                </select>
                <input type="button" class="button fleft" data-target="#bulk-action-selector-top" value="Áp dụng">
            </div>
            <div class="group-action">
                <select id="filter-by-date" data-filter='{"type":"column","column":"select","filtertype":"^"}' data-group-filter="a">
                    <option selected="selected" value="-1">- Lọc tất cả -</option>
                    
                    <option value="Nam" data-column="6">Giới tính nam</option>
                    <option value="Nữ" data-column="6">Giới tính nữ</option>
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
                        data-filter='{"type":"column","column":"all","fiter_column":[1,2,3,4,5,8,9]}' />
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
                <th class="tsort" width="200px">Username</th>
          
                <th>Tên</th>
                <th>Số ĐT</th>
                <th>Email</th>
                <th width="150px">Địa chỉ</th>
                <th>Giới tính</th>
                <th width="70px">Khóa</th>
                <th class="tsort">Ngày Tạo</th>
                <th class="tsort">Ngày Cập Nhật</th>
            </tr>
        </thead>
        <tbody>
          <?php $IdUser=0; ?>
            @foreach ($data as $item)
                <tr data-block="{{$item->block}}">
                    <td>
                        
                        <span class="ascheckbox center checkboxb" data-value="{{$item->id}}"></span>
                    </td>
                    <td>
                        <span>{{$item->username}}</span>
                        <div class="row-action">
                            <span class="trole" data-role="user/update"><a href="{{url('admin/user/'.$item->id)}}" title="Sửa thông tin">Sửa</a>
                                <small>| </small>
                            </span>
                            <span class="delete trole" data-role="user/delete">
                                <a class="event" 
                                        data-ajax="true" 
                                        data-href="{{url('admin/user/delete')}}"
                                         data-value="{{$item->id}}" 
                                        data-success-remove="true"  
                                        data-name="{{$item->username}}" 
                                        data-confirm="Bạn có chắc muốn xóa user <b>{{$item->username}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                        href="#" title="Xóa user này">Xóa</a>
                                <small>| </small>
                            </span>
                                <span class="trole" data-role="user/reset"><a class="event"
                                        data-ajax="true" 
                                         data-href="{{url('admin/user/reset')}}"
                                         data-value="{{$item->id}}" 
                                         data-success="resetpass"
                                        data-before="enterpass"
                                        href="#" title="Cập nhật lại mật khẩu cho user">Reset pass</a>
                                </span>
                        </div>
                    </td>
                   
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        @if(strlen($item->email)<=15)
                        {{$item->email}}
                        @else
                        {{substr($item->email,0,15)}}<br />
                        {{substr($item->email,15)}}
                        @endif
                    </td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->gender==1?"Nam":"Nữ"}}</td>
                    <td><span class="ascheckbox checkboxblock {{$item->block==1? "checked" : ""}}" 
                        data-background="none" 
                        data-ajax="true" 
                        data-href="{{url('admin/user/block')}}"
                        data-value="{{$item->id}}" 
                        data-name="{{$item->username}}"
                        data-success="block"
                        data-confirm="Bạn có chắc muốn <b>{yes=khóa}</b><b>{no=mở khóa}</b> người dùng {name}?"></span></td>
                    <td>
                                    {{date('d/m/Y H:i',strtotime($item->updated_at))}}
                                </td>
                                <td>
                                    {{date('d/m/Y H:i',strtotime($item->created_at))}}
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
   var currentPage = "#menu_account";
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
                if (!checkRole("user/block")) {
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
                    getAlert((target.hasClass('checked')?'Khóa':'Mở khóa')+' thành công người dùng '+target.attr('data-name'));
                    target = target.parents(".ttable");
                    target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-block='1']").size() + ")");
                },
                "blocks": function (message, target, data, value, result) {
                    getAlert(message);
                    target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                        if ($(this).hasClass("checked")) {
                            $(this).parents("tr").attr("data-block","1").find("td:eq(7) .checkboxblock").addClass("checked");
                           
                        }
                    });
                    target = target.parents(".ttable");
                    target.find(".subsubsub li:eq(1) span.count").html("(" + target.find("table tbody tr[data-block='1']").size() + ")");
                },
                "unlocks": function (message, target, data, value, result) {
                    getAlert(message);
                    target.parents(".ttable").find("table tbody tr .checkboxb").each(function () {
                        if ($(this).hasClass("checked")) {
                            $(this).parents("tr").attr("data-block", "0").find("td:eq(7) .checkboxblock").removeClass("checked");
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

  });

  </script>
@endsection