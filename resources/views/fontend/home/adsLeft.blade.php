<div class="box_left">
    @include("fontend.home.productStatus")   
    <div class="box_pages_left fl_top10">
      <div class="box_left_title">
        <label>Quảng cáo</label>
      </div>
      <div class="box_left_menu">
        <div class="box_quangcao">
        @for($i=0;$i< count($ads);$i++)
        @if($ads[$i]->position==3)
          <figure>
            <a href="{{$ads[$i]->url}}" target="_blank"><img src="{{$convert->showImage($ads[$i]->image)}}" alt="{{$ads[$i]->title}}" /></a>
          </figure>
        @endif
        @endfor   
        </div>
      </div>
    </div>
      </div>