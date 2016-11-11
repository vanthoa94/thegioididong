@extends('fontend.layout_qc')
@section("title")
@if(count($detailnews)>0)
<title>{{$detailnews[0]->title}}</title>
@else
          <title>Không tim thấy - kingtech.com.vn</title>
@endif
@endsection
@section("description")
@if(count($detailnews)>0)
<meta name='description' content='
{{$detailnews[0]->description}}'>
  @endsection
@section("keywords")

<meta name='keywords' content='
{{$detailnews[0]->keywords}}
  ' >
@endif
@endsection
@section('box_center')

          <div class="box_sales">
            <div class="box_news_title">
              <aside>
              <?php $Pleft = 0; ?>
                  @for($i=0;$i< count($NewsCate);$i++)
                    <label style="left:{{$Pleft}}" class=""><a href="{{Asset('')}}tin-tuc/{{$NewsCate[$i]->url}}" title="$NewsCate[$i]->name}}">{{$NewsCate[$i]->name}}</a></label>
                    <?php $Pleft += 147; ?>
                  @endfor   
                
              </aside>
            </div>
            @if(count($detailnews)>0)
            <div class="box_about"><br />
            	<h2>{{$detailnews[0]->title}}</h2>
            <big>
              <div style="mso-element:para-border-div;border:none;    border-bottom:double windowtext 2.25pt;
                padding:0in 0in 1.0pt 0in">
                {!!$detailnews[0]->content!!}
              </div>
            @endif
            </big>
                <aside>
                	<label>Các tin khác</label>
                  @if($newsRefer!=null)
                  @for($i=0;$i< count($newsRefer);$i++)
                    @for($j=0;$j< count($NewsCate);$j++)
                      @if($newsRefer[$i]->cate_id==$NewsCate[$j]->id)
    					        <li>
                        <a href="{{Asset('')}}tin-tuc/{{$NewsCate[$j]->url}}/{{$newsRefer[$i]->id.'-'.$newsRefer[$i]->url}}" title="{{$newsRefer[$i]->title}}}">+ {{$newsRefer[$i]->title}}</a>
                      </li>
                      @endif
                    @endfor
                  @endfor            
                  @endif
                 </aside>
            </div>
          </div>
        </div>
    
@endsection