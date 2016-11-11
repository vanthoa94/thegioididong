<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{Asset("public/images/ApplicationIcon.bmp")}}" rel="icon" />
    <!-- Meta, title, CSS, favicons, etc. -->
    @yield('meta')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{Asset("public/css/bootstrap.min.css")}}" rel="stylesheet" />
    @yield('css')
    <!--[if lt IE 9]>
          <script src="{{Asset("public/js/html5shiv.min.js")}}"></script>
          <script src="{{Asset("public/js/respond.min.js")}}"></script>
    <![endif]-->


</head>

<body>
    Layout
    @yield('content')
    @yield('script')
</body>
</html>
