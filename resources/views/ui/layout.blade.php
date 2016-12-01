<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    @yield('meta')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{Asset("public/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{Asset("public/css/css.css")}}" rel="stylesheet" />
    @yield('css')
    <!--[if lt IE 9]>
          <script src="{{Asset("public/js/html5shiv.min.js")}}"></script>
          <script src="{{Asset("public/js/respond.min.js")}}"></script>
    <![endif]-->



    <style type="text/css">
        body{
            background-color: {{$base_data['website']['background_color']}}
        }
        #navbartop{
            background-color: {{$base_data['website']['background_menutop']}}
        }
        #navbartop .pull-right a {
            color: {{$base_data['website']['text_color_menutop']}};
        }
        #banner{
            background-color: {{$base_data['website']['background_header']}};
        }
        #headermenu{
                background-color: {{$base_data['website']['background_menu']}};
        }
        a{
            color:{{$base_data['website']['TextColor']}};
        }
        a:hover{
            color:{{$base_data['website']['TextColorHover']}};
        }
        #headermenu .danhmuc ul li a{
            color:{{$base_data['website']['background_color_menu']}};
        }

        #headermenu .danhmuc ul li a:hover{
            color:{{$base_data['website']['background_hover_menu']}};
        }
    </style>


</head>

<body>
    <nav id="navbartop" class="clearfix">
        <div class="container">
            <div class="pull-left">
                <div id="sharep" class="clearfix">
                    <div class="addthis_toolbox addthis_default_style printnone">    

                        <?php $fullUrl=Request::fullUrl(); ?>

                        <a class="addthis_button_facebook at300b" title="Facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$fullUrl}}" target="_blank"><span class="at16nc at300bs at15nc at15t_facebook at16t_facebook"><span class="at_a11y"></span></span></a>
                        <a class="addthis_button_twitter at300b" title="Tweet" href="https://twitter.com/intent/tweet?source=webclient&amp;text=học tiếng hoa, tiếng Trung Quốc Online&amp;url={{$fullUrl}}" target="_blank"><span class="at16nc at300bs at15nc at15t_twitter at16t_twitter"><span class="at_a11y"></span></span></a>      
                        <a class="addthis_button_google at300b" href="https://plus.google.com/share?url={{$fullUrl}}" target="_blank" title="Google"><span class="at16nc at300bs at15nc at15t_google at16t_google"><span class="at_a11y"></span></span></a>
                        <a class="addthis_button_zingme at300b" href="http://link.apps.zing.vn/share?u={{$fullUrl}}" target="_blank" title="ZingMe"><span class=" at300bs at16nc at15nc at15t_zingme"><span class="at_a11y"></span></span></a>  
             <a class="addthis_button_email at300b" target="_blank" title="Email" href="https://mail.google.com/mail/u/0/?view=cm&amp;fs=1&amp;to&amp;su=học tiếng Hoa, tiếng Trung Quốc Online&amp;body={{$fullUrl}}&amp;ui=2&amp;tf=1"><span class="at16nc at300bs at15nc at15t_email at16t_email"><span class="at_a11y"></span></span></a>
                        
                    </div>
                </div>
            </div><!--left-->

            <div class="pull-right">
                <a href=""><img src="{{Asset('public/images/help.png')}}" width="13px" /> <b>Hướng dẫn đăng sách</b></a>
                <span>|</span>
                <a href=""><img src="{{Asset('public/images/Login-Information.png')}}" width="13px" /> <b>Đăng nhập</b></a>
                <span>|</span>
                <a href=""><img src="{{Asset('public/images/icon-contact.gif')}}" width="13px" /> <b>Liên hệ</b></a>
            </div>
        </div>
    </nav>


    <header id="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <a href="{{url()}}"><img src="{{Asset('public/images/logo.jpg')}}" /></a>
                </div>

                <div class="col-md-5">
                    <div id="qctop">

                    </div>
                </div>

                <div class="col-md-4" style="padding-right:0px">
                    <div id="hotline" class="pull-left">
                        <a href="Zalo: 0973-149-169">
                            <img src="{{Asset('public/images/hotline.jpg')}}" class="block pull-left" alt="hotline 0973149169">
                            <span class="phonenumber pull-left block">
                                Zalo<br>
                                0973149169
                            </span>
                        </a>
                    </div>

                    <div id="email" class="pull-left">
                        <a href="mailto:tienghoadidong@gmail.com">
                            <img src="{{Asset('public/images/email.png')}}" class="block pull-left" alt="email tienghoadidong@gmail.com">
                            <span class="email pull-left block">
                                Gọi:<br>
                                0973-149-169
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav id="headermenu" class="hidden-xs">
        <div class="container clearfix">
            <div class="pull-left ddanhmuc">
                <div class="danhmuc">
                    <a href="#"><h2>Danh Mục Sách <img src="{{Asset('public/images/dropdown.png')}}"></h2></a>
                    <ul>
                        <img src="{{Asset('public/images/top.png')}}">
                        <li><a href="danhmuc.php?q=sach-mien-phi_1">Sách miễn phí</a></li>
                        <li><a href="danhmuc.php?q=sach-co-phi_2">Sách có phí</a></li>
                        <li><a href="danhmuc.php?q=sach-moi-nhat_4">Sách mới nhất</a></li>
                        <li><a href="danhmuc.php?q=sach-xem-nhieu_5">Sách xem nhiều</a></li>
                        <li><a href="danhmuc.php?q=sach-hoc-vien_9">Sách học viên</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="pull-left ssearch">
                <div class="clearfix search">
                    <form method="get" action="timkiem.php">
                        <input placeholder="Nhập tên sách cần tìm..." type="text" id="qsearch" name="q">
                        <input type="submit" id="ssearch" value="Tìm sách">
                    </form>
                </div>
            </div>
            <div class="pull-left cart hidden-sm">
                <a href="sachcuaban.php" title="Sách của bạn">Sách Của Bạn</a>
            </div>
            <div class="pull-left addbook hidden-sm">
                <a href="themsach.php" title="Thêm sách mới">+ Thêm Sách</a>
            </div>
        </div>
    </nav>

    <div class="container">

        @yield('content')

    </div>

    <script src="{{Asset("public/js/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{Asset("public/js/jshome.js")}}" type="text/javascript"></script>

    @yield('script')
</body>
</html>
