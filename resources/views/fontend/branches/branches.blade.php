@extends('fontend.layout')
@section("title")
<title>Danh sách đại lý - kingtech.com.vn</title>
@endsection
@section("center")
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
      margin-top: 0px;
    }
    .search_line
    {
      margin-top:-10px;
    }
  </style>
<div class="body_pages">
       @include("fontend.home.search")
      <div class="box_pages fl_padding2">
        <div class="daily_left hidden_mobile">
                  <div class="box_pages_left">
              <div class="box_quangcao">
                <figure><img src="http://dangcapdigital.com/images/map.gif" alt=""></figure>
              </div>	
          </div>
        </div>
        <div class="daily_pages_center">
          <div class="box_sales">
            <div class="daily_pages">
                        	<aside>
                	<label>Miền Bắc</label>
                </aside>
                <ul>
                <?php $i=1;?>
                @foreach($branches as $branch)
                @if($branch->zone==1)
                    <li>
	                    <label>{{$i}}.</label>
	                    <span>
	                    <a href="{{Asset('')}}dai-ly-phan-phoi/{{$branch->id.'-'.($convert->convertString($branch->city_name))}}.html" title="{{$branch->name}}">{{$branch->city_name}} </a></span>
	                </li>
	                <?php $i++;?>
				 @endif
                 @endforeach
				</ul>
                         	<aside>
                	<label>Miền Trung</label>
                </aside>
                <ul>
                    <?php $i=1;?>
                @foreach($branches as $branch)
                @if($branch->zone==2)
                    <li>
	                    <label>{{$i}}.</label>
	                    <span>
	                    <a href="{{Asset('')}}dai-ly-phan-phoi/{{$branch->id.'-'.($convert->convertString($branch->city_name))}}.html" title="Đại lý phân phối tại {{$branch->name}}">{{$branch->city_name}}</a></span>
	                </li>
	                <?php $i++;?>
				 @endif
                 @endforeach
				                	
				                </ul>
                         	<aside>
                	<label>Miền Nam</label>
                </aside>
                <ul>
                   <?php $i=1;?>
                @foreach($branches as $branch)
                @if($branch->zone==3)
                    <li>
	                    <label>{{$i}}.</label>
	                    <span>
	                    <a href="{{Asset('')}}dai-ly-phan-phoi/{{$convert->convertString($branch->name)}}.html" title="Đại lý phân phối tại {{$branch->name}}">{{$branch->name}}</a></span>
	                </li>
	                <?php $i++;?>
				 @endif
                 @endforeach
				                	
				</ul>
                
            </div>
            
          </div>
        </div>
      @include("fontend.home.centerSupport")
      </div>
      </div>
@endsection
