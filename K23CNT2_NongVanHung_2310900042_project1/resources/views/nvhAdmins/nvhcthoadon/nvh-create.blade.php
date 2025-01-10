@extends('layouts.admins._matster')
@section('title','Create chi tiết Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('nvhadmin.nvhcthoadon.nvhCreateSubmit') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới chi tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="nvhHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="nvhHoaDonID" id="nvhHoaDonID" class="form-control">
                                @foreach ($nvhhoadon as $item)
                                    <option value="{{ $item->id }}">{{ $item->nvhMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('nvhHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="nvhSanPhamID" id="nvhSanPhamID" class="form-control">
                                @foreach ($nvhsanpham as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->nvhDonGia }}">{{ $item->nvhMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('nvhSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="nvhSoLuongMua" name="nvhSoLuongMua" value="{{ old('nvhSoLuongMua') }}" min="1" oninput="calculateThanvhien()">
                            @error('nvhSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="nvhDonGiaMua" name="nvhDonGiaMua" value="{{ old('nvhDonGiaMua') }}" oninput="calculateThanvhien()">
                            @error('nvhDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhThanvhien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="nvhThanvhien" name="nvhThanvhien" value="{{ old('nvhThanvhien') }}" readonly>
                            @error('nvhThanvhien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nvhTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nvhTrangThai0" name="nvhTrangThai" value="0" checked />
                                <label for="nvhTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai1" name="nvhTrangThai" value="1" />
                                <label for="nvhTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="nvhTrangThai2" name="nvhTrangThai" value="2" />
                                <label for="nvhTrangThai2">Xóa</label>
                            </div>
                            @error('nvhTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{ route('nvhadmins.nvhcthoadon') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanvhien() {
            var quantity = parseFloat(document.getElementById('nvhSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('nvhDonGiaMua').value);
            var thanvhien = quantity * unitPrice;
            document.getElementById('nvhThanvhien').value = thanvhien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }

        // Sự kiện khi chọn sản phẩm, tự động cập nhật Đơn Giá Mua
        document.getElementById('nvhSanPhamID').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('nvhDonGiaMua').value = price;
            calculateThanvhien();
        });
    </script>
@endsection
