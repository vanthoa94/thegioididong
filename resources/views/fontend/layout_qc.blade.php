@extends('fontend.layout')

<head>
  <style>
  .pagination
  {
    margin:auto;
    width:100% !important;
    margin-left:30% !important;

  }
    .pagination li
    {
      float:left;
      list-style: none;
      width:36px;
      height: 30px;
      padding:12px;
    }
    
    .overi_hotline
    {
      margin-top: 13px;
    }
  ._social
  {
    margin-top:-1px !important;
  }
  .overi_hotline
    {
      margin-top: 13px;
    }
    .search_line
    {
      margin-top:-10px;
    }
  </style>
</head>
@section('center')
      <div class="body_pages">
        <link rel="stylesheet" href="{{Asset('')}}public/kingtech/css/TweenMax.css" type="text/css">



@include("fontend.home.search")
<div class="box_pages fl_padding2">
  @include("fontend.home.adsLeft")
  <div class="box_pages_center">
      @yield("box_center")     
  </div>
      @include("fontend.home.centerSupport")
</div>
<script src="{{Asset('')}}public/kingtech/js/jquery.newsTicker.js"></script> 
<script>

                var nt_title = $('#nt-title').newsTicker({

                row_height: 30,

                max_rows: 1,

                duration: 3000,

                pauseOnHover: 0

            });

        </script>
      </div>
@endsection