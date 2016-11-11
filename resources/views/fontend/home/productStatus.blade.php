<style type="text/css">
  .slick-dots
  {
    display: none !important;
  }
</style>
<div class="box_pages_left">
      <div class="box_left_title"  id="list_1">
        <label>Sản phẩm bán chạy</label>
      </div>
      <div class="box_left_menu">
        <div class="slider-aside-group" data-dots-container="#list_1">
        @for($i=0;$i< count($productSelling);$i+=2)
             <div class="item_good">
                <ul>
                    <li>
                    <figure><a href="{{Asset('')}}product/{{$productSelling[$i]->id.'-'.$productSelling[$i]->url}}" title="{{$productSelling[$i]->name}}"><img src="{{$convert->showImage($productSelling[$i]->image)}}" alt="{{$productSelling[$i]->name}}" /></a></figure>
                    <h2><a style="color:#337ab7;font-weight:bold;font-size:15px" href="{{Asset('')}}product/{{$productSelling[$i]->id.'-'.$productSelling[$i]->url}}" title="{{$productSelling[$i]->name}}">{{$productSelling[$i]->name}}</a></h2>
                    </li>
                    @if(isset($productSelling[$i+1]))
                    <li>

                    <figure><a href="{{Asset('')}}product/{{$productSelling[$i+1]->id.'-'.$productSelling[$i+1]->url}}" title="{{$productSelling[$i+1]->name}}"><img src="{{$convert->showImage($productSelling[$i+1]->image)}}" alt="{{$productSelling[$i+1]->name}}" /></a></figure>
                    <h2><a style="color:#337ab7;font-weight:bold;font-size:15px" href="{{Asset('')}}product/{{$productSelling[$i+1]->id.'-'.$productSelling[$i+1]->url}}" title="{{$productSelling[$i+1]->name}}">{{$productSelling[$i+1]->name}}</a></h2>
                    </li>
                    @endif
            </ul>
          </div>
      @endfor 
        </div>
        <div class="item_deals">
          <figure><a href="{{Asset('')}}deal.html"><img src="{{Asset('')}}public/kingtech/images/deal.png" alt="Deal Dangcapdigital" /></a></figure>
        </div>
      </div>
    </div>