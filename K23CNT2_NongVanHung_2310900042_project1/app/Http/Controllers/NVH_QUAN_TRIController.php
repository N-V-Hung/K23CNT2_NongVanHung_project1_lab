<?php

namespace App\Http\Controllers;

use App\Models\NVH_QUAN_TRI; // Sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 

class NVH_QUAN_TRIController extends Controller
{
    // get login
    public function nvhlogin()
    {
        return view('nvhlogin.nvh-login');
    }

    // post login
    public function nvhloginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'nvhTaiKhoan' => 'required|string',
            'nvhMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng NVH_QUAN_TRI
        $user = NVH_QUAN_TRI::where('nvhTaiKhoan', $request->nvhTaiKhoan)->first(); // Sửa lại ở đây

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->nvhMatKhau, $user->nvhMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->nvhTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/nvh-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['nvhMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    // Lấy tất cả quản trị viên
    public function nvhlist()
    {
        $nvhquantris = NVH_QUAN_TRI::all(); // Sử dụng Model NVH_QUAN_TRI
        return view('nvhAdmins.nvhquantri.nvh-list', ['nvhquantris' => $nvhquantris]);
    }

    // Lấy chi tiết quản trị viên
    public function nvhDetail($id)
    {
        $nvhquantri = NVH_QUAN_TRI::where('id', $id)->first(); // Sử dụng Model NVH_QUAN_TRI
        return view('nvhAdmins.nvhquantri.nvh-detail', ['nvhquantri' => $nvhquantri]);
    }

    // Hiển thị form thêm mới quản trị viên
    public function nvhCreate()
    {
        return view('nvhAdmins.nvhquantri.nvh-create');
    }

    // Xử lý form thêm mới quản trị viên
    public function nvhCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nvhTaiKhoan' => 'required|string|unique:NVH_quan_tri,nvhTaiKhoan',
            'nvhMatKhau' => 'required|string|min:6',
            'nvhTrangThai' => 'required|in:0,1',
        ]);

        // Tạo bản ghi mới trong cơ sở dữ liệu
        $nvhquantri = new NVH_QUAN_TRI(); // Sử dụng Model NVH_QUAN_TRI
        $nvhquantri->nvhTaiKhoan = $request->nvhTaiKhoan;
        $nvhquantri->nvhMatKhau = Hash::make($request->nvhMatKhau); // Mã hóa mật khẩu
        $nvhquantri->nvhTrangThai = $request->nvhTrangThai;
        $nvhquantri->save(); // Lưu bản ghi vào cơ sở dữ liệu

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('nvhadmins.nvhquantri')->with('success', 'Thêm quản trị viên thành công');
    }

    // Hiển thị form chỉnh sửa quản trị viên
    public function nvhEdit($id)
    {
        $nvhquantri = NVH_QUAN_TRI::find($id); // Sử dụng phương thức find của Model
        if (!$nvhquantri) {
            return redirect()->route('nvhadmins.nvhquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        return view('nvhAdmins.nvhquantri.nvh-edit', ['nvhquantri' => $nvhquantri]);
    }

    // Xử lý form chỉnh sửa quản trị viên
    public function nvhEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nvhTaiKhoan' => 'required|string|unique:NVH_quan_tri,nvhTaiKhoan,' . $id,
            'nvhMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
            'nvhTrangThai' => 'required|in:0,1',
        ]);

        // Lấy quản trị viên cần sửa
        $nvhquantri = NVH_QUAN_TRI::find($id); // Sử dụng phương thức find của Model
        if (!$nvhquantri) {
            return redirect()->route('nvhadmins.nvhquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }

        // Cập nhật thông tin
        $nvhquantri->nvhTaiKhoan = $request->nvhTaiKhoan;
        if ($request->nvhMatKhau) {
            $nvhquantri->nvhMatKhau = Hash::make($request->nvhMatKhau); // Cập nhật mật khẩu nếu có
        }
        $nvhquantri->nvhTrangThai = $request->nvhTrangThai;
        $nvhquantri->save(); // Lưu lại thay đổi

        return redirect()->route('nvhadmins.nvhquantri')->with('success', 'Cập nhật quản trị viên thành công');
    }

    // Xóa quản trị viên
    public function nvhDelete($id)
    {
        $nvhquantri = NVH_QUAN_TRI::find($id); // Sử dụng phương thức find của Model
        if (!$nvhquantri) {
            return redirect()->route('nvhadmins.nvhquantri')->with('error', 'Không tìm thấy quản trị viên!');
        }
        $nvhquantri->delete(); // Xóa bản ghi

        return redirect()->route('nvhadmins.nvhquantri')->with('success', 'Xóa quản trị viên thành công');
    }
}
