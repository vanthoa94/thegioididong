<footer style="background:{{$website['background_footer']}}">
    <section>
      <div class="box_pages">
        <div class="box_static">
          <ul>
            <li>
              <label class="fl_upercase fl_bold">Thống kê</label>
              <big><strong> {{$count_user_online['current']}} </strong> khách online và <strong>{{$count_user_online['total']}}</strong> lượt truy cập</big> </li>
            <li>
              <label class="fl_upercase fl_bold">GIỜ MỞ CỬA</label>
              <big>
                           <?php echo $website['open_time']; ?>
                            </big> </li>
            <li>
              <label class="fl_upercase fl_bold">BẢO HÀNH</label>
              <big>
                {!!$website['gio_bao_hanh']!!}
              </big> </li>
          </ul>
        </div>
        <div class="footer_line"></div>
        <div class="box_system">
          <aside>
            <label class="fl_upercase fl_bold">TRUNG TÂM KINGTECH</label>
                          <big class="fl_size14"><div>
                            {!!$website['address']!!}
                          </div></big>
                      </aside>
          <code class="hidden_mobile">
          {!!$website['copyright']!!}<br>
            <a href="http://lovadweb.com" title="Thiết kế website" target="_blank">Thiết kế website bởi lovadweb.com</a></code> </div>
        <div class="footer_line hidden_mobile"></div>
        <div class="footer_about hidden_mobile">
          <label class="fl_upercase fl_bold">KINGTECH</label>
          <ul>
          @foreach($menus as $menu)
          @if($menu->show_footer==1)
            <li><a href="{{Asset($menu->url)}}">{{$menu->name}}</a></li>
          @endif
          @endforeach
          </ul>
        </div>
      </div>

      <div class="show_mobile clearfix" id="menufootermobile">
        <div class="clearfix"></div>
        @foreach($menus as $menu)
         @if($menu->show_footer==1 && $menu->parent==0)
            <a href="{{Asset($menu->url)}}">{{$menu->name}}</a>
      @endif
          @endforeach
      </div>
     
      <div class="box_pages fl_wfull">
        <div class="box_tags">
          <label>Tags :</label>
            @foreach($tags as $tag)
                      <h2><a href="{{$tag->url}}" target="_blank">{{$tag->name}}</a></h2>
            @endforeach
        </div>
        
        <div class="box_coppy"> 
       {!!$website['giay_phep']!!}
        </em> </div>
      </div>
    </section>
  </footer>