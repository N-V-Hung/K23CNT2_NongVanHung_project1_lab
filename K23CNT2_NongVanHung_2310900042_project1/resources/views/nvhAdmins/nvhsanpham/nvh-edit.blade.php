@extends('layouts.admins._matster')
@section('title'.'Sửa Thông Tin Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('nvhadmins.nvhsanpham.nvhEditSubmit', $nvhsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="nvhMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="nvhMaSanPham" class="form-control" value="{{ old('nvhMaSanPham', $nvhsanpham->nvhMaSanPham) }}">
                            @error('nvhMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="nvhTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="nvhTenSanPham" class="form-control" value="{{ old('nvhTenSanPham', $nvhsanpham->nvhTenSanPham) }}">
                            @error('nvhTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="nvhHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="nvhHinhAnh" class="form-control">
                            @if($nvhsanpham->nvhHinhAnh)
                                <img src="{{ asset('storage/' . $nvhsanpham->nvhHinhAnh) }}" alt="Sản phẩm {{ $nvhsanpham->nvhMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('nvhHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="nvhSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="nvhSoLuong" class="form-control" value="{{ old('nvhSoLuong', $nvhsanpham->nvhSoLuong) }}">
                            @error('nvhSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="nvhDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="nvhDonGia" class="form-control" value="{{ old('nvhDonGia', $nvhsanpham->nvhDonGia) }}">
                            @error('nvhDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="nvhMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="nvhMaLoai" id="nvhMaLoai" class="form-control">
                                @foreach ($nvhloaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('nvhMaLoai', $nvhsanpham->nvhMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nvhTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nvhMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1" {{ old('nvhTrangThai', $nvhsanpham->nvhTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="nvhTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" {{ old('nvhTrangThai', $nvhsanpham->nvhTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="nvhTrangThai0">Hiển Thị</label>
                            </div>
                            @error('nvhTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('nvhadims.nvhsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection