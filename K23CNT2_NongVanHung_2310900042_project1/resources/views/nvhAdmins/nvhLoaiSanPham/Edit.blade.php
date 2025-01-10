@extends('layouts.admins._matster')
@section('title'.'Sửa Thông Tin Sản Phẩm')

@section('content-body')
    <div class="container">
        <div class="row mt-3">
            <div  class="col"> 
                <form action="{{route('nvhadmins.nvhloaisanpham.nvheditsubmit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$nvhLoaiSanPham->id}}">
                    <div class="card">
                           <div class="card-header">
                                <h2>Sửa thông tin sản phẩm</h2>
                           </div>
                            <div class="card-body container-fluid">
                                <div class="mb-3 row">
                                        <label for="nvhMaLoai" class="col-sm-2 col-form-label">Mã Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         value="{{$nvhLoaiSanPham->nvhMaLoai}}"
                                         id="nvhMaLoai" name="nvhMaLoai" />
                                        @error('nvhMaLoai')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nvhTenLoai" class="col-sm-2 col-form-label">Tên Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control"
                                         value="{{$nvhLoaiSanPham->nvhTenLoai}}" 
                                         id="nvhTenLoai" name="nvhTenLoai" />
                                         @error('nvhTenLoai')
                                            <span class="text-danger">{{ $message }}</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nvhTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                                    <div class="col-sm-10">
                                        @if($nvhLoaiSanPham->nvhTrangThai ===1)
                                                <input type="radio"
                                            id="nvhTrangThai1" name="nvhTrangThai" value="1" checked/>
                                            <label for="nvhTrangThai1">Còn Hàng</label>
                                                &nbsp;
                                            <input type="radio"
                                            id="nvhTrangThai0" name="nvhTrangThai" value="0"/>
                                            <label for="nvhTrangThai0">Đã Hết</label>

                                        @else
                                        <input type="radio"
                                            id="nvhTrangThai1" name="nvhTrangThai" value="1" />
                                            <label for="nvhTrangThai1">Còn Hàng</label>
                                                &nbsp;
                                            <input type="radio"
                                            id="nvhTrangThai0" name="nvhTrangThai" value="0" checked/>
                                            <label for="nvhTrangThai0">Đã Hết</label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                           <div class="card-footer">
                                <button class="btn btn-success">Ghi lại</button>
                                <a href="{{route('nvhadmins.nvhloaisanpham')}}" class="btn btn-secondary">Quay Lại</a>
                           </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection