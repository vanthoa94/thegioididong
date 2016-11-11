<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lỗi tài khoản</title>
    <link href="{{Asset('public/css/error.css')}}" rel="stylesheet" />
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div>
        <div id="box">

    <h1>Tài khoản bị khóa</h1>

    <div id="ctbox">
        Tài khoản của bạn đã bị khóa. Nguyên nhân và cách giải quyết:<br />
        <ul>
            <li>Bạn bị quản trị viên khóa tài khoản <span class="arror">»</span> <a href="{{url('admin/logout')}}">Đăng xuất</a> và liên hệ quản trị viên.</li>
            <li>Lỗi server <span class="arror">»</span> Kiểm tra lại host và liên hệ quản lý host.</li>
        </ul>
    </div>


</div>

    </div>
    
</body>
</html>
