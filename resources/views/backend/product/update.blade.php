@extends('backend.layout')
@section('title','Sửa sản phẩm - ACP')

@section('breadcrumb')
<h2><a href="{{url('admin/product')}}">Sản phẩm</a></h2>
    <span>Cập nhật</span>
@endsection

@section('css')
<style type="text/css">
  .itemimages{
    position: relative;
  }
  .itemimages .fa-times{
    position: absolute;
    top:0px;
    right:10px;
    font-size:20px;
    color:#a00;
    display: none;
  }
  .itemimages:hover .fa-times{
    display: block;
  }
  .itemimages .fa-times:hover{
    cursor: pointer;
    color:red;
  }
  #addnewimages i{
    font-size:120px;
    width:60%;
    border:1px solid #ddd;
    padding:5px;
     border-radius:5px;
     text-align: center;
     color:#999;
  }
  #addnewimages i:hover{
    color:#555;
    border:1px solid #ccc;
    cursor: pointer;
  }
</style>
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

    <form method="post" action="{{url('admin/product/update')}}" id="frm">
      <div class="row">

            <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-4">
                        <label>Mã sản phẩm:</label>
                    </div>
                    <div class="col-sm-8">
                        <input name="pro_code" class="form-control" value="{{$data->pro_code}}" />
                      <span class="desc">VD: BM-800</span>
                    </div>
                    <div class="col-sm-4">
                        <label>Tên sản phẩm:</label>
                    </div>
                    <div class="col-sm-8 required">
                        <span class="red">*</span>
                        <textarea name="name" rows="2" id="namec" class="form-control">{{$data->name}}</textarea>
                    </div>
                    
                </div><br />
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Url:</label>
                    </div>
                    <div class="col-md-8 required">
                        <span class="red">*</span>
                        <textarea name="url" rows="2" id="urlc" class="form-control">{{$data->url}}</textarea>
                        <span class="desc">
                          Không dấu và mỗi từ cách nhau 1 dấu '-'. VD: gioi-thieu
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label>Loại:</label>
                    </div>
                    <div class="col-md-8 required">
                        <span class="red">*</span>
                        <select name="cate_id" id="cate_id" class="form-control">
                  <option value="-1">-- Chọn loại sản phẩm --</option>
                  
                        <?php 
                                function dequy($parentid,$arr,$text = ''){
                                    $temp=array();
                                    foreach ($arr as $key => $value) {
                                        if($value->parent==$parentid){
                                          $temp[]=$value;

                                          unset($arr[$key]);  
                                        }
                                    }

                                    if(count($temp)>0){
                                        foreach($temp as $item){
                                            ?>
                                            <option value="{{$item->id}}">{{$text.$item->name}}</option>
                                            <?php
                                            dequy($item->id,$arr,$text.'----');
                                        }
                                    }
                                }
                            dequy(0,$listCategory);
                            ?>

                </select>
                    </div>
                </div><br />
            </div>
        </div><br />


        <div class="row margin">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Giá lẻ:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <div class="input-group">
                <input type="text" name="price" value="{{number_format($data->price,0,',','.')}}" class="form-control formatprice" />
                <span class="input-group-addon">VNĐ</span>
              </div>
              <span class="desc">
                Giá bán lẻ của sản phẩm. VD: 1.000.000 hoặc 1,000,000
              </span>
              <span class="pricetext"></span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Giá sỉ:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <div class="input-group">
                  <input type="text" name="price_company" value="{{number_format($data->price_company,0,',','.')}}" class="form-control formatprice" />
                  <span class="input-group-addon">VNĐ</span>
                </div>
                <span class="desc">
                  Giá sỉ khi đăng nhập vào sẽ thấy
                </span>
                <span class="pricetext"></span>
              </div>
            </div>
        </div>
      </div><!--.row-->

      <div class="row margin">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Giá nhập:</label>
            </div>
            <div class="col-sm-8">
              <div class="input-group">
                <input type="text" name="price_origin" value="{{$data->price_origin!=0?number_format($data->price_origin,0,',','.'):""}}" class="form-control formatprice" />
                <span class="input-group-addon">VNĐ</span>
              </div>
              <span class="desc">
                Để trống nếu không có
              </span>
              <span class="pricetext"></span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Trạng thái:</label>
              </div>
              <div class="col-sm-8 required">
                <span class="red">*</span>
                <select name="status" id="status" class="form-control">
                  <option value="-1">--Lựa chọn--</option>
                  @foreach(\App\Product::getStatus() as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                  @endforeach
                </select>
                <span class="desc">
                  .
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Hình Ảnh:</label>
                    </div>
                    <div class="col-md-8 required boxupload">
                        <span class="red">*</span>
                        <img src="{{showImage($data->image)}}" class="img-thumbnail showupload uploadimg" href="#imagechooseval" id="imgchoose" width="100px">
                        <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                        <input type="text" class="form-control" value="{{$data->image}}" name="image" id="imagechooseval" />Hoặc upload ảnh khác. Kích thước chuẩn 168x120</div>
                    </div>
                </div><br />
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label>Tính năng nổi bật:</label>
                    </div>
                    <div class="col-md-8">
                       <textarea rows="3" name="description" class="form-control">{{str_replace("<br>","\n",$data->description)}}</textarea>
                        <span class="desc">Giới thiệu các tính năng nổi bật của sản phẩm. Khoảng 200 ký tự</span>
                    </div>
                    <div class="col-md-4">
                        <label>Từ khóa:</label>
                    </div>
                    <div class="col-md-8">
                       <textarea rows="2" name="keywords" class="form-control">{{$data->keywords}}</textarea>
                        <span class="desc">Từ khóa tìm kiếm sản phẩm, dùng cho SEO</span>
                    </div>
                </div><br />
            </div>
        </div><br />

        <div class="row margin">
            <div class="col-md-12">
                <div class="row" id='imagekhac'>
                    <div class="col-md-2">
                        <label>Hình ảnh khác:</label>
                    </div>
                    <div class="col-md-10">
                      <div class="row">
                        <?php 
                        $images=explode(',', $data->images);
                         ?>
                         @foreach($images as $item)
                         @if($item!='')
                         <div class='col-xs-6 col-sm-4 col-md-4 itemimages'>
                            <img src="{{showImage($item)}}" class="img-thumbnail showupload uploadimg" href="#imageschooseval" id="imgchoose" width="100px">
                            <br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>
                            <input type="text" class="form-control " name="images[]" id="imageschooseval" value="{{$item}}" />Hoặc upload ảnh khác.</div>
                            <i class="fa fa-times" title="xóa"></i>
                          
                          </div>
                          @endif
                         @endforeach
                          <div class='col-xs-6 col-sm-4 col-md-4' id="addnewimages">
                            <i class="fa fa-plus" title="Thêm hình"></i>
                          </div>
                          
                      </div>
                      <span class="desc">Các hình ảnh khác của sản phẩm</span>
                    </div>
                </div><br />
            </div>
        </div>

        <div class="row margin">
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-4">
              <label>Số lượng:</label>
            </div>
            <div class="col-sm-8 required">
              <span class="red">*</span>
              <input type="text" name="quantity" value="{{$data->quantity}}" class="form-control" />
              <span class="desc">
                Số lượng sản phẩm hiện có
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
              <div class="col-sm-4">
                <label>Hiện thị trang chủ:</label>
              </div>
              <div class="col-sm-8">
                <input type='checkbox' id="show_home" name="show_home" />
                <span class="desc">
                  Có hiện thị sản phẩm này ngoài trang chủ không?
                </span>
              </div>
            </div>
        </div>
      </div><!--.row-->

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Tổng quan:</label>
                    </div>
                    <div class="col-md-10" id="tNicEdit" data-height="250">
                        <textarea style="width:100%;height:250px" name="overview" id="overview">{!!$data->overview!!}</textarea>
                      <span class="desc">Bài viết đánh giá tổng quan về sản phẩm</span>
                    </div>
                </div><br />
            </div>
        </div><br />

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Thông số kỹ thuật:</label>
                    </div>
                    <div class="col-md-10">
                        <textarea style="width:100%;height:250px" name="specs" id="specs">{!!$data->specs!!}</textarea>
                      <span class="desc">.</span>
                    </div>
                </div><br />
            </div>
        </div><br />

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Khui hộp:</label>
                    </div>
                    <div class="col-md-10">
                        <textarea style="width:100%;height:250px" name="accessories" id="accessories">{!!$data->accessories!!}</textarea>
                      <span class="desc">.</span>
                    </div>
                </div><br />
            </div>
        </div><br />

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>Khuyến mãi:</label>
                    </div>
                    <div class="col-md-10">
                        <textarea style="width:100%;height:250px" name="promotion" id="promotion">{!!$data->promotion!!}</textarea>
                      <span class="desc">.</span>
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
      <input type="hidden" name="id" value="{{$data->id}}"/>
    </form>
@include('backend.upload')
<a class="nicupload showupload" href="#nicupload">Upload</a>

<style type="text/css">
  .nicEdit-panelContain.on{
    position: fixed;
    top: 50px;
    z-index: 9999;
  }
</style>
  @endsection

@section('script')
<script src="{{Asset('public/js/validate.js')}}" ></script>
<script type="text/javascript" src="{{Asset('')}}public/js/dialog.js"></script>
<script type="text/javascript">
  var base_url_admin="{{url('admin')}}/";
    var asset_path="{{Asset('public')}}/";
    var __token="{{csrf_token()}}";
    var btnUpload=null;
    var slImages=0;
    function callBackUpload(idobjclick,path){
        if(idobjclick=="#nicupload"){
            $("textarea"+btnUpload).parent().find(".nicEdit-main").append("<div class='postimg'><img src='"+asset_path+"images/"+path+"' /></div>");
            return false;
        }
        if(idobjclick=="#imagechooseval"){
           $(idobjclick).val(path).parent().parent().find("img").attr("src",asset_path+"images/"+path);
           $("#frm input[name='image']").removeClass("error").next(".errortext").hide();
       }else{

        if(idobjclick.indexOf('#imageschooseval')===0 || idobjclick.indexOf('#imagesschooseval')===0){
            var oo=$(idobjclick).val(path).parent().parent();
            oo.find("img").attr("src",asset_path+"images/"+path);
           
        }else{
           $(idobjclick).val(path);
       }
   }
}
var cate_id="{{$data->cate_id}}";
var status="{{$data->status}}";
var isShowHome="{{$data->show_home}}";
    $(function(){

      $("#cate_id").val(cate_id);
      $("#status").val(status);
      if(isShowHome=='1'){
        $("#show_home").prop('checked',true);
      }
    
    $("#imagekhac").on('click','.fa-times',function(){
      $(this).parent().remove();
    });

    $("#addnewimages").on('click',function(){
      slImages++;
      $(this).before('<div class="col-xs-6 col-sm-4 col-md-4 itemimages">'+
                            '<img src="'+asset_path+'images/uploadimg.png" class="img-thumbnail showupload uploadimg" href="#imageschooseval'+(slImages)+'" id="imgchoose" width="100px">'+
                            '<br><div class="text-left desc">Copy url image từ nơi khác và paste vào textbox bên dưới<br>'+
                            '<input type="text" class="form-control " name="images[]" id="imageschooseval'+slImages+'" />Hoặc upload ảnh khác.</div><i class="fa fa-times" title="xóa"></i></div>');
    });

    $("#frm").kiemtra([
            {
                'name':'name',
                'trong':true
            },
            {
                'name':'cate_id',
                'select':true
            }
            ,
            {
                'name':'price',
                'gia':true
            },
            {
                'name':'price_company',
                'gia':true
            },
            {
                'name':'status',
                'select':true
            },
            {
                'name':'image',
                'trong':true
            }
            ,
            {
                'name':'quantity',
                'so':true
            }
      ]);

        $("#valiapp").show().find("input[type='submit']").removeAttr("disabled");
  });
</script>

<script type="text/javascript" src="{{Asset('')}}public/js/jsupload.js"></script>
<script type="text/javascript" src="<?php echo Asset('public/js/nicEdit.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        new nicEditor({ fullPanel: true }).panelInstance("overview");

        new nicEditor({ fullPanel: true }).panelInstance("specs");

        new nicEditor({ fullPanel: true }).panelInstance("accessories");

        new nicEditor({ fullPanel: true }).panelInstance("promotion");
    });
</script>

<script src="{{Asset('public/js/t_nicEdit.js')}}" ></script>

<script type="text/javascript">
  
  var currentPage = "#menu_product";
  var subPage="list";

  function change_alias(alias)
  {
      var str = alias;
      str= str.toLowerCase(); 
      str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
      str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
      str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
      str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
      str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
      str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
      str= str.replace(/đ/g,"d"); 
      str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
      /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
      str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
      str= str.replace(/^\-+|\-+$/g,""); 
      //cắt bỏ ký tự - ở đầu và cuối chuỗi 
      return str;
  }

  function removeMemony(m){
    return m.replace(/\./gi,"").replace(/\,/gi,"").replace(/ /gi,"").replace(/-/gi,"");
  }

  var DOCSO=function(){
    var t=["không","một","hai","ba","bốn","năm","sáu","bảy","tám","chín"],r=function(r,n){
      var o="",
      a=Math.floor(r/10),
      e=r%10;
      return a>1?(o=" "+t[a]+" mươi",1==e&&(o+=" mốt")):1==a?(o=" mười",1==e&&(o+=" một")):n&&e>0&&(o=" lẻ"),5==e&&a>=1?o+=" lăm":4==e&&a>=1?o+=" tư":(e>1||1==e&&0==a)&&(o+=" "+t[e]),o},n=function(n,o){
        var a="",
        e=Math.floor(n/100),n=n%100;
        return o||e>0?(a=" "+t[e]+" trăm",a+=r(n,!0)):a=r(n,!1),a},
        o=function(t,r){
          var o="",
        a=Math.floor(t/1e6),t=t%1e6;a>0&&(o=n(a,r)+" triệu",r=!0);
        var e=Math.floor(t/1e3),t=t%1e3;return e>0&&(o+=n(e,r)+" ngàn",r=!0),t>0&&(o+=n(t,r)),o};return{doc:function(r){
          if(0==r)return t[0];var n="",a="";do ty=r%1e9,r=Math.floor(r/1e9),n=r>0?o(ty,!0)+a+n:o(ty,!1)+a+n,a=" tỷ";while(r>0);return n.trim()
        }}}();

  $(document).ready(function(){
    var urlc=$("#urlc");
    var isChange=true;
    $("#namec").on('keyup',function(){
      if(isChange){
        urlc.val(change_alias($.trim($(this).val())));
      }else{
        $(this).off('keyup');
      }
    });
    urlc.on('keyup',function(){
      isChange=false;
      $(this).off('keyup');
    });

    $(".formatprice").on('keyup',function(){
      var text=$.trim($(this).val());

      if(text!=""){
        text=parseInt(removeMemony(text));
        $(this).parent().parent().find(".pricetext").html(DOCSO.doc(text));
      }else{
        $(this).parent().parent().find(".pricetext").html("");
      }
    });
  

  });

  </script>

@endsection