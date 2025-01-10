@extends('layouts.admins._matster')
@section('title','Sửa Loại Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the nvhMaKhachHang as a parameter -->
                <form action="{{ route('nvhadmin.nvhhoadon.nvhEditSubmit', ['id' => $nvhhoadon->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $nvhhoadon->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="nvhMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="nvhMaHoaDon" name="nvhMaHoaDon" value="{{ $nvhhoadon->nvhMaHoaDon }}" >
                                @error('nvhMaHoaDon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="nvhMaKhachHang" id="nvhMaKhachHang" class="form-control">
                                    @foreach ($nvhkhachhang as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('nvhMaKhachHang', $nvhhoadon->nvhMaKhachHang) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nvhHoTenKhachHang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nvhMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                             
                             <div class="mb-3">
                                <label for="nvhNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="nvhNgayHoaDon" name="nvhNgayHoaDon" value="{{ old('nvhNgayHoaDon', $nvhhoadon->nvhNgayHoaDon) }}" >
                                @error('nvhNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="nvhNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="nvhNgayNhan" name="nvhNgayNhan" value="{{ old('nvhNgayNhan', $nvhhoadon->nvhNgayNhan) }}" >
                                @error('nvhNgayNhan')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>


                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="nvhHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nvhHoTenKhachHang" name="nvhHoTenKhachHang" value="{{ old('nvhHoTenKhachHang', $nvhhoadon->nvhHoTenKhachHang) }}" >
                                @error('nvhHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nvhEmail" name="nvhEmail" value="{{ old('nvhEmail', $nvhhoadon->nvhEmail) }}" >
                                @error('nvhEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label for="nvhDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nvhDienThoai" name="nvhDienThoai" value="{{ old('nvhDienThoai', $nvhhoadon->nvhDienThoai) }}" >
                                @error('nvhDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nvhDiaChi" name="nvhDiaChi" value="{{ old('nvhDiaChi', $nvhhoadon->nvhDiaChi) }}" >
                                @error('nvhDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nvhTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="nvhTongGiaTri" name="nvhTongGiaTri" value="{{ old('nvhTongGiaTri', $nvhhoadon->nvhTongGiaTri) }}" >
                                @error('nvhTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" {{ old('nvhTrangThai', $nvhhoadon->nvhTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nvhTrangThai0">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1" {{ old('nvhTrangThai', $nvhhoadon->nvhTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nvhTrangThai1">Đang Sử Lý</label>
                           
                                    &nbsp;
                                    <input type="radio" id="nvhTrangThai2" name="nvhTrangThai" value="2" {{ old('nvhTrangThai', $nvhhoadon->nvhTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="nvhTrangThai0">Đã Hoàn Thành</label>
                                </div>
                                @error('nvhTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to (edit) -->
                            <button class="btn btn-success" type="submit">Sửa</button>
                            <a href="{{ route('nvhadmins.nvhhoadon') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
