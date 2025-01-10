@extends('layouts.admins._matster')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('nvhadmin.nvhquantri.nvhCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nvhTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="nvhTaiKhoan" name="nvhTaiKhoan" required>
                @error('nvhTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nvhMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="nvhMatKhau" name="nvhMatKhau" required>
                @error('nvhMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nvhTrangThai">Trạng Thái</label>
                <select name="nvhTrangThai" id="nvhTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
                    <a href="{{route('nvhadmins.nvhquantri')}}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection
