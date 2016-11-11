<div class="box_search">
  <div class="search_line">
    <form action="{{Asset('')}}tim-kiem.html" method="get">
      <p>
      <input type="text" name="txtSearch" value="" class="line_input" placeholder="Tên sản phẩm, máy tính bảng, phụ kiện...">
      </p>
      <p>
      <select name="ddStart" class="line_select">
        <option value="0">Giá từ</option>
        <option value="50000">50,000 đ</option>
        <option value="300000">300,000 đ</option>
        <option value="1000000">1,000,000 đ</option>
        <option value="3000000">3,000,000 đ</option>
        <option value="5000000">5,000,000 đ</option>
        <option value="8000000">8,000,000 đ</option>
        <option value="11000000">11,000,000 đ</option>
      </select>
      </p>
      <p>
      <select name="ddEnd" class="line_select">
        <option value="0">Đến</option>
        <option value="50000">50,000 đ</option>
        <option value="300000">300,000 đ</option>
        <option value="1000000">1,000,000 đ</option>
        <option value="3000000">3,000,000 đ</option>
        <option value="5000000">5,000,000 đ</option>
        <option value="8000000">8,000,000 đ</option>
        <option value="11000000">11,000,000 đ</option>
      </select>
      </p>
      <p>
      <input value="Tìm Kiếm" type="submit" class="line_submit">
      {{ csrf_field() }}
      </p>
    </form>
  </div>
</div>