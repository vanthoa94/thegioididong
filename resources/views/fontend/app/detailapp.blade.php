@extends('fontend.layout_qc')
@section("title")
@if(count($detailapp)>0)
<title>{{$detailapp[0]->name}}</title>
@else
          <title>Không tim thấy - kingtech.com.vn</title>
@endif

@endsection
@section('box_center')
<div class="box_sales">
@if(count($detailapp)>0)
      <div class="box_title">
        <aside>
          <label>{{$detailapp[0]->name}}</label>
          <span></span> </aside>
      </div>
      <div class="ungdungdetails fl_top30">
      	<div class="ungdung_img">
        	<figure><img src="{{$convert->showImage($detailapp[0]->image)}}" alt="{{$detailapp[0]->name}}"></figure>
            <aside>
            	<h2>{{$detailapp[0]->name}}</h2>
                <table width="100%" border="1">
                  <tbody><tr>
                    <td>Tình trạng</td>
                    <td>{{$detailapp[0]->status}}</td>
                  </tr>
                  <tr>
                    <td>Thể loại</td>
                    @foreach($cateApps as $cateapp)
                    @if($detailapp[0]->cate_id==$cateapp->id)
                    <td><a href="{{Asset('')}}app/{{$cateapp->id.'-'.$cateapp->url}}" title="{{$cateapp->name}}">{{$cateapp->name}}</a></td>
                    @endif
                    @endforeach
                  </tr>
                  <tr>
                    <td>Dung lượng</td>
                    <td>{{$detailapp[0]->capacity}}</td>
                  </tr>
                  <tr>
                    <td>Yêu cầu</td>
                    <td>{{$detailapp[0]->require}}</td>
                  </tr>
                  <tr>
                    <td>Phiên bản hiện tại</td>
                    <td>{{$detailapp[0]->version}}</td>
                  </tr>
                  <tr>
                    <td>Nhóm phát triển</td>
                    <td>{{$detailapp[0]->developers}}</td>
                  </tr>
                  <tr>
                    <td colspan="2"><a href="{{$detailapp[0]->app_url}}" target="_parent" class="label-info">Tải về</a></td>
                  </tr>
                </tbody></table>

            </aside>
            <big>
            	{!!$detailapp[0]->content!!}            </big>
        </div>
      	<div class="ungdung_text">
                    </div>    
      </div>
      @elseif(count($detailapp)>0)
        không tìm thấy ứng dụng yêu cầu
@endif
    </div>
@stop