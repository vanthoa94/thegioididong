@extends('fontend.layout_qc')
@section("title")
<title>Đổi mật khẩu - kingtech.com.vn</title>
@endsection
@section("box_center")
<div class="box_sales">
            <div class="box_title">
              <aside>
                <label>Thông tin tài khoản</label>
                <span></span> </aside>
            </div>
            <div class="box_login">
                <aside>
                    <label>Đổi mật khẩu</label>
                    <big>
                    @if(Session::has("doimatkhauthanhcong"))
                      @if(Session::get("doimatkhauthanhcong")==0)
                      <div class="alert alert-danger">
                          <strong>Lỗi!</strong> Đổi mật khẩu không thành công.
                      </div>
                      @elseif(Session::get("doimatkhauthanhcong")==1)
                        <div class="alert alert-success">
                          <strong>Thành công!</strong> Đổi mật khẩu thành công.
                        </div>
                      @endif
                    @endif
                        <form action="doi-mat-khau" method="post">
                            <input type="password" name="txtPass_cu" placeholder="Mật khẩu cũ" class="cls_text" required="">
                            <input type="text" name="txtPass_new" placeholder="Mật khẩu mới" class="cls_text" required="">
                            <input type="submit" name="btnSubmit" style="margin-left: 150px" value="Đổi mật khẩu" class="line_submit">
                            {{ csrf_field() }}
                        </form>
                    </big>
                </aside>
                <aside style="margin-left: 10px">
                    <label>Đổi thông tin khác</label>
                    <big style="padding-top: 20px;padding-left: 10px;padding-right: 10px;width: calc(100% - 20px);">
                       <p>- Để đổi được các thông tin khác</p>
                      
                       
                       <p>- Vui lòng liên hệ email 
                       
                       <strong>{{$website['email']}}</strong>
                       
                       hoặc số điện thoại 
                       
                       <strong>{{$website['phone']}}</strong> 
                       để được thay đổi thông tin tài khoản</p>
                       
                       
                    </big>
                </aside>
            </div>
          </div> 
@endsection