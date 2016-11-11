 <header class="hidden_mobile">
    <div id="header_top" style="background:{{$website['background_header_top']}}">
      <section>
        <div class="header_top">
          <div class="hotline">
            <figure class="overi_hotline"><img src="{{Asset('')}}public/kingtech/images/hotline.png" alt="Kingtech hotline"></figure>
           <span>{{$website['hotline']}}</span> </div>
          <div class="header_slogan up">
            @foreach($website['slide_top'] as $s)
            <p>{!!$s!!}</p>
            @endforeach
          </div>
          <div class="header_share">
          
              <div class="header_social">
              <figure class="_social">
                <a href="{{$website['facebook']}}" target="_blank"><img src="{{Asset('')}}public/kingtech/images/icon_face.png" alt="Facebook"></a>
                <a href="{{$website['twitter']}}" target="_blank">
                  <img src="{{Asset('')}}public/kingtech/images/icon_twitter.png" alt="Gucci"></a>
               <a href="{{$website['google']}}" target="_blank">
                  <img src="{{Asset('')}}public/kingtech/images/icon_google.png" alt="Google Plus"></a>
              
                 </figure>
              </div>
              @if(Session::has("isuser"))
              @if(Session::get("isuser")=="true") 
              <div class="user-login">
                  <ul class="user-info">
                    <li><a href="{{Asset('doi-mat-khau')}}">Đổi mật khẩu</a></li>
                    <li>|</li>  
                    <li><a href="{{Asset('dang-xuat')}}">Đăng xuất</a></li>

                  </ul>
              </div>
              @endif
              @endif           
          </div>
        </div>
      </section>
    </div>
  </header>
  <div class="show_mobile">
      <nav id="navbarmobile" class="navbar navbar-default" style="background-color:#EDEDED">
        
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url()}}">
              <img alt="kingtech" src="{{Asset('public/images/logo.jpg')}}" width="120px" height="25px" />
            </a>
          </div>
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav clearfix">

              <?php 
              function cloneArray($arr){
                $a=array();

                foreach($arr as $aa){
                  $a[]=$aa;
                }
                return $a;
              }
               ?>

              <?php 

              function dequyCategory($parentid,$data,$cc='category'){
                $arr=array();
                foreach($data as $key => $d){
                  if($d->parent==$parentid){
                    $arr[]=$d;

                    unset($data[$key]);
                  }
                }

                if($arr){
                  ?>
                      <ul class="subdropdown">
                        <?php 
                          foreach($arr as $a){
                            ?>
                               <li class="itemdropdown">
                                <div class="itemdropclick">
                                  <a href="{{url($cc."/".$a->id.'-'.$a->url)}}">{{$a->name}}</a>
                                  <b class="parentcarret"><span class="caret"></span></b>
                                </div>
                                <?php dequyCategory($a->id,$data,$cc); ?>
                              </li>
                            <?php 

                          }
                         ?>
                      </ul>
                  <?php  
                }
              }
               ?>

               <?php 

              function dequyMenu($parentid,$data,$cateApps){
                $arr=array();
                foreach($data as $key => $d){
                  if($d->parent_id==$parentid){
                    $arr[]=$d;

                    unset($data[$key]);
                  }
                }

                if($arr){
                  ?>
                      <ul class="subdropdown">
                        <?php 
                          foreach($arr as $a){
                            if($a->show_menu_top==1){
                            if(mb_strtolower($a->name)=="kho ứng dụng" || mb_strtolower($a->name)=="ứng dụng"){
                                ?>
                                <li class="itemdropdown">
                                <div class="itemdropclick">
                                  <a href="#">{{$a->name}}</a>
                                  <b class="parentcarret"><span class="caret"></span></b>
                                </div>
                                <?php 
                                    dequyCategory(0,$cateApps,'app');
                                    $cateApps=null;
                                }else{
                                  ?>
                                  <li class="itemdropdown">
                                <div class="itemdropclick">
								<?php $nameccc=trim(mb_strtolower($a->name));
									if($nameccc!="hỗ trợ" && $nameccc!="kho ứng dụng" && $nameccc!="ứng dụng"){
								?>
                                  <a href="{{url($a->url)}}">{{$a->name}}</a>
								  <?php }else{ ?>
								  <a href="#">{{$a->name}}</a>
								  <?php } ?>
                                  <b class="parentcarret"><span class="caret"></span></b>
                                </div>
                                  <?php 
                                  dequyMenu($a->id,$data,$cateApps);
                                } ?>
                              </li>
                            <?php 
                          }
                          }
                         ?>
                      </ul>
                  <?php  
                }
              }
               ?>

              <div id="tdropdown">
                <li class="itemdropdown">
                    <div class="itemdropclick">
                      <a href="#">Danh mục sản phẩm</a>
                      <b class="parentcarret"><span class="caret"></span></b>
                    </div>
                     <?php $cccc=cloneArray($categorys);dequyCategory(0,$cccc); ?>
                </li>

                 <?php $mmm=cloneArray($menus);$caaaa=cloneArray($cateApps);dequyMenu(0,$mmm,$caaaa); ?>
                
              </div>
             <li class="itemdropdown">
              <a id="mgiasi" href="{{url('gia-si.html')}}">Xem giá sỉ</a>
			  </li>
            </ul>
          </div>
      </nav>
      <div id="seachmobile">
        <form method="get" action="{{url('tim-kiem.html')}}">
          <div class="clearfix">
            <input type="text" name="txtSearch" value="" placeholder="Tên sản phẩm, máy tính bảng, phụ kiện...">
            <i class="fa fa-search"></i>
          </div>
          <input type="hidden" name="ddStart" value="0" />
          <input type="hidden" name="ddEnd" value="0" />
        </form>
      </div>
  </div>

  <style type="text/css">
    #tdropdown .itemdropdown .subdropdown{
      display: none;
      background-color: #fff;
      padding-left: 10px;
      border-left:1px solid #288ad6;
	  list-style:none;
    }
	
    #tdropdown .itemdropdown{
      position: relative;
	  padding-top:5px;
	  padding-bottom:5px;
    }
    #tdropdown .itemdropdown .parentcarret{
      position: absolute;
      top:-1px;
      right: 0px;
      color:#288ad6;
      padding: 20px;
    }
    #tdropdown .itemdropdown a:hover{
      color:#288ad6;
    }
    #tdropdown .itemdropdown .active a,#tdropdown .itemdropdown .active .caret{
      color:red;
    }
    .user-login
    {
      float:left;

    }
    .user-info > li
    {
      float: left;
      padding-left: 5px;
      color: white;
    }
    .user-info > li >a
    {
      color: white;
      text-decoration: underline;
      font-weight: bold;
    }
  </style>

  <script type="text/javascript">
  $(document).ready(function(){
    $("#tdropdown .itemdropdown").each(function(){
      if(!$(this).find(".subdropdown:eq(0)").length){
        $(this).find(".itemdropclick .caret").remove();
        $(this).find(".itemdropclick").removeClass("itemdropclick");
      }
    });
    $("#tdropdown .itemdropclick .parentcarret").click(function(){
      $(this).parent().parent().find(".subdropdown:eq(0)").slideToggle();
      $(this).parent().toggleClass('active');
      return false;
    });
  });
  </script>
