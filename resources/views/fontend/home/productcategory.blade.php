@for($i=0;$i< count($categoryMenuIndex);$i++)
    <?php $ProductCateID = $productCateIDIndex->getProdctCateID($categoryMenuIndex[$i]->id); ?>
    @if(count($ProductCateID)>0)    
    <div class="box_pro">
      <div class="box_title">
        <aside>
          <label><a href="{{Asset('')}}category/{{$categoryMenuIndex[$i]->id.'-'.$categoryMenuIndex[$i]->url}}" title="{{$categoryMenuIndex[$i]->name}}">{{$categoryMenuIndex[$i]->name}}</a></label>
          <span></span> </aside>
      </div>
      <div class="box_item">

      @for($j=0;$j< count($ProductCateID);$j++)
        <div class="item_pro">
          <figure><a href="{{Asset('')}}product/{{$ProductCateID[$j]->id.'-'.$ProductCateID[$j]->url}}" title="{{$ProductCateID[$j]->name}}"><img src="{{$convert->showImage($ProductCateID[$j]->image)}}" alt="{{$ProductCateID[$j]->name}}"></a></figure>
          <h2><a style="color:#337ab7;font-weight:bold;font-size:15px" href="{{Asset('')}}product/{{$ProductCateID[$j]->id.'-'.$ProductCateID[$j]->url}}" title="{{$ProductCateID[$j]->name}}">{{$ProductCateID[$j]->name}}</a></h2>
          <span>
            @if(Session::has("isuser"))
              <code>{{number_format($ProductCateID[$j]->price_company)}} đ</code>
              <code style="opacity: 0.5;color: black;text-decoration: line-through;">{{number_format($ProductCateID[$j]->price)}} đ</code>
            @elseif(!Session::has("isuser"))
              <code>{{number_format($ProductCateID[$j]->price)}} đ</code>
            @endif
          </span> 
        </div>
      
      @endfor
      </div>
    </div>
      @if(count($ads)>=4) <!-- quang cao-->
        @if(isset($ads[$i+4]))
        <div class="box_center_add">
                <a href="{{$ads[$i+4]->url}}" target="_blank"><img src="{{$convert->showImage($ads[$i+4]->image)}}" alt="{{$ads[$i+4]->title}}"></a>
        </div>
        @endif
      @endif
    @endif
    @endfor