@extends('backend.layout')
@section('title','Video - ACP')

@section('breadcrumb')
<h2>Video</h2>
<h3 class="trole" data-role="video/create">
        <a href="{{url('admin/video/create')}}">Thêm Mới</a>
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
            <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang ẩn <span class="count"></span></a></li>
      
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">
        <div class="col-sm-8">

            <div class="group-action">
                <select id="bulk-action-selector-top" class="fleft" data-ajax=".checkboxb.checked" data-href='{"Xóa":"{{url('admin/video/deletes')}}"}' data-confirm="Bạn có chắc muốn <b>{value}</b> {item} trang?" data-success-type="option">
                    <option value="-1" selected="selected">- Hành động -</option>
                 
                    <option value="Xóa" data-success-removes="true" class="trole" data-role="video/delete">Xóa</option>
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
                        data-filter='{"type":"column","column":"all","fiter_column":[1,3,4,6,7]}' />
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
                   <th width="150px" class="tsort">Tên</th>
                   <th width="100px">Video</th>
                   <th width="150px">Tiêu đề</th>
                   <th>Xem</th>
                   <th>H.Thị</th>
                   <th class="tsort">Ngày cập nhật</th>
                   <th class="tsort">Ngày tạo</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-display="{{$item->display}}">
                  <td><span class="checkboxb ascheckbox center" data-value="{{$item->id}}"></span></td>
                  <td>
                      <span>
                        <a href="{{url('video/'.$item->id.'-'.$item->url)}}" target="black">{{$item->title}}</a>
                        </span>
                                            <div class="row-action">
                                                    <span title="Sửa thông tin"><a href="{{url('admin/video/'.$item->id)}}">Sửa</a>
                                                        <small>| </small>
                                                    </span>
                                                    <span class="delete">
                                                        <a class="event" 
                                                                data-ajax="true" 
                                                                data-href="{{url('admin/video/delete')}}"
                                                                 data-value="{{$item->id}}" 
                                                                data-success-remove="true" 
                                                                data-name="{{$item->name}}"
                                                                data-confirm="Bạn có chắc muốn xóa video <b>{{$item->name}}</b>?<br /><small>Một khi xóa bạn sẽ không thể khôi phục lại được</small>"
                                                                href="#" title="Xóa">Xóa</a>
                                                    </span>
                                                </div>
                                          </td>
                                     <td>
                                        <div style="position:relative;cursor:pointer" class="videoitem" data-url="{{$item->video_url}}" data-title="{{$item->title}}">
                                          <i style="position:absolute;top:34%;left:40%;z-index:99;font-size:20px" class="fa fa-youtube-play"></i>
                                          <img width="90" src="{{showImage($item->image)}}" />
                                        </div>
                                     </td>
                                <td>
                                  {{$item->title}}
                                </td>
                                 <td>
                                  {{$item->view}}
                                </td>
                               
                                <td>
                                    <span class="ascheckbox checkboxblock {{$item->display==1?'checked':''}}"
                                                data-background="none" 
                                                data-ajax="true" 
                                                data-href="{{url('admin/video/display')}}"
                                                data-value="{{$item->id}}" 
                                                data-name="{{$item->name}}"
                                                data-success="display"
                                                data-confirm="Bạn có chắc <b>{yes=hiện thị}</b><b>{no=ẩn}</b> video <b>{name}</b>?"></span>
                                </td>
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
    </div>
    <!--#ttable-->
</div>

<div class="modal fade" id="viewvideo" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Cancel</button>
                   
                </div>
            </div>
        </div>
    </div>


@endsection

<style type="text/css">
.videoitem i{
  color:white;
}
.videoitem:hover i{
  color:red;
}
</style>

@section('script')
<script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
  var currentPage = "#menu_video";

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

    var videomodal=$('#viewvideo');
    var videourl=null;
    var videotitle=null;

    videomodal.on('shown.bs.modal', function () {
      videomodal.find('.modal-title').html(videotitle);
      videomodal.find('.modal-body').html('<iframe width="560" height="315" src="'+videourl+'" frameborder="0" allowfullscreen=""></iframe>');
    });

    videomodal.on('hidden.bs.modal', function (e) {
      videomodal.find('.modal-body').html('');
    });

    $(".videoitem").click(function(){
      videourl=$(this).attr('data-url');
      videotitle=$(this).attr('data-title');
      $("#viewvideo").modal('show');
    });

  });

  </script>
@endsection