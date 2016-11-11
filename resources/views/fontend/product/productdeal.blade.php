@extends('fontend.layout_qc')
@section("title")
          <title>sản phẩm giá rẻ - kingtech.com.vn</title>
@endsection
@section('box_center')

    <div class="box_pro">
      <div class="box_title">
        <aside>
          <label><a href="/c/298-camera-ip-hd" title="Sản phẩm giá rẻ">Sản phẩm giá rẻ</a></label>
          <span></span> </aside>
      </div>
      <div class="box_item">
      @for($i=0;$i< count($productdeal);$i++)
        <div class="item_pro">
          <figure><a href="{{Asset('')}}product/{{$productdeal[$i]->id.'-'.$productdeal[$i]->url}}" title="{{$productdeal[$i]->name}}"><img src="{{$convert->showImage($productdeal[$i]->image)}}" alt="{{$productdeal[$i]->name}}"></a></figure>
          <h2><a style="color:#337ab7;font-weight:bold;font-size:15px" href="{{Asset('')}}product/{{$productdeal[$i]->id.'-'.$productdeal[$i]->url}}" title="{{$productdeal[$i]->name}}">{{$productdeal[$i]->name}}</a></h2>
          <span>
            @if(Session::has("isuser"))
              <code>{{number_format($productdeal[$i]->price_company)}} đ</code>
              <code style="opacity: 0.5;color: black;text-decoration: line-through;">{{number_format($productdeal[$i]->price)}} đ</code>
            @elseif(!Session::has("isuser"))
              <code>{{number_format($productdeal[$i]->price)}} đ</code>
            @endif
          </span> 
         </div>
        @endfor

        </div>
<?php echo $productdeal->appends(['sort' => 'votes'])->render(); ?>
    </div>  

  </div>


     
@endsection