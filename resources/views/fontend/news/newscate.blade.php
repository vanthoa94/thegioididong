
@extends('fontend.layout_qc')
@section("title")
<title>Tin tức - kingtech.com.vn</title>
@endsection
@section('box_center')
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
	                	<figure> <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->id.'-'.$NewsCate[$j]->url}}/{{$news[$i]->url}}" title="{{$news[$i]->title}}"> <img src="{{$convert->showImage($news[$i]->image)}}" alt="{{$news[$i]->title}}" /> </a> </figure>
	                	<h2> <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$news[$i]->id.'-'.$news[$i]->url}}" title="{{$news[$i]->title}}">{{$news[$i]->title}}</a> </h2>
	                	<big>{{$news[$i]->description}}</big> 
	               	</li>
               		@endif
                @endfor
             @endfor       
            </ul>
            
          </div>
          <?php echo $news->appends(['sort' => 'votes'])->render(); ?>
        </div>
          
@endsection