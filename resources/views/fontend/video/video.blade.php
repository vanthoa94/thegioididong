@extends('fontend.layout_qc')
@section("title")
<title>video - kingtech.com.vn</title>
@endsection
@section("box_center")
<div class="box_sales">
        <div class="box_title">
              <aside>
                <label>Video</label>
                <span></span> </aside>
        </div>
        <div class="box_video">
            <ul>
            @foreach($videos as $video)
                <li>
                    <figure><a href="{{Asset('')}}video/{{$video->id.'-'.$video->url}}" title="{{$video->name}}">
                    <img src="{{$convert->showImage($video->image)}}" alt="{{$video->name}}"></a></figure>
                    <h2><a href="{{Asset('')}}video/{{$video->id.'-'.$video->url}}" title="{{$video->name}}" title="{{$video->name}}">{{$video->name}}</a></h2>
                </li>
            @endforeach
            </ul>
        </div>
        <?php echo $videos->appends(['sort' => 'votes'])->render(); ?>
 </div>
@endsection