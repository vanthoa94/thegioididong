<!DOCTYPE html>
<html>
<head>
     <noscript>
        <meta http-equiv="refresh" content="0; URL={{url("nojavascript.html")}}" />
    </noscript>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{Asset("public/images/ApplicationIcon.bmp")}}" rel="icon" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{Asset("public/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{Asset("public/fonts/css/font-awesome.min.css")}}" rel="stylesheet" />
    <link href="{{Asset("public/css/style.css")}}" rel="stylesheet" />
    @yield('css')
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div id="wrapper" class="clearfix">
        <div id="userrolesdata" style="display:none"><!--role data-->
            {{$admin_info['role']}}
        </div>
        <!--col left-->
       <div id="col-left">
            <header id="left_header">
                <a href="{{url('/')}}" target="_black">KINGTECH</a>
            </header>
            <!--#left header-->
            <div id="content-col-left">
                <div class="logo">
                    <div class="pull-left profile">
                        <img src="{{Asset('public/images/avatar/'.$admin_info['id'].'.jpg')}}" />
                        <br />
                    </div>
                    <div class="pull-left white">
                        <div>
                            {{$admin_info['name']}}<br />
                            <a href="{{url('admin/profile')}}" style="font-size:11px;color:#A9A9A9">Thông tin cá nhân</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                   <small style="color:white">Lần truy cập cuối: {{$admin_info['last_visit']}}</small>
                </div>
                
                <nav id="menu">
                    <li id="menu_home">
                        <a href="{{url('admin')}}">
                            <i class="fa fa-home"></i> <span>Trang chủ</span>
                        </a>
                    </li>

                    <li id="menu_product" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-cube"></i> <span>Quản lý sản phẩm</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="product/list" class="trole" data-action="list">
                                <a href="{{url('admin/product')}}">Sản phẩm</a>
                            </li>

                            <li data-role="product/create" class="trole" data-action="new"> 
                                <a href="{{url('admin/product/create')}}" >Thêm mới</a>
                            </li>

                            <li data-role="category/list" class="trole" data-action="category"> 
                                <a href="{{url('admin/category')}}" >Loại sản phẩm</a>
                            </li>
                        </ul>
                    </li>

                    <li id="menu_menu" data-role="menu/list" class="trole">
                        <a href="{{url('admin/menu')}}">
                            <i class="fa fa-list"></i> <span>Quản lý menu</span>
                        </a>
                    </li>

                    <li id="menu_news" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-globe"></i> <span>Quản lý tin tức</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="news/list" class="trole" data-action="list">
                                <a href="{{url('admin/news')}}">Tin tức</a>
                            </li>

                            <li data-role="news/create" class="trole" data-action="new"> 
                                <a href="{{url('admin/news/create')}}" >Thêm mới</a>
                            </li>

                            <li data-role="newscate/list" class="trole" data-action="category"> 
                                <a href="{{url('admin/news-category')}}" >Loại tin tức</a>
                            </li>
                        </ul>
                    </li>

                    <li id="menu_slide" data-role="slide/list" class="trole">
                        <a href="{{url('admin/slide')}}">
                            <i class="fa fa-picture-o"></i> <span>Quản lý slide</span>
                        </a>
                    </li>

                    <li id="menu_ad" data-role="ad/list" class="trole">
                        <a href="{{url('admin/ad')}}">
                            <i class="fa fa-bullhorn"></i> <span>Quản lý quảng cáo</span>
                        </a>
                    </li>

                    <li id="menu_app" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Quản lý ứng dụng</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="app/list" class="trole" data-action="list">
                                <a href="{{url('admin/app')}}">Ứng dụng</a>
                            </li>

                            <li data-role="app/create" class="trole" data-action="new"> 
                                <a href="{{url('admin/app/create')}}" >Thêm mới</a>
                            </li>

                            <li data-role="appcate/list" class="trole" data-action="category"> 
                                <a href="{{url('admin/app-category')}}" >Loại ứng dụng</a>
                            </li>
                        </ul>
                    </li>

                    <li id="menu_video" data-role="video/list" class="trole">
                        <a href="{{url('admin/video')}}">
                            <i class="fa fa-youtube-play"></i> <span>Quản lý video</span>
                        </a>
                    </li>

                    <li id="menu_branch" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-sitemap"></i> <span>Quản lý chi nhánh</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="branch/list" class="trole" data-action="list">
                                <a href="{{url('admin/branch')}}">Chi nhánh</a>
                            </li>

                            <li data-role="branch/create" class="trole" data-action="new"> 
                                <a href="{{url('admin/branch/create')}}" >Thêm mới</a>
                            </li>

                            <li data-role="agency/list" class="trole" data-action="agency"> 
                                <a href="{{url('admin/agency')}}" >Đại lý</a>
                            </li>
                        </ul>
                    </li>

                    <li id="menu_support" data-role="support/list" class="trole">
                        <a href="{{url('admin/support')}}">
                            <i class="fa fa-question-circle"></i> <span>Quản lý hỗ trợ</span>
                        </a>
                    </li>

                    <li id="menu_page" data-role="page/list" class="trole">
                        <a href="{{url('admin/page')}}">
                            <i class="fa fa-bookmark"></i> <span>Quản lý trang</span>
                        </a>
                    </li>

                    <li id="menu_tag" data-role="tag/list" class="trole">
                        <a href="{{url('admin/tag')}}">
                            <i class="fa fa-tag"></i> <span>Quản lý tag</span>
                        </a>
                    </li>

                    <li id="menu_admin" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-gavel"></i> <span>Quản lý admin</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="admin/list" class="trole" data-action="list">
                                <a href="{{url('admin/admin')}}">Danh sách</a>
                            </li>

                            <li data-role="admin/create" class="trole" data-action="new"> 
                                <a href="{{url('admin/admin/create')}}" >Thêm mới</a>
                            </li>

                            <li data-role="groupadmin/create" class="trole" data-action="group"> 
                                <a href="{{url('admin/group-admin')}}" >Nhóm Admin</a>
                            </li>
                        </ul>
                    </li>

                    <li id="menu_account" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Quản lý người dùng</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="user/list" class="trole" data-action="list">
                                <a href="{{url('admin/user')}}">Danh sách</a>
                            </li>

                            <li data-role="user/create" class="trole" data-action="new"> 
                                <a href="{{url('admin/user/create')}}" >Thêm mới</a>
                            </li>
                        </ul>
                    </li>

                    <li id="menu_info" class="dropdownmenu">
                        <a href="#">
                            <i class="fa fa-info-circle"></i> <span>Quản lý website</span>
                             <small class="fa fa-chevron-down"></small>
                        </a>
                        <ul>
                            <li data-role="info/list" class="trole" data-action="info">
                                <a href="{{url('admin/info')}}">Thông tin website</a>
                            </li>

                            <li data-role="info/list" class="trole" data-action="setting"> 
                                <a href="{{url('admin/setting')}}" >Cấu hình website</a>
                            </li>
                        </ul>
                    </li>
                    
                </nav>
            </div>
            <footer id="footer-colleft">
                <div class="row">
                    <div class="col-xs-4">
                       <a href="{{url('admin')}}" title="Trang chủ"><i class="fa fa-home"></i></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{url('admin/changepass')}}" title="Đổi mật khẩu"><i class="fa fa-key"></i></a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{url('admin/logout')}}" title="Thoát" class="logout"><i class="fa fa-power-off"></i></a>
                    </div>
                </div>
            </footer>
            <div id="areasubmenu">
            
            </div>
        </div>

        <!--col left-->


        <div id="col-main">
            <!--header-->
            <header id="right_header">
                <div class="padding-content">
                    <div class="pull-left">
                        <div id="togglemenu">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <!--.pull-left-->
                    <div class="pull-right">

                        <!-- <li id="notification" class="dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span>0</span>
                            </div>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header"></li>
                                
                            </ul>
                        </li> -->
                        <li id="userlogin" class="dropdown">
                            <div class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{Asset('public/images/avatar/'.$admin_info['id'].'.jpg')}}"  class="img-circle" width="30" height="30"  />
                                
                                {{$admin_info['name']}}
                                <span class="fa fa-angle-down"></span>
                            </div>
                            <ul class="dropdown-menu" style="width:180px">
                                <li><a href="{{url('admin/profile')}}"><i class="fa fa-fw fa-user"></i> Thông tin cá nhân</a></li>
                                <li><a href="{{url('admin/changepass')}}"><i class="fa fa-fw fa-key"></i> Đổi mật khẩu</a></li>
                                <div class="divider"></div>
                                <li><a href="{{url('admin/logout')}}"><i class="fa fa-fw fa-power-off"></i> Thoát</a></li>
                            </ul>
                        </li>
                    </div>
                    <!--.pull-right-->
                </div>

               
            </header>
            <!--#right header-->


            <div id="main">
                <div id="brea">
                    @yield('breadcrumb')
                </div>
                <div class="padding-content">
                    @yield('content')
                 </div>
            </div><!--#main-->
        </div>
        <!--col main-->

        <footer id="footer">
            Copyright &copy; 2016 | Lần truy cập trước của bạn <b>{{$admin_info['last_visit']}}</b> | <a href="javascript:void(0)" id="RemoveCookie">Xóa Cookie</a>
        </footer>

    </div>
    <!--#Wrapper-->
    <!--confirmdialog-->
    <div class="modal fade" id="confirmbox" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Thông Báo</h4>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage">Any confirmation message?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" id="confirmFalse">Cancel</button>
                    <button class="btn btn-primary" id="confirmTrue">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!--/confirmdialog-->
    <div class="modal fade" id="alterdialog" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông Báo</h4>
                </div>
                <div class="modal-body">
                    <p>Any confirmation message?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div id="ajaxloader" style="display:none;position: fixed; top: 20px; left: 45%; z-index: 9999; box-shadow: 0px 0px 3px #1ABB9C ; border-radius: 3px; background-color: #1ABB9C ; width: 100px; padding: 10px 0px; opacity: 0.8; color: white; text-align: center">
        <img src="{{Asset("public/images/ajax-loader.gif")}}" />
        <div style="height: 5px"></div>
        Đang Xử Lý
    </div>


    <script type="text/javascript">
        var base_url = "{{url('admin')}}";
    </script>
    <script src="{{Asset("public/js/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{Asset("public/js/t_role.js")}}" type="text/javascript"></script>
    <script src="{{Asset("public/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{Asset("public/js/js.js")}}" type="text/javascript"></script>
    <script src="{{Asset("public/js/menu.js")}}" type="text/javascript"></script>
    @yield('script')
   <script src="{{Asset("public/js/currentPage.js")}}" type="text/javascript"></script>
</body>
</html>
