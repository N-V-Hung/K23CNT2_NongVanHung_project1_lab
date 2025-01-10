<?php

namespace App\Http\Controllers;

use App\Models\NVH_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NVH_SIGNUPController extends Controller
{
     // Show the form to create a new customer
     public function nvhsignup()
     {
         return view('nvhuser.signup');
     }
 
     // Handle the form submission and store customer data
     public function nvhsignupSubmit(Request $request)
     {
         // Validate the input data
         $request->validate([
             'nvhHoTenKhachHang' => 'required|string|max:255',
             'nvhEmail' => 'required|email|unique:NVH_khach_hang,nvhEmail',
             'nvhMatKhau' => 'required|min:6',
             'nvhDienThoai' => 'required|numeric|unique:NVH_khach_hang,nvhDienThoai',
             'nvhDiaChi' => 'required|string|max:255',
         ]);
 
         // Generate a new customer ID (nvhMaKhachHang)
         $lastCustomer = NVH_KHACH_HANG::latest('nvhMaKhachHang')->first(); // Get the latest customer to determine the next ID
     
         // If no customers exist, start with KH001
         if ($lastCustomer) {
             $newCustomerID = 'KH' . str_pad((substr($lastCustomer->nvhMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
         } else {
             $newCustomerID = 'KH001'; // First customer will be KH001
         }
     
         // Create a new customer record
         $nvhkhachhang = new NVH_KHACH_HANG;
         $nvhkhachhang->nvhMaKhachHang = $newCustomerID; // Automatically generated ID
         $nvhkhachhang->nvhHoTenKhachHang = $request->nvhHoTenKhachHang;
         $nvhkhachhang->nvhEmail = $request->nvhEmail;
         $nvhkhachhang->nvhMatKhau = $request->nvhMatKhau; // Encrypt the password
         $nvhkhachhang->nvhDienThoai = $request->nvhDienThoai;
         $nvhkhachhang->nvhDiaChi = $request->nvhDiaChi;
         $nvhkhachhang->nvhNgayDangKy = now(); // Set the current timestamp for registration date
         $nvhkhachhang->nvhTrangThai = 0; // Set the default value for nvhTrangThai to 0 (inactive or unverified)
     
         // Save the new customer data
         try {
             $nvhkhachhang->save();
             // Redirect to login page on success with a success message
             return redirect()->route('nvhuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
         } catch (\Exception $e) {
             // In case of error, return to the previous page with an error message
             return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
         }
     }
}