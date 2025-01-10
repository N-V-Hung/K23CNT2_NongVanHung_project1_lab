@extends('layouts.frontend.user1')

@section('title', 'Hóa Đơn')

@section('content-body')
<div class="container">
    <h1>Mua Sản Phẩm: {{ $sanPham->nvhTenSanPham }}</h1>

    <form action="{{ route('hoadon.store', ['sanPham' => $sanPham->id]) }}" method="POST">
        @csrf
        <!-- Các trường khách hàng -->
        <div class="mb-3">
            <label for="nvhMaKhachHang" class="form-label">Mã Khách Hàng</label>
            <input type="text" name="nvhMaKhachHang" value="{{ Session::get('nvhMaKhachHang', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nvhHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
            <input type="text" name="nvhHoTenKhachHang" value="{{ Session::get('username1', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nvhEmail" class="form-label">Email</label>
            <input type="email" name="nvhEmail" value="{{ Session::get('nvhEmail', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nvhDienThoai" class="form-label">Số Điện Thoại</label>
            <input type="text" name="nvhDienThoai" value="{{ Session::get('nvhDienThoai', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nvhDiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" name="nvhDiaChi" value="{{ Session::get('nvhDiaChi', '') }}" class="form-control" required>
        </div>

        <!-- Chọn sản phẩm và số lượng -->
        <input type="hidden" name="nvhSanPhamId" value="{{ $sanPham->id }}" required>
        <div class="mb-3">
            <label for="nvhSoLuong" class="form-label">Số Lượng</label>
            <input type="number" name="nvhSoLuong" value="1" min="1" max="{{ $sanPham->nvhSoLuong }}" class="form-control" required>
        </div>

        <!-- Nút Mua -->
        <button type="submit" class="btn btn-primary">Mua Sản Phẩm</button>
        
    </form>
</div>
@endsection
