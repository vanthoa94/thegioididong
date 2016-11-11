
@extends('fontend.layout')
@section('title')
<title>kingtech | tìm kiếm sản phẩm</title>
@endsection
@section('meta')
<meta name='description' content='KINGTECH chuyên phân phối android tv box | loa bluetooth| camera the thao | but trinh chieu| ong nhom | camera hanh trinh | tai nghe bluetooth giá tốt nhất ' >
  <meta name='keywords' content='kingtech | android tv box | loa bluetooth| camera the thao | but trinh chieu| ong nhom | camera hanh trinh | tai nghe bluetooth | Pin du phong | bo phat wifi' >
  
  <meta property="og:type" content="website" />
  <meta property="og:url" content="/" />
  <meta property="og:title" content="KINGTECH chuyên phân phối android tv box, loa bluetooth, camera the thao" />
  <meta property="og:description" content="KINGTECH chuyên phân phối android tv box | loa bluetooth| camera the thao | but trinh chieu| ong nhom | camera hanh trinh | tai nghe bluetooth giá tốt nhất " />
  <meta property="og:site_name" content="kingtech" />
  <meta property="og:image" content="{{Asset('')}}public/kingtech/{{Asset('')}}public/kingtech/images/logo_jpg.jpg" />
  <meta property="fb:app_id" content="1700293566862288" />
  <meta name='robots' content='INDEX,FOLLOW' />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>  
  <meta name='Search Engines' content='www.google.com, www.google.com.vn, www.yahoo.com' />
@endsection
<head>
  <style>
  ._social
  {
    margin-top:-1px !important;
  }
    .overi_hotline
    {
      margin-top: 13px;
    }
    .search_line
    {
      margin-top:-10px;
    }
  </style>
</head>
@section('center')
<div class="body_pages">
<script language="javascript" src="{{Asset('')}}public/kingtech/bootstrap/js/bootstrap.min.js" /></script>
<link rel="stylesheet" href="{{Asset('')}}public/kingtech/colorbox/colorbox.css" />
<script src="{{Asset('')}}public/kingtech/colorbox/jquery.colorbox.js"></script>
<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({rel:'group1',width:"80%"});
    });
</script>
<script language="javascript">
  $(document).ready(function(){
    $('a.datmua').click(function()
    {
      var id=$(this).attr('data-id');
      $.ajax({
        type:"post",
        url:"/ajax/giohang.php",
        data:{
          id:id
        },
        success:function(result)
        {
                    window.location='/gio-hang.html';
        }
      });
      return false;
    });
    
  });
</script>

       @include("fontend.home.search")
      <div class="box_pages fl_padding2">
        @include("fontend.home.adsLeft")
        <div class="box_pages_center">
            <div class="box_sales">
              <div class="box_title">
                <aside>
                  <label>{{$products[0]->name}}</label>
                  <span></span> </aside>
              </div>
              <div class="box_prodetails">
                <aside>
                  <div class="aside_left">
                    <div class="aside_img">
                      <figure>
                          <img src="{{Asset('')}}public/kingtech/images/p/{{$products[0]->image}}" alt="{{$products[0]->name}}" /> 
                       <a class="group1"  href="{{Asset('')}}public/kingtech/images/p/{{$products[0]->image}}" title="{{$products[0]->name}}" >
                          <code> <i class="fa fa-search-plus"></i> Xem ảnh</code>
                      </a>
                      <big>
                      <?php $images =  explode(",",trim($products[0]->images));?>
                      @if(count($images)>0)
                      @foreach($images as $img)
                        @if($img!="")
                        <a class="group1"  href="{{Asset('')}}public/kingtech/upload/hinhanh/{{$img}}" title="{{$products[0]->name}}" >
                          <img src="{{Asset('')}}public/kingtech/upload/hinhanh/{{$img}}" alt="{{$products[0]->name}}" /></a>
                        @endif
                      @endforeach
                      @endif                     
                      </big>
                      </figure>
                      <span class="luotxem">Lượt xem: {{$products[0]->viewer}}</span>
                     <!--  <span class="buy">
                          <a id="datmua" class="datmua" data-id="351" title="Ống nhòm đo khoảng cách, đo tốc độ gió LR-600S">
                              <img src="{{Asset('')}}public/kingtech/images/muahang.gif " alt="Mua hàng" />
                          </a>
                      </span>  -->
                      </div>
                    <div class="aside_details">
                      <h2>{{$products[0]->name}}</h2>
                      <aside class="code"><strong>Mã sản phẩm :</strong> {{$products[0]->pro_code}}</aside>
                                            <aside class="giadigital">Giá : <strong>{{number_format($products[0]->price)}} vnđ</strong></aside> 
                      <aside class="details"></aside>
                      <aside class="code">
                        @if($products[0]->status==0)
                        <strong>Tình trạng :Còn hàng</strong>
                        @elseif($products[0]->status==1)
                        <strong>Tình trạng :Hết hàng</strong>
                        @elseif($products[0]->status==2)
                        <strong>Tình trạng :Hàng mới</strong>
                        @endif
                      </aside>
                      <aside class="charge"> 
                          <span>Miễn phí charge qua thẻ </span>
                          <img src="{{Asset('')}}public/kingtech/images/icon_visa.gif" alt="Miễn phí charge qua thẻ" /> 
                      </aside> 
                      <aside class="chiase"> Chia sẽ
                      <aside class="social"> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> </aside>
                      </aside> 
                    </div>
                  </div>
                </aside>
                
        <div class="slider_croll fl_top30">
          <div class="box_title">
            <aside>
              <label>Có thể bạn quan tâm</label>
            </aside>
          </div>
            <div class="slider-info-items"> <span class="span_left"> <a href="" id="slider-nav-back" onClick="return false" > <img src="{{Asset('')}}public/kingtech/images/pre.png"></a> </span>
            @if($productsRefer!=null)
            @for($i=0;$i< count($productsRefer);$i++)
              <div class="item_pro">
                <figure><a href="{{Asset('')}}product/{{$productsRefer[$i]->id.'-'.$productsRefer[$i]->url}}" title="{{$productsRefer[$i]->name}}"><img src="{{Asset('')}}public/kingtech/images/p/{{$productsRefer[$i]->image}}" alt="{{$productsRefer[$i]->name}}" /></a></figure>
                <h2><a href="{{Asset('')}}product/{{$productsRefer[$i]->id.'-'.$productsRefer[$i]->url}}" title="{{$productsRefer[$i]->name}}">{{$productsRefer[$i]->name}}</a></h2>
                <span><code>0 đ</code></span> 
              </div>  
            @endfor
            @endif
            <span class="span_right"><a href="" id="slider-nav-next" onClick="return false" > <img src="{{Asset('')}}public/kingtech/images/next.png"></a> </span> </div >

        </div>                
                <div role="tabpanel" class="box_tabs"> 
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> <a href="#tongquan" aria-controls="tab" role="tab" data-toggle="tab">Tổng quan</a> </li>
                    <li role="presentation" > <a href="#thongso" aria-controls="tab" role="tab" data-toggle="tab">Thông số kỹ thuật</a> </li>
                    <li role="presentation"> <a href="#details" aria-controls="details" role="tab" data-toggle="tab">Khui hộp</a> </li>
                    <li role="presentation"> <a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Khuyến mãi</a> </li>
                  </ul>
                  
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tongquan">
                      <big>{{$products[0]->overview}}</big>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="thongso">
                      <big>{{$products[0]->specs}}</big>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="details">
                      <big>{{$products[0]->accessories}}</big>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="sales">
                      <big>{{$products[0]->promotion}}</big>
                    </div>
                  </div>
                </div>
                <div class="box_comment">
                    <!--facebook comment-->
                </div>
              </div>
            </div>
          </div>
          @include("fontend.home.centerSupport")
      </div>
      </div>
@endsection