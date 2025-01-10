<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\NVH_SAN_PHAM; 
use App\Models\NVH_KHACH_HANG; 
use App\Models\NVH_TIN_TUC; 

class NVH_DANH_SACH_QUAN_TRIController extends Controller
{
    // Danh mục
    public function danhmuc()
    {
        // Truy vấn số lượng sản phẩm
        $productCount = NVH_SAN_PHAM::count();
    
        // Truy vấn số lượng người dùng
        $userCount = NVH_KHACH_HANG::count();
        $ttCount = NVH_TIN_TUC::count();

    
        // Trả về view và truyền cả productCount và userCount
        return view('nvhAdmins.nvhdanhsachquantri.nvhdanhmuc', compact('productCount', 'userCount','ttCount'));
    }

    public function nguoidung()
    {
        $nvhnguoidung = NVH_KHACH_HANG::all();
    
        // Chuyển đổi nvhNgayDangKy thành đối tượng Carbon thủ công
        foreach ($nvhnguoidung as $user) {
            // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
            $user->nvhNgayDangKy = Carbon::parse($user->nvhNgayDangKy);
        }
    
        return view('nvhAdmins.nvhdanhsachquantri.nvhdanhmuc.nvhnguoidung', ['nvhnguoidung' => $nvhnguoidung]);
    } 
    

    public function tintuc()
    {
        // Retrieve all news articles from the database (assuming you have a model named NVH_TIN_TUC)
        $nvhtintucs = NVH_TIN_TUC::all();  // Fetching all articles
    
        // Loop through articles and add the full URL to the image
        foreach ($nvhtintucs as $article) {
            // Assuming nvhHinhAnh stores the image name, we'll prepend the 'public/storage' path
            $article->image_url = asset('storage/' . $article->nvhHinhAnh);
        }
    
        // Return the view and pass the articles to it
        return view('nvhAdmins.nvhdanhsachquantri.nvhdanhmuc.nvhtintuc', [
            'nvhtintucs' => $nvhtintucs, // Passing the news articles to the view
        ]);
    }
    


// Hiển thị danh sách sản phẩm
public function sanpham()
{
    $nvhsanphams = NVH_SAN_PHAM::all(); // Lấy tất cả sản phẩm
    return view('nvhAdmins.nvhdanhsachquantri.nvhdanhmuc.nvhsanpham', ['nvhsanphams' => $nvhsanphams]);
}

// Hiển thị mô tả chi tiết sản phẩm
public function mota($id)
{
    // Lấy sản phẩm theo id
    $product = NVH_SAN_PHAM::find($id);
    
    // Kiểm tra nếu sản phẩm không tồn tại
    if (!$product) {
        return redirect()->route('nvhAdmins.nvhdanhsachquantri.danhmuc.sanpham')
                         ->with('error', 'Sản phẩm không tồn tại.');
    }

    // Trả về view với thông tin sản phẩm
    return view('nvhAdmins.nvhdanhsachquantri.nvhdanhmuc.nvhmota', ['product' => $product]);
}
}
