@extends('fontend.layout_qc')
@section("title")
  @if(count($apps)>0)
@foreach($cateApps as $cateapp)
          @if($cateapp->id == $apps[0]->cate_id)
            <title>{{$cateapp->name}}</title>
          @endif
      @endforeach
      @else
          <title>Không tim thấy - kingtech.com.vn</title>
  @endif
@endsection
@section('box_center')
<div class="box_sales">
	@if(count($apps)>0)
      <div class="box_title">
        <aside>
       	@foreach($cateApps as $cateapp)
       		@if($cateapp->id == $apps[0]->cate_id)
	          <label>{{$cateapp->name}}</label>
	          <span></span> </aside><?php break;?>
	        @endif
	    @endforeach
      </div>
      <div class="box_ungdung fl_top30">
        <ul>
        	@foreach($apps as $app)
                <li>
	            <figure><a href="{{Asset('')}}app/detail/{{$app->id.'-'.$app->url}}" title="{{$app->name}}"><img src="{{$convert->showImage($app->image)}}" alt="{{$app->name}}"></a></figure>
	            <h2><a href="{{Asset('')}}app/detail/{{$app->id.'-'.$app->url}}" title="{{$app->name}}">{{$app->name}}</a></h2>
	            <span>{{$app->developers}}</span>
	            <label><a href="{{$app->app_url}}" target="_parent" title="{{$app->name}}" class="label-info">Tải về</a></label>
	          </li>
	        @endforeach
         </ul>
       </div>
       <?php echo $apps->appends(['sort' => 'votes'])->render(); ?>
       @elseif(count($apps)<=0)
       		Không tìm thấy ứng dụng
     @endif
    </div>

@endsection