<ul class="list-group">
    <!-- Hiển thị tên tài khoản nếu đã đăng nhập -->
    <li class="list-group-item active" style="color: red; background:blue;">
        @if(Session::has('username'))
            <span class="fw-bold">Hello, {{ Session::get('username') }}</span>
        @else
            <a href="/nvh-admins/login" >Đăng nhập</a>
        @endif
    </li>

    <li class="list-group-item active" aria-current="true">
        <strong>Quản Trị Nội Dung</strong>


    <li class="list-group-item">
        <a href="/nvh-admins/nvhdanhsachquantri/nvhdanhmuc" class="text-decoration-none text-dark">Danh Sách Quản Trị</a>
    </li>
    <li class="list-group-item">
        <a href="/nvh-admins/nvh-quan-tri" class="text-decoration-none text-dark">Quản trị Viên</a>
    </li>
    </li>
    <li class="list-group-item">
        <a href="/nvh-admins/nvh-loai-san-pham" class="text-decoration-none text-dark">Loại Sản Phẩm</a>
    </li> 

    <li class="list-group-item">
        <a href="/nvh-admins/nvh-san-pham" class="text-decoration-none text-dark">Sản Phẩm</a>
    </li>
    <li class="list-group-item">
        <a href="/nvh-admins/nvh-khach-hang" class="text-decoration-none text-dark">Khách Hàng</a>
    </li>
    <li class="list-group-item">
        <a href="/nvh-admins/nvh-hoa-don" class="text-decoration-none text-dark">Hóa Đơn</a>
    </li>
    <li class="list-group-item">
        <a href="/nvh-admins/nvh-ct-hoa-don" class="text-decoration-none text-dark">Chi Tiết Hóa Đơn</a>
    </li>
    <li class="list-group-item">
        <a href="/nvh-admins/nvh-tin-tuc" class="text-decoration-none text-dark">Tin Tức</a>
    </li>
  </ul>