<section>
    <div class="box_position">
      <div class="box_thoigian">
        @for($i=0;$i< count($ads);$i++)
        @if($ads[$i]->position == 2)
        <div class="thoigian">
          <div class="box_add">
              <figure>
                  <a href="{{$ads[$i]->url}}" target="_blank"><img src="{{$convert->showImage($ads[$i]->image)}}" alt="{{$ads[$i]->title}}"></a>
              </figure>
          </div>
        </div>
        @endif
        @endfor
      </div>
      <div class="box_add_left">
        @for($i=0;$i< count($ads);$i++)
        @if($ads[$i]->position == 1)
        <div class="add_left">
          <div class="box_add">
              <figure>
                  <a href="{{$ads[$i]->url}}" target="_blank"><img src="{{$convert->showImage($ads[$i]->image)}}" alt="{{$ads[$i]->title}}"></a>
              </figure>
          </div>
        </div>
         @endif
        @endfor
      </div>
    </div>
  </section>