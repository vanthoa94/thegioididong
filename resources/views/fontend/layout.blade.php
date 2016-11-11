<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="content-language" content="vi" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{Asset('')}}public/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield("title")
  @yield("description")
   @yield("keywords")
  @yield("meta")
  <link rel="canonical" href='/' />
  <link rel="alternate" media="handheld" href='/' />
  <link href="{{Asset('')}}public/kingtech/css/cp/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
 
  <script src="{{Asset('')}}public/kingtech/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <link href="{{Asset('')}}public/kingtech/css/cssWeb.css" rel="stylesheet" type="text/css">
    <!-- <link href="{{Asset('')}}public/kingtech/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link href="{{Asset('')}}public/kingtech/flexslider/slick.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{Asset('')}}public/kingtech/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{Asset('')}}public/css/mobile.css" rel="stylesheet" type="text/css" />
</head>
<body>

 @include("fontend.layout.headerTop")
 <article style="background:url('{{Asset($website['background_image'])}}') ">
    @include("fontend.layout.headMenu")
    @include("fontend.layout.categoryMenu")
    <section>
      @yield("center")
    </section>

  </article>

  @include("fontend.layout.footer")

  @include("fontend.layout.ads")
 <!--nơi paste code-->
   
  <a href="#" class="top" style="display: none;"></a>
  <!--end html-->
  <script type='text/javascript' src="{{Asset('')}}public/kingtech/flexslider/scripts.min.js"></script>
  <script>
    jQuery(document).ready(function()
    {
      var urlpuser="{{url()}}";
      var _token="{{csrf_token()}}";
      jQuery.ajax({
        type: "POST",
        url: urlpuser+'/position_user',
        dataType: 'json',
        data: {"page":document.title,"_token":_token,"url":window.location.href},
        success: function (result) {
            

        },
        error: function (e, e2, e3) {
            
        }
    });
      var offset = 10;
      var duration = 500;
      jQuery(window).scroll(function()
      {
        if (jQuery(this).scrollTop() > offset)
        {
          jQuery('.top').fadeIn(duration);
        } else {
          jQuery('.top').fadeOut(duration);
        }
      });

      jQuery('.top').click(function(event)
      {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
      })

      $(window).bind('scroll', function() {
        /*var navHeight = $( window ).height() - 70;*/
        var navHeight = 170;
        if ($(window).scrollTop() > navHeight)
        {
          $('nav').addClass('fixed');
        }
        else {
          $('nav').removeClass('fixed');
        }
      });
    });
  </script>


<s></s>
<script type="text/javascript" src="{{Asset('')}}public/kingtech/flexslider/slick.min.js"></script>
<style>
  body
  {
    height: auto !important;
  }
</style>
<!-- <script type="text/javascript" src="{{Asset('')}}public/kingtech/bootstrap/js/bootstrap.min.js"></script> -->
</body>
</html>