  <link rel="stylesheet" type="text/css" href="{{Asset('public/css/t_table.css')}}" /> 
<style type="text/css">
table th{
	text-align: left;
}
table a{
	text-decoration: none;
}
.hide{
  display: none;
}
.subsubsub{
  float:left;
    margin-top: -2px !important;
}
</style>


<div id="ttable" class="ttable">
       <ul class="subsubsub">
            <li><a data-filter="all" data-group-filter="a" data-subsubsub="true"  href="#" class="current">Tất cả <span class="count"></span></a>|</li>
            <li><a data-filter='{"type":"attr","value":"0","attr_name":"data-display"}' data-group-filter="a" data-subsubsub="true" href="#">Đang ẩn <span class="count"></span></a></li>
      
       </ul>
       <!--.subsubsub-->
       <div class="row captiontable">

        <!--col left-->
        <div class="col-sm-12 captionright">
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
          <table>
             <thead>
                <tr>
                   <th width="35px">
                      <span class="ascheckbox checkall center" data-target=".checkboxb"></span>
                   </th>
                   <th width="200px" class="tsort">Tiêu đề</th>
                </tr>
             </thead>
             <tbody>
                @foreach($data as $item)
                <tr data-display="{{$item->display}}">
                  <td><span class="checkboxb ascheckbox center" data-value="page/{{$item->url}}.html"></span></td>
                  <td>
                      <span>
                        <a href="{{url('page/'.$item->url.'.html')}}" target="black">{{$item->title}}</a>
                        </span>
                         <div class="row-action">
                         </div>
                    </td>
                </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
    <!--#ttable-->
</div>

 <script src="{{Asset("public/js/jquery.min.js")}}" type="text/javascript"></script>

 <script type="text/javascript" src="{{Asset('public/js/t_table.js')}}"></script>
 <script type="text/javascript">
  $(document).ready(function(){

    new TTable($("#ttable"),{
      'token':'{{csrf_token()}}',
      "showcount":function(obj,item){
        
              var count = obj.find("table tbody tr[data-display='0']").size();
              obj.find(".subsubsub li:eq(1) .count").html('(' + count + ')');

          }
       
      });
  

  });

  </script>