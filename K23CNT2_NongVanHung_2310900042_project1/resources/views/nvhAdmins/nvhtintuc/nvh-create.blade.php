@extends('layouts.admins._matster')

@section('title', 'Create Tin Tức')

@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('nvhadmin.nvhtintuc.nvhCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <!-- Mã Tin Tức -->
                        <div class="mb-3">
                            <label for="nvhMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="nvhMaTT" name="nvhMaTT" value="{{ old('nvhMaTT') }}">
                            @error('nvhMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="nvhTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="nvhTieuDe" name="nvhTieuDe" value="{{ old('nvhTieuDe') }}">
                            @error('nvhTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="nvhMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="nvhMoTa" name="nvhMoTa" value="{{ old('nvhMoTa') }}">
                            @error('nvhMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="nvhNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="nvhNoiDung" name="nvhNoiDung" rows="5">{{ old('nvhNoiDung') }}</textarea>
                            @error('nvhNoiDung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="nvhHinhAnh" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="nvhHinhAnh" name="nvhHinhAnh" accept="image/*">
                            @error('nvhHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày đăng tin -->
                        <div class="mb-3">
                            <label for="nvhNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="nvhNgayDangTin" name="nvhNgayDangTin" value="{{ old('nvhNgayDangTin') }}">
                            @error('nvhNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="nvhNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="nvhNgayCapNhap" name="nvhNgayCapNhap" value="{{ old('nvhNgayCapNhap') }}">
                            @error('nvhNgayCapNhap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="0" checked/>
                                <label for="nvhTrangThai1"> Hiển Thị</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="1"/>
                                <label for="nvhTrangThai0">Khóa</label>
                            </div>
                            @error('nvhTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Thêm</button>
                        <a href="{{ route('nvhadmins.nvhtintuc') }}" class="btn btn-primary">Quay Lại</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
