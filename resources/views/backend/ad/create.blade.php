@extends('backend.layout')
@section('title','Thêm quảng cáo - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/ad')}}">Quảng cáo</a></h2>
    <span>Tạo mới</span>
@endsection



@section('content')
  
  @include('backend._message')

    <form method="post" action="" id="frm">
      <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tiêu đề:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="title" class="form-control">{{old('title')}}</textarea>
                        <span class="desc">Nội dung hiển thị khi rê chuột vào</span>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Link:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="url" id="url" class="form-control">{{old('url')}}</textarea>
                        <span class="desc">
                          Link khi click vào quảng cáo sẽ chuyển đến? <a href="#" id="showviewpage">Chọn từ trang</a>
                        </span>
                    </div>
                   
                </div><br />
            </div>
        </div><br />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Hình Ảnh:</label>
                    </div>
                    <div class="col-md-8 required boxupload">
                        <span class="red">*</span>
                        <img src="{{Asset('public/images/uploadimg.png')}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control " name="image" id="imagechooseval" />Hoặc upload ảnh khác.</div>
                    </div>
                </div><br />
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Vị trí:</label>
                    </div>
                    <div class="col-md-8 required">
                      <span class="red">*</span>
                        <select name="position" class="form-control">
                          <option value="-1">-- Lựa chọn --</option>
                          <option value="1">Trên banner web</option>
                          <option value="2">Box bên phải web</option>
                          <option value="3">Dưới cùng web</option>
                          <option value="4">Trong trang đọc sách</option>
                        </select>
                        <span class="desc">
                          Nơi hiển thị quảng cáo này?
                        </span>
                    </div>
                   
                </div><br />
            </div>
         
        </div><br />
   
      <div class="row">
        <div class="col-md-12 text-right" id="valiapp">
          <input type="submit" class="btn btn-success" disabled="disabled" value="Lưu Lại" />
          <input type="reset" class="btn btn-default" value="Nhập Lại" />
        </div>
      </div><br />
      <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    </form>
@include('backend.upload')
<a class="nicupload showupload" href="#nicupload">Upload</a>


<div id="pagelist" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Trang</h4>
      </div>
      <div class="modal-body">
        <iframe src="" width="100%" height="500px" style="border:0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="choose">Chọn</button>
          <button type="button" class="btn btn-success" id="refresh">Tải lại</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript" src="{{Asset('')}}public/js/dialog.js"></script>
<script type="text/javascript">
  var base_url_admin="{{url('admin')}}/";
    var asset_path="{{Asset('public')}}/";
    var __token="{{csrf_token()}}";
    var btnUpload=null;
     function callBackUpload(idobjclick,path){
            if(idobjclick=="#nicupload"){
                $("textarea"+btnUpload).parent().find(".nicEdit-main").append("<div class='postimg'><img src='"+asset_path+"images/"+path+"' /></div>");
                return false;
            }
            $(idobjclick).val(path);
            $(".boxupload img").attr("src",asset_path+"images/"+path);
    
            $("#frm input[name='image']").removeClass("error").next(".errortext").hide();
        }
    $(function(){
    
    $("#frm").kiemtra([
            {
                'name':'image',
                'trong':true
            },{
              'name':'position',
              'select':true
            }
      ]);

        $("#valiapp").show().find("input[type='submit']").removeAttr("disabled");
  });
</script>

<script type="text/javascript" src="{{Asset('')}}public/js/jsupload.js"></script>


<script type="text/javascript">
  
  var currentPage = "#menu_ad";
  

   $(document).ready(function(){

    $("#pagelist").on('shown.bs.modal',function(){
      if($(this).find("iframe:eq(0)").attr("src")==""){
        $(this).find("iframe:eq(0)").attr("src",base_url_admin+"page/iframe");

        $("#choose").click(function(){
          var contentmodal=$("#pagelist iframe:eq(0)").contents();
          var tb=contentmodal.find("#ttable table:eq(0) tbody:eq(0) tr.checkboxcheck:eq(0)");
          if(!tb.length){
            getAlert('Vui lòng chọn 1 trang');
            return false;
          }


          $("#url").val(tb.find(".ascheckbox:eq(0)").attr('data-value'));

          $("#pagelist").modal('hide');
        });

        $("#refresh").click(function(){
$("#pagelist").find("iframe:eq(0)").attr("src",base_url_admin+"page/iframe");
        });

      }
    });

    $("#showviewpage").click(function(){


$("#pagelist").modal('show');


    });


  });

  </script>

@endsection