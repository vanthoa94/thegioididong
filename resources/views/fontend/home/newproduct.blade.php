<style>
  .slider-info-items .item_pro h2
  {
    margin-top:auto;
  }
  .box_tieudem_title
  {
    height: 39px !important;
  }
  .search_line
  {
    margin-top:-8px;
  }
</style>
@if(count($newproducts)>0)
<div id="slidemobileaa">
<div class="slider_croll">

  <span class="span_right span_right_mobile"><a href="" id="slider-nav-next" onClick="return false" > <img src="public/kingtech/images/next.png"></a> </span>
      <div class="box_title">
        <aside>
          <label>Sản phẩm mới</label>
          <span></span> </aside>
      </div>
      <div class="slider-info-items"> <span class="span_left"> <a href="" id="slider-nav-back" onClick="return false" > <img src="public/kingtech/images/pre.png"></a> </span>

        @for($i=0;$i< count($newproducts);$i++)
          <div class="item_pro">
            <figure><a href="{{Asset('')}}product/{{$newproducts[$i]->id.'-'.$newproducts[$i]->url}}" title="{{$newproducts[$i]->name}}"><img src="{{$convert->showImage($newproducts[$i]->image)}}" alt="{{$newproducts[$i]->name}}" /></a></figure>
            <h2><a style="color:#337ab7;font-weight:bold;font-size:15px" href="{{Asset('')}}product/{{$newproducts[$i]->id.'-'.$newproducts[$i]->url}}" title="{{$newproducts[$i]->name}}">{{$newproducts[$i]->name}}</a></h2>
            <span> 
              @if(Session::has("isuser"))
                <code>{{number_format($newproducts[$i]->price_company)}} đ</code><br>
                <code style="opacity: 0.5;color: black;text-decoration: line-through;">{{number_format($newproducts[$i]->price)}} đ</code>
              @elseif(!Session::has("isuser"))
                <code>{{number_format($newproducts[$i]->price)}} đ
                </code>
              @endif
            </span> 
          </div>
        @endfor

                <span class="span_right"><a href="" id="slider-nav-next" onClick="return false" > <img src="public/kingtech/images/next.png"></a> </span> </div >
   
    </div>
  </div>
@endif