<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NVH_HOA_DON; 
use App\Models\NVH_KHACH_HANG; 
use App\Models\NVH_SAN_PHAM; 
class NVH_HOA_DONController extends Controller
{
    //
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = NVH_HOA_DON::findOrFail($hoaDonId);
        $sanPham = NVH_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('nvhuser.hoadonshow', compact('hoaDon','sanPham'));
    }


      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nvhList()
    {
        $nvhhoadons = NVH_HOA_DON::all();
        return view('nvhAdmins.nvhhoadon.nvh-list',['nvhhoadons'=>$nvhhoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nvhDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nvhhoadon = NVH_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nvhAdmins.nvhhoadon.nvh-detail', ['nvhhoadon' => $nvhhoadon]);
    }
    // create
    public function nvhCreate()
    {
        $nvhkhachhang = NVH_KHACH_HANG::all();
        return view('nvhAdmins.nvhhoadon.nvh-create',['nvhkhachhang'=>$nvhkhachhang]);
    }
    //post
    public function nvhCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'nvhMaHoaDon' => 'required|unique:NVH_hoa_don,nvhMaHoaDon',
            'nvhMaKhachHang' => 'required|exists:NVH_khach_hang,id',
            'nvhNgayHoaDon' => 'required|date',  
            'nvhNgayNhan' => 'required|date',
            'nvhHoTenKhachHang' => 'required|string',  
            'nvhEmail' => 'required|email',
            'nvhDienThoai' => 'required|numeric',  
            'nvhDiaChi' => 'required|string',  
            'nvhTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'nvhTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $nvhhoadon = new NVH_HOA_DON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nvhhoadon->nvhMaHoaDon = $request->nvhMaHoaDon;
        $nvhhoadon->nvhMaKhachHang = $request->nvhMaKhachHang;  // Giả sử đây là khóa ngoại
        $nvhhoadon->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
        $nvhhoadon->nvhEmail = $request->nvhEmail;
        $nvhhoadon->nvhDienThoai = $request->nvhDienThoai;
        $nvhhoadon->nvhDiaChi = $request->nvhDiaChi;
        
        // Lưu 'nvhTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nvhhoadon->nvhTongGiaTri = (double) $request->nvhTongGiaTri; // Chuyển đổi sang double
        
        $nvhhoadon->nvhTrangThai = $request->nvhTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nvhhoadon->nvhNgayHoaDon = $request->nvhNgayHoaDon;
        $nvhhoadon->nvhNgayNhan = $request->nvhNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nvhhoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('nvhadmins.nvhhoadon');
    }
    


    public function nvhEdit($id)
    {
        $nvhhoadon = NVH_HOA_DON::where('id', $id)->first();
        $nvhkhachhang = NVH_KHACH_HANG::all();
        return view('nvhAdmins.nvhhoadon.nvh-edit',['nvhkhachhang'=>$nvhkhachhang,'nvhhoadon'=>$nvhhoadon]);
    }
    //post
    public function nvhEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'nvhMaHoaDon' => 'required|unique:NVH_hoa_don,nvhMaHoaDon,'. $id,
            'nvhMaKhachHang' => 'required|exists:NVH_khach_hang,id',
            'nvhNgayHoaDon' => 'required|date',  
            'nvhNgayNhan' => 'required|date',
            'nvhHoTenKhachHang' => 'required|string',  
            'nvhEmail' => 'required|email',
            'nvhDienThoai' => 'required|numeric',  
            'nvhDiaChi' => 'required|string',  
            'nvhTongGiaTri' => 'required|numeric', 
            'nvhTrangThai' => 'required|in:0,1,2',
        ]);
    
        $nvhhoadon = NVH_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nvhhoadon->nvhMaHoaDon = $request->nvhMaHoaDon;
        $nvhhoadon->nvhMaKhachHang = $request->nvhMaKhachHang;  // Giả sử đây là khóa ngoại
        $nvhhoadon->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
        $nvhhoadon->nvhEmail = $request->nvhEmail;
        $nvhhoadon->nvhDienThoai = $request->nvhDienThoai;
        $nvhhoadon->nvhDiaChi = $request->nvhDiaChi;
        
        // Lưu 'nvhTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nvhhoadon->nvhTongGiaTri = (double) $request->nvhTongGiaTri; // Chuyển đổi sang double
        
        $nvhhoadon->nvhTrangThai = $request->nvhTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nvhhoadon->nvhNgayHoaDon = $request->nvhNgayHoaDon;
        $nvhhoadon->nvhNgayNhan = $request->nvhNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nvhhoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('nvhadmins.nvhhoadon');
    }
    
        //delete
        public function nvhDelete($id)
        {
            NVH_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}