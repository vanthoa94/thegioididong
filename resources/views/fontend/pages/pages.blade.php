@extends('fontend.layout_qc')
@section("title")
@if(count($page)>0)
<title>{{$page[0]->title}}</title>
@else
          <title>Không tim thấy - kingtech.com.vn</title>
@endif
@endsection
@section("box_center")
<style>
    .title
    {
            background: red;
    color: white;
    font-weight: bold;
    text-align: center;
    border-radius: 6px;
    text-transform: uppercase;
    padding: 8px;
    }
</style>
<div class="box_sales">
            @if(count($page)>0)
            <h1 class="title">{!!$page[0]->title!!}</h1>
                {!!$page[0]->content!!}
            @endif
          </div> 
@endsection