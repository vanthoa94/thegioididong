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
  <meta property="og:image" content="{{Asset('')}}public/kingtech/images/logo_jpg.jpg" />
  <meta property="fb:app_id" content="1700293566862288" />
  <meta name='robots' content='INDEX,FOLLOW' />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>  
  <meta name='Search Engines' content='www.google.com, www.google.com.vn, www.yahoo.com' />
@endsection
<head>
  <style>
  .pagination
  {
    margin:auto;
    width:24%;
  }
    .pagination li
    {
      float:left;
      list-style: none;
      width:5px;
      height: 5px;
      padding:12px;
      border:1px solid gray;
      box-shadow: 5px 5px 16px -5px;
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
@section('center')
<div class="body_pages">
        
      @include("fontend.home.search")
      <div class="box_pages fl_padding2">
      @include("fontend.home.adsLeft")    
        <div class="box_pages_center">
          <div class="box_sales">
            <div class="box_news_title">
              <aside>
              <?php $Pleft = 0; ?>
                  @for($i=0;$i< count($NewsCate);$i++)
                    <label style="left:{{$Pleft}}" class=""><a href="{{Asset('')}}tin-tuc/{{$NewsCate[$i]->url}}" title="$NewsCate[$i]->name}}">{{$NewsCate[$i]->name}}</a></label>
                    <?php $Pleft += 147; ?>
                  @endfor   
                
              </aside>
            </div>
            @if(count($detailnews)>0)
            <div class="box_about">
            	<h2>{{$detailnews[0]->title}}</h2>
            <big>
              <div style="mso-element:para-border-div;border:none;    border-bottom:double windowtext 2.25pt;
                padding:0in 0in 1.0pt 0in">
                {{$detailnews[0]->title}}
              </div>
            @endif
            </big>
                <aside>
                	<label>Các tin khác</label>
                  @for($i=0;$i< count($newsRefer);$i++)
                    @for($j=0;$j< count($NewsCate);$j++)
                      @if($newsRefer[$i]->cate_id==$NewsCate[$j]->id)
    					        <li>
                        <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$newsRefer[$i]->url}}" title="{{$newsRefer[$i]->title}}}">+ {{$newsRefer[$i]->title}}</a>
                      </li>
                      @endif
                    @endfor
                  @endfor            
                 </aside>
            </div>
          </div>
        </div>
    @include("fontend.home.centerSupport")
      </div>
      </div>
@endsection