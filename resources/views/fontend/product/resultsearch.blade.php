
@extends('fontend.layout_qc')
@section("title")
<title>{{$txtSearch}}</title>
@endsection
@section('box_center')

        <div class="box_sales">
        <div class="box_pro_title">
      <aside>
        <label>Kết quả tìm kiếm : {{count($products)}} sản phẩm </label>
        <span></span>
      </aside>
    </div>
          <div class="box_pro"> 
            <div class="th_pro">
              <ul>
                @for($i=0;$i< count($products);$i++)
                  <li>
                    <figure><a href="{{Asset('')}}product/{{$products[$i]->id.'-'.$products[$i]->url}}" title="{{$products[$i]->name}}"><img src="{{$convert->showImage($products[$i]->image)}}" alt="{{$products[$i]->name}}" /></a></figure>
                    <h2><a style="color:#337ab7;font-weight:bold;font-size:15px" href="{{Asset('')}}product/{{$products[$i]->id.'-'.$products[$i]->url}}" title="{{$products[$i]->name}}">{{$products[$i]->name}}</a></h2>
                    <aside>
                      <span>
                          @if(Session::has("isuser"))
                          <b>{{number_format($products[$i]->price_company)}} đ</b>
                          <b style="opacity: 0.5;color: black;text-decoration: line-through;">{{number_format($products[$i]->price)}} đ</b>
                          @elseif(!Session::has("isuser"))
                            <b>{{number_format($products[$i]->price)}} đ</b>
                          @endif
                      </span> 
                        <!--<code>Giá công ty: 12,500,000 đ</code> -->
                    </aside>
                  </li>
                  @endfor 
              </ul>
                      
            </div>
              <?php echo $products->appends(['sort' => 'votes'])->render(); ?>
          </div>
            </div>
      </div>
      
@endsection