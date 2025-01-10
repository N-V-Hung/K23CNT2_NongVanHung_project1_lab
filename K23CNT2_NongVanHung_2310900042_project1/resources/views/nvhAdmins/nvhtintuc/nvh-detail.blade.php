@extends('layouts.admins._matster')

@section('title', 'Chi Tiết Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chi Tiết Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Mã Tin Tức -->
                    <p class="card-text">
                        <b>Mã Tin Tức:</b> {{ $nvhtinTuc->nvhMaTT }}
                    </p>

                    <!-- Tên Tin Tức -->
                    <p class="card-text">
                        <b>Tiêu Đề:</b> {{ $nvhtinTuc->nvhTieuDe }}
                    </p>

                    <p class="card-text">
                        <b>Mô Tả:</b> {{ $nvhtinTuc->nvhMoTa }}
                    </p>

                    <p class="card-text">
                        <b>Nội dung:</b> {{ $nvhtinTuc->nvhNoiDung }}
                    </p>

                    <p class="card-text">
                        <b> Ngày Cập Nhập:</b> {{ $nvhtinTuc->nvhNgayDangTin }}
                    </p>

                    <p class="card-text">
                        <b>Ngày Đăng Ký:</b> {{ $nvhtinTuc->nvhNgayCapNhap }}
                    </p>

                    <!-- Hình ảnh sản phẩm -->
                    <p class="card-text">
                        <b>Hình Ảnh:</b><br>
                        <img src="{{ asset('storage/' . $nvhtinTuc->nvhHinhAnh) }}" alt="ko" width="200" class="img-fluid">
                    </p>

                    
                    <!-- Trạng thái -->
                    <p class="card-text">
                        <b>Trạng Thái:</b>
                        @if($nvhtinTuc->nvhTrangThai == 0)
                            <span class="badge bg-success">Hiển Thị</span>
                        @else
                            <span class="badge bg-danger">Khóa</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <!-- Nút Quay lại -->
                    <a href="{{ route('nvhadmins.nvhtintuc') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
