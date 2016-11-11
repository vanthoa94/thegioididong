
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
  <meta property="og:image" content="images/logo_jpg.jpg" />
  <meta property="fb:app_id" content="1700293566862288" />
  <meta name='robots' content='INDEX,FOLLOW' />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>  
  <meta name='Search Engines' content='www.google.com, www.google.com.vn, www.yahoo.com' />
@endsection
@section('center')
<head>
  <style>
  .pagination
  {
    margin:auto;
    width:100% !important;
    margin-left: 30% !important;
  }
    .pagination li
    {
      float:left;
      list-style: none;
      width:36px;
      height: 30px;
      padding:12px;
    }
    .overi_hotline
    {
      margin-top: 13px;
    }
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
<div class="body_pages">
           
    @include("fontend.home.search")
    <div class="box_pages fl_padding2">
      @include("fontend.home.adsLeft")
            <div class="box_pages_center" id="1">
        <div class="box_sales">
        <div class="box_pro_title">
      <aside>
        <label>Kết quả tìm kiếm : {{count($products)}} sản phẩm </label>
        <span></span>
      </aside>
    </div>
          <div class="box_pro"> 
            <div class="th_pro">
              <ul>
                @for($i=0;$i< count($products);$i++)
                  <li>
                    <figure><a href="{{Asset('')}}product/{{$products[$i]->id.'-'.$products[$i]->url}}" title="{{$products[$i]->name}}"><img src="public/kingtech/images/p/{{$products[$i]->image}}" alt="{{$products[$i]->name}}" /></a></figure>
                    <h2><a href="{{Asset('')}}product/{{$products[$i]->id.'-'.$products[$i]->url}}" title="{{$products[$i]->name}}">{{$products[$i]->name}}</a></h2>
                    <aside>
                        <span><b>{{number_format($products[$i]->price)}} đ</b></span> 
                        <!--<code>Giá công ty: 12,500,000 đ</code> -->
                    </aside>
                  </li>
                  @endfor 
              </ul>
                      
            </div>
              <?php echo $products->appends(['sort' => 'votes'])->render(); ?>
          </div>
            </div>
      </div>
      @include("fontend.home.centerSupport")
  </div>

</div>
@endsection