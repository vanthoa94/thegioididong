
<link rel="stylesheet" type="text/css" href="{{Asset('')}}public/kingtech/css/huyphu.css">
<script type="text/javascript" src="{{Asset('')}}public/kingtech/js/bootstrap.js"></script>
<script type="text/javascript" src="{{Asset('')}}public/kingtech/js/owl.carousel.js"></script>
<style type="text/css">
    #collapseOne
    {
        background: white;
    }
    .ulcap2:hover
    {
        display: block !important;
    }
    #collapseOne li a
    {
        color: black;
    }
    #collapseOne .lileve1:hover
    {
       background: #337ab7;
       color:white;
    }
    #collapseOne li:hover a
    {
        color:white;
    }
    #collapseOne li:hover .firt li
    {
        background: #F2F2F2;
    }
    #collapseOne li:hover .mis li
    {
        background: #F2F2F2;
    }
     #collapseOne li:hover .mis li a
     {
        color: black;
     }
     
    #collapseOne li:hover .firt li a
    {
        color:black;
    }
    .product
    {
        
        width: 215px;
        position: absolute;
        z-index: 999;
        font-weight: bold;
        background: white;
        border: 1px solid #333333;

    }
    .product a
    {
        color:white;
        padding-left:5px;
    }
    #collapseOne li
    {
        padding-left: 10px;
    }
    #collapseOne li a
    {
        padding-left: 5px;
    }
    ul,li
    {
        list-style: none;
    }
    a
    {
        text-decoration: none;

    }
    .firt ul li
    {
        line-height: 22px;
    }

</style>


<li class="product">
<i style="color:black;padding-left:5px" class="fa fa-reorder"></i>
                                <a style="color:black" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="collapsed">Danh mục sản phẩm <i class="glyphicon glyphicon-triangle-bottom"></i></a>
                                <ul id="collapseOne" class="panel-collapse collapse  fade-ul" aria-expanded="true">
                                @foreach($categorys as $category)
                                @if($category->parent==0)
                                
                                        <li class="lileve1">
                                            <i class="fa {{$category->icon}}"></i><a href="{{Asset('category/'.$category->id.'-'.$category->url)}}" title="{{$category->name}}">{{$category->name}}</a>
                                                <ul>
                                                
                                                    <li>
                                                        <ul class="firt">
                                                            <li>


                                                            </li>
                                                            <li>
                                                                <a style="color:#3d8b40;text-transform: uppercase;" href="void::javascript()">Hãng mục</a>
                                                                <ul>
                                                                @foreach($categorys as $childcate)
                                                                @if($category->id==$childcate->parent)
                                                                        <li>
                                                                            <a href="{{Asset('category/'.$childcate->id.'-'.$childcate->url)}}" title="{{$childcate->name}}">{{$childcate->name}}</a>
                                                                        </li>
                                                                @endif
                                                                @endforeach        
                                                                </ul>


                                                            </li>
                                                            <li>

                                                            </li>
                                                        </ul>
                                                    </li>                                                
                                                    <li class="mis">
                                                        <ul>

                                                            <li class="quantam">
                                                                <a style="color:#3d8b40;text-transform: uppercase;" href="void::javascript()">Tin liên quan</a>
                                                                <ul>
                                                                    @foreach(($productCateIDIndex->getNewsWhereName($category->name)) as $news)
                                                                        @foreach($NewsCate as $cate)
                                                                        @if($cate->id==$news->cate_id)
                                                                        <li><a href="{{Asset('')}}tin-tuc/{{$cate->url.'/'.$news->id.'-'.$news->url}}">{{$news->title}}</a>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                        
                                                                </ul>
                                                            </li>
                                                            @if($category->ads!="")
                                                            <li class="panel">
                                                                <a href="{{Asset('')}}category/{{$category->id.'-'.$category->url}}"><img src="{{$convert->showImage($category->ads)}}" style="max-height: 120px; max-width: 330px" alt="Biến tv thường thành tv thông minh"></a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </li>
                                                    

                                                    <li>
                                                        <a href="void::javascript()"><img src="{{Asset('')}}public/images/baner phu kien sua lai.png" style="width: 200px; height: 332px; " alt="Tay cầm chơi game cho điện thoại chinh hãng giá re"></a>
                                                    </li>
                                            
                                                </ul>
                                        </li>
                                        
                                
                                @endif
                                @endforeach
                                </ul>
                            </li>