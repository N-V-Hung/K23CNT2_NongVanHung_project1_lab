<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NVH_KHACH_HANG; 
class NVH_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function nvhList()
    {
        $khachhangs = NVH_KHACH_HANG::all();
        return view('nvhAdmins.nvhkhachhang.nvh-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function nvhDetail($id)
    {
        $nvhkhachhang = NVH_KHACH_HANG::where('id',$id)->first();
        return view('nvhAdmins.nvhkhachhang.nvh-detail',['nvhkhachhang'=>$nvhkhachhang]);
    }
    // create
    public function nvhCreate()
    {
        return view('nvhAdmins.nvhkhachhang.nvh-create');
    }
    //post
    public function nvhCreateSubmit(Request $request)
    {
    $validate = $request->validate([
        'nvhMaKhachHang' => 'required|unique:NVH_khach_hang,nvhMaKhachHang',
        'nvhHoTenKhachHang' => 'required|string',
        'nvhEmail' => 'required|email|unique:NVH_khach_hang,nvhEmail',
        'nvhMatKhau' => 'required|min:6',
        'nvhDienThoai' => 'required|numeric|unique:NVH_khach_hang,nvhDienThoai',
        'nvhDiaChi' => 'required|string',
        'nvhNgayDangKy' => 'required|date',
        'nvhTrangThai' => 'required|in:0,1,2',
        ]);

    $nvhkhachhang = new NVH_KHACH_HANG;
    $nvhkhachhang->nvhMaKhachHang = $request->nvhMaKhachHang;
    $nvhkhachhang->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
    $nvhkhachhang->nvhEmail = $request->nvhEmail;
    $nvhkhachhang->nvhMatKhau = bcrypt($request->nvhMatKhau); // Mã hóa mật khẩu
    $nvhkhachhang->nvhDienThoai = $request->nvhDienThoai;
    $nvhkhachhang->nvhDiaChi = $request->nvhDiaChi;
    $nvhkhachhang->nvhNgayDangKy = $request->nvhNgayDangKy;
    $nvhkhachhang->nvhTrangThai = $request->nvhTrangThai;

    $nvhkhachhang->save();

    return redirect()->route('nvhadmins.nvhkhachhang')->with('success', 'Tạo khách hàng thành công!');
    }


    // edit
    public function nvhEdit($id)
    {
        // Lấy khách hàng theo id
        $nvhkhachhang = NVH_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nvhkhachhang) {
            return redirect()->route('nvhadmins.nvhkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('nvhAdmins.nvhkhachhang.nvh-edit', ['nvhkhachhang' => $nvhkhachhang]);
    }
    
    public function nvhEditSubmit(Request $request, $id)
    {
    $validate = $request->validate([
        'nvhMaKhachHang' => 'required|unique:NVH_khach_hang,nvhMaKhachHang,' . $id,
        'nvhHoTenKhachHang' => 'required|string',
        'nvhEmail' => 'required|email|unique:NVH_khach_hang,nvhEmail,' . $id,
        'nvhMatKhau' => 'nullable|min:6',
        'nvhDienThoai' => 'required|numeric|unique:NVH_khach_hang,nvhDienThoai,' . $id,
        'nvhDiaChi' => 'required|string',
        'nvhNgayDangKy' => 'required|date',
        'nvhTrangThai' => 'required|in:0,1,2',
    ]);

    $nvhkhachhang = NVH_KHACH_HANG::where('id', $id)->first();

    if (!$nvhkhachhang) {
        return redirect()->route('nvhadmins.nvhkhachhang')->with('error', 'Khách hàng không tồn tại!');
    }

    $nvhkhachhang->nvhMaKhachHang = $request->nvhMaKhachHang;
    $nvhkhachhang->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
    $nvhkhachhang->nvhEmail = $request->nvhEmail;

    if ($request->nvhMatKhau) {
        $nvhkhachhang->nvhMatKhau = bcrypt($request->nvhMatKhau); // Mã hóa mật khẩu nếu có thay đổi
    }

    $nvhkhachhang->nvhDienThoai = $request->nvhDienThoai;
    $nvhkhachhang->nvhDiaChi = $request->nvhDiaChi;
    $nvhkhachhang->nvhNgayDangKy = $request->nvhNgayDangKy;
    $nvhkhachhang->nvhTrangThai = $request->nvhTrangThai;

    $nvhkhachhang->save();

    return redirect()->route('nvhadmins.nvhkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    //delete
    public function nvhDelete($id)
    {
        NVH_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}