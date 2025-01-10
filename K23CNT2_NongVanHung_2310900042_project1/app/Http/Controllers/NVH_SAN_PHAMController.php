<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NVH_SAN_PHAM; 
use App\Models\NVH_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class NVH_SAN_PHAMController extends Controller
{
     // In your controller
     public function search(Request $request)
     {
         // Lấy từ khóa tìm kiếm từ input của người dùng
         $search = $request->input('search');
     
         // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
         if ($search) {
             // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
             $products = NVH_SAN_PHAM::where('nvhTenSanPham', 'like', '%' . $search . '%')->paginate(10);
         } else {
             // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
             $products = NVH_SAN_PHAM::paginate(10);
         }
     
         // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
         return view('nvhuser.search', compact('products', 'search'));
     }
 
     public function search1(Request $request)
     {
         // Lấy từ khóa tìm kiếm từ input của người dùng
         $search = $request->input('search');
     
         // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
         if ($search) {
             // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
             $products = NVH_SAN_PHAM::where('nvhTenSanPham', 'like', '%' . $search . '%')->paginate(10);
         } else {
             // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
             $products = NVH_SAN_PHAM::paginate(10);
         }
     
         // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
         return view('nvhuser.search1', compact('products', 'search'));
     }
 
 
     // search sap pham admin
     public function searchAdmins(Request $request)
     {
         // Lấy từ khóa tìm kiếm từ input của người dùng
         $search = $request->input('search');
     
         // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
         if ($search) {
             // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
             $products = NVH_SAN_PHAM::where('nvhTenSanPham', 'like', '%' . $search . '%')->paginate(10);
         } else {
             // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
             $products = NVH_SAN_PHAM::paginate(10);
         }
     
         // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
         return view('nvhAdmins.nvhsanpham.nvh-search', compact('products', 'search'));
     }
 


     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nvhList()
    {
        $nvhsanphams = NVH_SAN_PHAM::where('nvhTrangThai',0)->get();
        return view('nvhAdmins.nvhsanpham.nvh-list',['nvhsanphams'=>$nvhsanphams]);
    } 
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nvhDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nvhsanpham = NVH_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nvhAdmins.nvhsanpham.nvh-detail', ['nvhsanpham' => $nvhsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function nvhCreate()
      {
            // đọc dữ liệu từ NVH_LOAI_SAN_PHAM
            $nvhloaisanpham = NVH_LOAI_SAN_PHAM::all();
          return view('nvhAdmins.nvhsanpham.nvh-create',['nvhloaisanpham'=>$nvhloaisanpham]);
      }
     

     // Controller
public function nvhCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'nvhMaSanPham' => 'required|unique:NVH_SAN_PHAM,nvhMaSanPham',
        'nvhTenSanPham' => 'required|string|max:255',
        'nvhHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'nvhSoLuong' => 'required|numeric|min:1',
        'nvhDonGia' => 'required|numeric',
        'nvhMaLoai' => 'required|exists:NVH_LOAI_SAN_PHAM,id',
        'nvhTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng NVH_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $nvhsanpham = new NVH_SAN_PHAM;
    $nvhsanpham->nvhMaSanPham = $request->nvhMaSanPham;
    $nvhsanpham->nvhTenSanPham = $request->nvhTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('nvhHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('nvhHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->nvhMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $nvhsanpham->nvhHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $nvhsanpham->nvhSoLuong = $request->nvhSoLuong;
    $nvhsanpham->nvhDonGia = $request->nvhDonGia;
    $nvhsanpham->nvhMaLoai = $request->nvhMaLoai;
    $nvhsanpham->nvhTrangThai = $request->nvhTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $nvhsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('nvhadims.nvhsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function nvhdelete($id)
{
    NVH_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function nvhEdit($id)
    {
       // Tìm sản phẩm theo ID
    $nvhsanpham = NVH_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng NVH_LOAI_SAN_PHAM
    $nvhloaisanpham = NVH_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('nvhAdmins.nvhsanpham.nvh-edit', [
        'nvhsanpham' => $nvhsanpham,
        'nvhloaisanpham' => $nvhloaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function nvhEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'nvhMaSanPham' => 'required|max:20',
        'nvhTenSanPham' => 'required|max:255',
        'nvhHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nvhSoLuong' => 'required|integer',
        'nvhDonGia' => 'required|numeric',
        'nvhMaLoai' => 'required|max:10',
        'nvhTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $nvhsanpham = NVH_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $nvhsanpham->nvhMaSanPham = $request->nvhMaSanPham;
    $nvhsanpham->nvhTenSanPham = $request->nvhTenSanPham;
    $nvhsanpham->nvhSoLuong = $request->nvhSoLuong;
    $nvhsanpham->nvhDonGia = $request->nvhDonGia; 
    $nvhsanpham->nvhMaLoai = $request->nvhMaLoai;
    $nvhsanpham->nvhTrangThai = $request->nvhTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('nvhHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($nvhsanpham->nvhHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $nvhsanpham->nvhHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $nvhsanpham->nvhHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('nvhHinhAnh')->store('img/san_pham', 'public');
        $nvhsanpham->nvhHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $nvhsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('nvhadims.nvhsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}