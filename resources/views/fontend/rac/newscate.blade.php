
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
              		
                    <label style="left:{{$Pleft}}" class=""><a href="{{Asset('')}}tin-tuc/{{$NewsCate[$i]->id.'-'.$NewsCate[$i]->url}}" title="$NewsCate[$i]->name}}">{{$NewsCate[$i]->name}}</a></label>
                    <?php $Pleft += 147; ?>
                @endfor                         
                
              </aside>
            </div>
            <div class="box_news">
            <ul>
            @for($i=0;$i< count($news);$i++)
            	@for($j=0;$j< count($NewsCate);$j++)
                     @if($news[$i]->cate_id==$NewsCate[$j]->id)
	                <li>
	                	<figure> <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->id.'-'.$NewsCate[$j]->url}}/{{$news[$i]->url}}" title="{{$news[$i]->title}}"> <img src="{{Asset('')}}public/kingtech/images/n/{{$news[$i]->image}}" alt="{{$news[$i]->title}}" /> </a> </figure>
	                	<h2> <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$NewsCate[$j]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}">{{$news[$i]->title}}</a> </h2>
	                	<big>{{$news[$i]->description}}</big> 
	               	</li>
               		@endif
                @endfor
             @endfor       
            </ul>
            
          </div>
          <?php echo $news->appends(['sort' => 'votes'])->render(); ?>
        </div>
          @include("fontend.home.centerSupport")
      </div>
      </div>
@endsection