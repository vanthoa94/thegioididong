
@extends('fontend.layout_qc')
@section("title")
@if(count($products)>0)
<title>{{$products[0]->name}}</title>
@else
          <title>Không tim thấy - kingtech.com.vn</title>
@endif
@endsection
@if(count($products)>0)
@section("description")
<meta name='description' content='
{{$products[0]->description}}'>
  @endsection
@section("keywords")

<meta name='keywords' content='
{{$products[0]->keywords}}
  ' >
@endif
@endsection
@section('box_center')
@if(count($products)>0)

<style type="text/css">

#product_images #selectimages #contentimages{
  height: 32px;
  margin:auto;
}
#product_images #selectimages img{
  border:1px solid #ddd;
  float: left;
  margin-right: 3px;
  display: block;
  margin-bottom:5px;
}
#product_images #selectimages img:hover,#product_images #selectimages img.active{
  border:1px solid #999;
  cursor: pointer;
}

  .large {
    width: 175px; height: 175px;
    position: absolute;
    border-radius: 100%;
     
    /*Multiple box shadows to achieve the glass effect*/
    box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85),
    0 0 7px 7px rgba(0, 0, 0, 0.25),
    inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
     
    /*Lets load up the large image first*/
    background-repeat:no-repeat;
     
    /*hide the glass by default*/
    display: none;
}
.aside_img figure img{
  max-width: 230px;
  max-height: 230px;
}
.aside_img figure{
  height: 230px;
  width:230px;
}
</style>



            <div class="box_sales">
              <div class="box_title">
                <aside>
                  <label>{{$products[0]->name}}</label>
                  <span></span> </aside>
              </div>
              <div class="box_prodetails">
                <aside>
                  <div class="aside_left">
                    <div class="aside_img" id="product_images">
                      <figure>
                         <div id="imagesp">
                        <div class="magnify">
                      <div class="large"></div>
                        <img class="small" alt="" src="{{$convert->showImage($products[0]->image)}}" />
                      </div>        
                      </div>
                    
                      </figure>
                       <div class="clearfix"></div>
                      <div id="pseleftimages" style="margin-top:10px">
                        <div id="selectimages">
                          <div id="contentimages">
                            <img class="active" src="{{$convert->showImage($products[0]->image)}}" width="30" height="30" />
                            <?php $images=explode(",", $products[0]->images); ?>
                            @foreach ($images as $iimage)
                              @if($iimage!="")
                                <img src="{{$convert->showImage($iimage)}}" width="30" height="30" />
                              @endif
                            @endforeach

                          </div>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                     
                      </div>
                    <div class="aside_details">
                      <h2>{{$products[0]->name}}</h2>
                      <aside class="code"><strong>Mã sản phẩm: </strong> {{$products[0]->pro_code}}</aside>
                                            <aside class="giadigital"><strong style="color:#333">Giá:</strong> <?php if(Session::has("isuser")) {?><strong>{{number_format($products[0]->price_company)}} vnđ</strong>
                                              <strong style="opacity: 0.5;color: black;text-decoration: line-through;">{{number_format($products[0]->price)}} vnđ</strong>
                                              <?php }else {?> 
                                              <strong>{{number_format($products[0]->price)}} vnđ</strong><?php }?>
                                            </aside> 
                      <aside class="code">
                        <strong>Tình trạng:</strong> {{\App\Product::getStatus()[$products[0]->status]}}
                       
                      </aside>
                      <aside class="code">
                          <strong>Lượt xem:</strong> {{$products[0]->viewer}}
                      </aside>
                      <aside class="details">
                        {!!$products[0]->description!!}
                       
                      </aside>
                      
                      <!-- <aside class="chiase"> Chia sẽ
                      <aside class="social"> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> </aside>
                      </aside>  -->
                    </div>
                  </div>
                </aside>
            
        <div class="slider_croll fl_top30">
      
        @if(count($productsRefer)>0)
          <div class="box_title">
            <aside>
              <label>Có thể bạn quan tâm</label>
            </aside>
          </div>
            <div class="slider-info-items"> <span class="span_left"> <a href="" id="slider-nav-back" onClick="return false" > <img src="{{Asset('')}}public/kingtech/images/pre.png"></a> </span>
            @if($productsRefer!=null)
            @for($i=0;$i< count($productsRefer);$i++)
              <div class="item_pro">
                <figure><a href="{{Asset('')}}product/{{$productsRefer[$i]->id.'-'.$productsRefer[$i]->url}}" title="{{$productsRefer[$i]->name}}"><img src="{{$convert->showImage($productsRefer[$i]->image)}}" alt="{{$productsRefer[$i]->name}}" /></a></figure>
                <h2 style="margin-top:-27px"><a href="{{Asset('')}}product/{{$productsRefer[$i]->id.'-'.$productsRefer[$i]->url}}" title="{{$productsRefer[$i]->name}}">{{$productsRefer[$i]->name}}</a></h2>
                <span>
                @if(Session::has("isuser"))
                  <code>{{number_format($productsRefer[$i]->price_company)}} đ</code>
                @elseif(!Session::has("isuser"))
                  <code>{{number_format($productsRefer[$i]->price)}} đ</code>
                @endif
          </span> 
              </div>  
            @endfor
            @endif
            <span class="span_right"><a href="" id="slider-nav-next" onClick="return false" > <img src="{{Asset('')}}public/kingtech/images/next.png"></a> </span> </div >
      
        @endif

        </div>           
                <div role="tabpanel" class="box_tabs"> 
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"> <a href="#tongquan" aria-controls="tab" role="tab" data-toggle="tab">Tổng quan</a> </li>
                    <li role="presentation" > <a href="#thongso" aria-controls="tab" role="tab" data-toggle="tab">Thông số kỹ thuật</a> </li>
                    <li role="presentation"> <a href="#details" aria-controls="details" role="tab" data-toggle="tab">Khui hộp</a> </li>
                    <li role="presentation"> <a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Khuyến mãi</a> </li>
                  </ul>
                  
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab tab-pane active" id="tongquan">
                      <big>{!!$products[0]->overview!!}</big>
                    </div>
                    <div role="tabpanel" class="tab tab-pane" id="thongso">
                      <big>{!!$products[0]->specs!!}</big>
                    </div>
                    <div role="tabpanel" class="tab tab-pane" id="details">
                      <big>{!!$products[0]->accessories!!}</big>
                    </div>
                    <div role="tabpanel" class="tab tab-pane" id="sales">
                      <big>{!!$products[0]->promotion!!}</big>
                    </div>
                  </div>
                </div>
                <div class="box_comment">
                    <!--facebook comment-->
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
      <script>
        $('.nav-tabs>li').click(function(){
          $(".tab").each(function(){
            $(this).css("display","none");
            
          });
          $(".nav-tabs>li").each(function(){
            $(this).removeClass("active");
          });
          var content = (window.location.href.split('#')[1]);
              content = ($(this).children().attr('href').split('#')[1]);
          //alert(content);
          $("#"+content+"").css("display","block");
          $(this).addClass("active");
        });
      </script>

      <script type="text/javascript">
$(document).ready(function(){
 
    var native_width = 0;
    var native_height = 0;
    var imageurl=null;
 
    //Now the mousemove function
    $(".magnify").mousemove(function(e){
       
        //When the user hovers on the image, the script will first calculate
        //the native dimensions if they don't exist. Only after the native dimensions
        //are available, the script will show the zoomed version.
        // if(!native_width && !native_height)
        // {
        //     //This will create a new image object with the same image as that in .small
        //     //We cannot directly get the dimensions from .small because of the
        //     //width specified to 200px in the html. To get the actual dimensions we have
        //     //created this image object.
        //     var image_object = new Image();
        //     image_object.src = $(".small").attr("src");


             
        //     //This code is wrapped in the .load function which is important.
        //     //width and height of the object would return 0 if accessed before
        //     //the image gets loaded.
        //     native_width = image_object.width;
        //     native_height = image_object.height;
        // }
        // else
        // {
            imageurl=$(".small").attr("src");
            var image_object = new Image();
            image_object.src = imageurl;
            native_width = image_object.width;
            native_height = image_object.height;
            //x/y coordinates of the mouse
            //This is the position of .magnify with respect to the document.
            var magnify_offset = $(this).offset();
            //We will deduct the positions of .magnify from the mouse positions with
            //respect to the document to get the mouse positions with respect to the
            //container(.magnify)
            var mx = e.pageX - magnify_offset.left;
            var my = e.pageY - magnify_offset.top;
             
            //Finally the code to fade out the glass if the mouse is outside the container
            if(mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0)
            {
                $(".large").fadeIn(100);
            }
            else
            {
                $(".large").fadeOut(100);
            }
            if($(".large").is(":visible"))
            {
                //The background position of .large will be changed according to the position
                //of the mouse over the .small image. So we will get the ratio of the pixel
                //under the mouse pointer with respect to the image and use that to position the
                //large image inside the magnifying glass
                var rx = Math.round(mx/$(".small").width()*native_width - $(".large").width()/2)*-1;
                var ry = Math.round(my/$(".small").height()*native_height - $(".large").height()/2)*-1;
                var bgp = rx + "px " + ry + "px";
                 
                //Time to move the magnifying glass with the mouse
                var px = mx - $(".large").width()/2;
                var py = my - $(".large").height()/2;
                //Now the glass moves with the mouse
                //The logic is to deduct half of the glass's width and height from the
                //mouse coordinates to place it with its center at the mouse coordinates
                 
                //If you hover on the image now, you should see the magnifying glass in action
                $(".large").css({left: px, top: py, backgroundPosition: bgp,"background-image":"url('"+imageurl+"')"});
           // }
        }
    }).mouseout(function(){
      $(".large").hide();
    }).mouseover(function(){
      $(".large").show();
    });

    var sizeimage=$("#contentimages img").click(function(){
      if(!$(this).hasClass("active")){
        $(this).parent().find(".active").removeClass("active");
        $(this).addClass("active");
        $("#imagesp .small").attr("src",this.src);
      }
    }).size();
    var width=sizeimage*33;
    if(width>250)
      width=250;
    $("#contentimages").css("width",width);

   

})
</script>

@endif
@endsection