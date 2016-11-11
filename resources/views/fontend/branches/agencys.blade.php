@extends('fontend.layout')
@section("title")
@if(count($branche)>0)
<title>Danh sách đại lý tại {{$branche[0]->city_name}}- kingtech.com.vn</title>
@else
          <title>Không tim thấy - kingtech.com.vn</title>
@endif
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
       @if($branche!=null)
      <div class="box_pages fl_padding2">
          <div class="box_sales">
            <div class="box_title">
              <aside>
              @if(count($branche)>0)
                <label>Hệ thống đại lý kingtech tại {{$branche[0]->city_name}}</label>
              @endif
                <span></span> </aside>
            </div>
            <div class="div_daily">
              <ul>
              @foreach($agencys as $agency)
                  <li>
                      <figure><a href="void::javascript()" title="{{$agency->name}}"><img src="{{$convert->showImage($agency->image)}}" alt="Đại lý Đẳng Cấp Digital tại Hà Nội"></a></figure>
                        <label><a href="void::javascript()" title="{{$agency->name}}">{{$agency->name}}</a></label>
                        <address><i class="fa fa-map-marker"></i> {{$agency->address}}</address>
                        <code><i class="fa fa-mobile"></i> {{$agency->phone}}</code>
                  </li>
              @endforeach
                </ul>
            </div>
        </div>
      @endif
      </div>
      @include("fontend.home.centerSupport")
</div>
@endsection
