@extends('fontend.layout_qc')
@section("title")
@if(count($video)>0)
<title>{{$video[0]->name}}</title>
@else
          <title>Không tim thấy - kingtech.com.vn</title>
@endif
@endsection
@section("box_center")
<div class="box_sales">
    @if(count($video)>0)
            <div class="box_title">
              <aside>
                <label>{{$video[0]->name}}</label>
                <span></span> </aside>
            </div>
            <div class="video_details">
                <aside>
                    <iframe width="560" height="315" src="{{$video[0]->video_url}}" frameborder="0" allowfullscreen=""></iframe>                </aside>
            </div>
            <div class="box_title">
              <aside>
                <label>Các video khác</label>
                <span></span> </aside>
            </div>
            <div class="box_video">
            <ul>
            @if($videosRefer!=null)
            @foreach($videosRefer as $video)
                <li>
                    <figure><a href="{{Asset('')}}video/{{$video->id.'-'.$video->url}}" title="{{$video->name}}">
                    <img src="{{$convert->showImage($video->image)}}" alt="{{$video->name}}"></a></figure>
                    <h2><a href="{{Asset('')}}video/{{$video->id.'-'.$video->url}}" title="{{$video->name}}">{{$video->name}}</a></h2>
                </li>
            @endforeach
            @endif              
            </ul>
            </div>
    @endif
</div>
@endsection