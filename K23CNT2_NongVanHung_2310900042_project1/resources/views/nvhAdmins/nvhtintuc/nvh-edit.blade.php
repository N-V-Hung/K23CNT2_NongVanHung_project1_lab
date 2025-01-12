@extends('layouts.admins._matster')

@section('title', 'Chỉnh Sửa Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa tin tức -->
                    <form action="{{ route('nvhadmin.nvhtintuc.nvhEditSubmit', $nvhtinTuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="nvhTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="nvhTieuDe" class="form-control" value="{{ old('nvhTieuDe', $nvhtinTuc->nvhTieuDe) }}">
                            @error('nvhTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="nvhMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="nvhMoTa" class="form-control" value="{{ old('nvhMoTa', $nvhtinTuc->nvhMoTa) }}">
                            @error('nvhMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="nvhNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="nvhNoiDung" class="form-control" rows="5">{{ old('nvhNoiDung', $nvhtinTuc->nvhNoiDung) }}</textarea>
                            @error('nvhNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="nvhHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="nvhHinhAnh" class="form-control">
                            @if($nvhtinTuc->nvhHinhAnh)
                                <img src="{{ asset('storage/' . $nvhtinTuc->nvhHinhAnh) }}" alt="Tin tức {{ $nvhtinTuc->nvhTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('nvhHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày đăng -->
                        <div class="mb-3">
                            <label for="nvhNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="nvhNgayDangTin" class="form-control" value="{{ old('nvhNgayDangTin', $nvhtinTuc->nvhNgayDangTin) }}">
                            @error('nvhNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="nvhNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="nvhNgayCapNhap" class="form-control" value="{{ old('nvhNgayCapNhap', $nvhtinTuc->nvhNgayCapNhap) }}">
                            @error('nvhNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1" {{ old('nvhTrangThai', $nvhtinTuc->nvhTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="nvhTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" {{ old('nvhTrangThai', $nvhtinTuc->nvhTrangThai) == 0 ? 'checked' : '' }} />
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
                    <!-- Nút quay lại danh sách tin tức -->
                    <a href="{{ route('nvhadmins.nvhtintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
