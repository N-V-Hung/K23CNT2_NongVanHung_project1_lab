@extends('layouts.admins._matster')
@section('title','Create Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nvhadmin.nvhhoadon.nvhCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nvhMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="nvhMaHoaDon" name="nvhMaHoaDon" value="{{ old('nvhMaHoaDon') }}" >
                                @error('nvhMaHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="nvhMaKhachHang" id="nvhMaKhachHang" class="form-control">
                                    @foreach ($nvhkhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nvhHoTenKhachHang }}</option>
                                    @endforeach
                                </select>
                                @error('nvhMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="nvhNgayHoaDon" name="nvhNgayHoaDon" value="{{ old('nvhNgayHoaDon') }}" >
                                @error('nvhNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="nvhNgayNhan" name="nvhNgayNhan" value="{{ old('nvhNgayNhan') }}" >
                                @error('nvhNgayNhan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nvhHoTenKhachHang" name="nvhHoTenKhachHang" value="{{ old('nvhHoTenKhachHang') }}" >
                                @error('nvhHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhEmail" class="form-label">Email</label>
                                <input type="Email" class="form-control" id="nvhEmail" name="nvhEmail" value="{{ old('nvhEmail') }}" >
                                @error('nvhEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nvhDienThoai" name="nvhDienThoai" value="{{ old('nvhDienThoai') }}" >
                                @error('nvhDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nvhDiaChi" name="nvhDiaChi" value="{{ old('nvhDiaChi') }}" >
                                @error('nvhDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="nvhTongGiaTri" name="nvhTongGiaTri" value="{{ old('nvhTongGiaTri') }}" >
                                @error('nvhTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" checked/>
                                    <label for="nvhTrangThai1">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1"/>
                                    <label for="nvhTrangThai0">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai2" name="nvhTrangThai" value="2"/>
                                    <label for="nvhTrangThai0">Đã hoàn Thành</label>
                                </div>
                                @error('nvhTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Thêm</button>
                            <a href="{{route('nvhadmins.nvhhoadon')}}" class="btn btn-primary"> Quay lại </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
