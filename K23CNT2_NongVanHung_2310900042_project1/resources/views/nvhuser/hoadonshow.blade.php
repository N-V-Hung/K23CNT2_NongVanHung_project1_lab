    @extends('_layouts.frontend.user1')  <!-- Hoặc layout của bạn -->

    @section('title', 'Thông Tin Hóa Đơn')

    @section('content-body')
    <div class="container">
        <h1>Thông Tin Hóa Đơn</h1>
        
        <div class="card">
            <div class="card-header">
                <h3>Hóa Đơn ID: {{ $hoaDon->nvhMaHoaDon }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên Khách Hàng:</strong> {{ $hoaDon->nvhHoTenKhachHang }}</p>
                <p><strong>Email:</strong> {{ $hoaDon->nvhEmail }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $hoaDon->nvhDienThoai }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $hoaDon->nvhDiaChi }}</p>
                <p><strong>Tổng Giá Trị:</strong> {{ number_format($hoaDon->nvhTongGiaTri, 0, ',', '.') }} VND</p>
                <p><strong>Ngày Hóa Đơn:</strong> {{ $hoaDon->nvhNgayHoaDon }}</p>
                <p><strong>Ngày Nhận:</strong> {{ $hoaDon->nvhNgayNhan }}</p>
                <p><strong>Trạng Thái:</strong> 
                    @if ($hoaDon->nvhTrangThai == 0)
                        Chưa Thanh Toán
                    @elseif ($hoaDon->nvhTrangThai == 1)
                        Đã Thanh Toán
                    @endif
                </p>
            </div>
            <a href="{{ route('cthoadon.create', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]) }}">Xem chi tiết hóa đơn</a>

        </div>
    </div>

    @endsection
