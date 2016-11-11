<!-- begin tin tức hiển thị trang chủ -->
    @for($i=0;$i< count($news);$i++)
      @for($j=0;$j < count($NewsCate);$j++)
        @if($news[$i]->cate_id==$NewsCate[$j]->id)
        <div class="item">
          
          <figure>
            <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$news[$i]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}"><img src="{{$convert->showImage($news[$i]->image)}}" alt="{{$news[$i]->title}}">
            </a>
          </figure>
          <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$news[$i]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}"></a>
          <h2>
            <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$news[$i]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}"></a><a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$news[$i]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}">{{$news[$i]->title}}<span>({{$news[$i]->updated_at}})</span> </a>
          </h2>
          <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$news[$i]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}">
          <label>Đọc tiếp</label>
          </a> 
        </div>
        @endif
      @endfor
    @endfor
  <!-- end tin tức hiển thị trang chủ -->