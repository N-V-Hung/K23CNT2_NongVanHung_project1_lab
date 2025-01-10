@extends('layouts.admins._matster')
@section('title'.'Thêm mới loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row mt-3">
            <div  class="col"> 
                <form action="{{route('nvhadmins.nvhloaisanpham.nvhcreatesubmit')}}" method="post">
                    @csrf
                    <div class="card">
                           <div class="card-header">
                                <h2>Thêm mới loại sản phẩm</h2>
                           </div>
                            <div class="card-body container-fluid">
                                <div class="mb-3 row">
                                        <label for="nvhMaLoai" class="col-sm-2 col-form-label">Mã Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         value="{{old('nvhMaLoai')}}"
                                         id="nvhMaLoai" name="nvhMaLoai" />
                                        @error('nvhMaLoai')
                                            <span class="text-danger">Điền Thông Tin Theo Quy Định</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nvhTenLoai" class="col-sm-2 col-form-label">Tên Loại</label>
                                    <div class="col-sm-10">
                                         <input type="text" class="form-control" 
                                         value="{{old('nvhTenLoai')}}"
                                         id="nvhTenLoai" name="nvhTenLoai" />
                                         @error('nvhTenLoai')
                                            <span class="text-danger">Điền Thông Tin Theo Quy Định</span>  
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                        <label for="nvhTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                                    <div class="col-sm-10">
                                         <input type="radio"
                                         id="nvhTrangThai1" name="nvhTrangThai" value="1" checked/>
                                         <label for="nvhTrangThai1">Còn Hàng</label>
                                            &nbsp;
                                         <input type="radio"
                                         id="nvhTrangThai0" name="nvhTrangThai" value="0"/>
                                         <label for="nvhTrangThai0">Đã Hết</label>
                                    </div>
                                </div>
                            </div>

                           <div class="card-footer">
                                <button class="btn btn-success">Thêm mới</button>
                                <a href="{{route('nvhadmins.nvhloaisanpham')}}" class="btn btn-secondary">Quay Lại</a>
                           </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection