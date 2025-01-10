@extends('layouts.admins._matster')
@section('title'.'Danh sách loại sản phẩm')

@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">    
                <h1>Danh sách loại sản phẩm</h1>
                    <a href="{{route('nvhadmins.nvhloaisanpham.nvhcreate')}}" type="button" class="btn btn-success btn-lg">Thêm mới</a>
                </div>
        </div>
        <div class="row mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th> 
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $nvhLoaiSanPham as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->nvhMaLoai}}</td>
                        <td>{{$item->nvhTenLoai}}</td> 
                        <td>{{$item->nvhTrangThai}}</td>
                        <td>
                            
                            <a href="/nvh-admins/nvh-loai-san-pham/nvh-view/{{$item->id}}"type="button" class="btn btn-success btn-sm">
                            Xem</a>

                            <a href="/nvh-admins/nvh-loai-san-pham/nvh-edit/{{$item->id}}" type="button" class="btn btn-primary btn-sm">
                            Sửa</a>
                        
                            <a href="/nvh-admins/nvh-loai-san-pham/nvh-delete/{{$item->id}}"type="button" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                            Xóa</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Chưa có thông tin sản phẩm</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection