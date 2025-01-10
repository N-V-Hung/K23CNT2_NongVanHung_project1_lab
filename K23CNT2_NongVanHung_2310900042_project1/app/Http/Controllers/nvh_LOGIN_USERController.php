<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NVH_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class NVH_LOGIN_USERController extends Controller
{
     // Show login form
     public function nvhLogin()
     {
         return view('nvhuser.login');
     }
 
     // Handle login form submission
    // Handle login form submission
    public function nvhLoginSubmit(Request $request)
{
    // Validate the input data
    $request->validate([
        'nvhEmail' => 'required|email',
        'nvhMatKhau' => 'required|string',
    ]);

    // Tìm người dùng theo email
    $user = NVH_KHACH_HANG::where('nvhEmail', $request->nvhEmail)->first();

    // Xóa giỏ hàng trong session khi đăng nhập
    Session::forget('cart');

    // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($request->nvhMatKhau, $user->nvhMatKhau)) {
        // Kiểm tra trạng thái tài khoản
        if ($user->nvhTrangThai == 2) {
            // Tài khoản bị khóa
            return redirect()->back()->withErrors(['nvhEmail' => 'Tài khoản của bạn đã bị khóa.']);
        } elseif ($user->nvhTrangThai == 1) {
            // Tài khoản bị tạm khóa
            return redirect()->back()->withErrors(['nvhEmail' => 'Tài khoản của bạn đã bị tạm khóa.']);
        }

        // Đăng nhập người dùng
        Auth::login($user);

        // Lưu thông tin người dùng vào session
        Session::put('user_id', $user->id);
        Session::put('username1', $user->nvhHoTenKhachHang);  // Lưu tên người dùng
        Session::put('nvhEmail', $user->nvhEmail);  // Lưu email
        Session::put('nvhDienThoai', $user->nvhDienThoai);  // Lưu số điện thoại
        Session::put('nvhDiaChi', $user->nvhDiaChi);  // Lưu địa chỉ
        Session::put('nvhMaKhachHang', $user->nvhMaKhachHang);  // Lưu mã khách hàng

        // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
        return redirect()->route('nvhuser.home1')->with('message', 'Đăng Nhập Thành Công');
    } else {
        // Nếu thông tin không chính xác, trả về lỗi
        return redirect()->back()->withErrors(['nvhEmail' => 'Email hoặc Mật khẩu không đúng']);
    }
}


 public function logout()
 {
     // Xóa giỏ hàng khỏi session
     Session::forget('cart');
     
     // Đăng xuất người dùng
     Auth::logout();
 
     // Chuyển hướng về trang đăng nhập
     return redirect()->route('nvhuser.login')->with('message', 'Bạn đã đăng xuất thành công.');
 }
}
