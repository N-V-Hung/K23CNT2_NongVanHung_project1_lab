<?php

namespace App\Http\Controllers;

use App\Models\NVH_LOAI_SAN_PHAM;
use Illuminate\Http\Request;

class NVH_LOAI_SAN_PHAMcontroller extends Controller
{
    // Admins : CRUD

    // List
    public function nvhList()
    {
        $nvhLoaiSanPham = NVH_LOAI_SAN_PHAM::all();
        return view('nvhAdmins.nvhLoaiSanPham.List', ['nvhLoaiSanPham' => $nvhLoaiSanPham]);
    }

    //create
    public function nvhCreate()
    {
        return view('nvhAdmins.nvhLoaiSanPham.Create');
    }

    //create submit
    public function nvhCreateSubmit(Request $request)
    {
        //validation data
        $validatedData = $request->validate([
            'nvhMaLoai' => 'required|unique:NVH_LOAI_SAN_PHAM,nvhMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'nvhTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'nvhTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);

        //ghi dữ liệu xuống DB
        $nvhLoaiSanPham = new NVH_LOAI_SAN_PHAM;
        $nvhLoaiSanPham->nvhMaLoai = $request->nvhMaLoai;
        $nvhLoaiSanPham->nvhTenLoai = $request->nvhTenLoai;
        $nvhLoaiSanPham->nvhTrangThai = $request->nvhTrangThai;

        $nvhLoaiSanPham->save();

        return redirect()->route('nvhadmins.nvhloaisanpham');
    }

    //edit
    public function nvhEdit($id)
    {
        $nvhLoaiSanPham = NVH_LOAI_SAN_PHAM::find($id);
        return view('nvhAdmins.nvhLoaiSanPham.Edit',['nvhLoaiSanPham'=>$nvhLoaiSanPham]);
    }

    //post edit submit
    public function nvhEditSubmit(Request $request)
    {

        $validatedData = $request->validate([
            'nvhMaLoai' => 'required|string|max:255|unique:NVH_LOAI_SAN_PHAM,nvhMaLoai,' . $request->id,  // Bỏ qua nvhMaLoai của bản ghi hiện tại
            'nvhTenLoai' => 'required|string|max:255',   
            'nvhTrangThai' => 'required|in:0,1',  // Validation for nvhTrangThai (0 or 1)
        ]);
    
        //ghi dữ liệu xuống DB
        $nvhLoaiSanPham = NVH_LOAI_SAN_PHAM::find($request->id);

        $nvhLoaiSanPham->nvhMaLoai = $request->nvhMaLoai;
        $nvhLoaiSanPham->nvhTenLoai = $request->nvhTenLoai;
        $nvhLoaiSanPham->nvhTrangThai = $request->nvhTrangThai;

        $nvhLoaiSanPham->save();

        return redirect()->route('nvhadmins.nvhloaisanpham');
    }

    //view
    public function nvhView($id)
    {
        // Tìm loại sản phẩm theo ID
        $nvhLoaiSanPham = NVH_LOAI_SAN_PHAM::findOrFail($id);
    
        return view('nvhAdmins.nvhLoaiSanPham.View', ['nvhLoaiSanPham' => $nvhLoaiSanPham]);
    }

    public function nvhDelete($id)
    {
        $nvhLoaiSanPham = NVH_LOAI_SAN_PHAM::find($id);
        $nvhLoaiSanPham->delete();
        return redirect()->route('nvhadmins.nvhloaisanpham','Đã xóa sinh viên thành công!');
    }

}