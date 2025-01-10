<?php
use App\Http\Controllers\NVH_LOAI_SAN_PHAMcontroller;
use App\Http\Controllers\NVH_SAN_PHAMController;
use App\Http\Controllers\NVH_KHACH_HANGcontroller;
use App\Http\Controllers\NVH_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\NVH_HOA_DONController;
use App\Http\Controllers\NVH_CT_HOA_DONController;
use App\Http\Controllers\NVH_TIN_TUCController;
use App\Http\Controllers\NVH_LOGIN_USERController;
use App\Http\Controllers\NVH_SIGNUPController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//admins login
use App\Http\Controllers\NVH_QUAN_TRIController;
Route::get('admins/nvh-login',[NVH_QUAN_TRIController::class,'nvhlogin'])->name('admins.nvhlogin');
Route::post('/admins/nvh-login',[NVH_QUAN_TRIController::class,'nvhloginSubmit'])->name('admins.nvhloginSubmit');

# Admin Routes
Route::get('/nvh-admins', function() {
    return view('nvhAdmins.index');
});

#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nvh-admins/nvhdanhsachquantri/nvhdanhmuc', [NVH_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])
->name('nvhAdmins.nvhdanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nvh-admins/nvhdanhsachquantri/nvhtintuc', [NVH_DANH_SACH_QUAN_TRIController::class, 'tintuc'])
->name('nvhAdmins.nvhdanhsachquantri..danhmuc.tintuc'); 
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nvh-admins/nvhdanhsachquantri/nvhsanpham', [NVH_DANH_SACH_QUAN_TRIController::class, 'sanpham'])
->name('nvhAdmins.nvhdanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nvh-admins/nvhdanhsachquantri/nvhmota/{id}', [NVH_DANH_SACH_QUAN_TRIController::class, 'mota'])
->name('nvhAdmins.nvhdanhsachquantri.danhmuc.mota');
#admins -Người dùng-------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nvh-admins/nvhdanhsachquantri/nvhnguoidung', [NVH_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])
->name('nvhAdmins.nvhdanhsachquantri.nguoidung');

//xem loại sản phẩm 
Route::get('/nvh-admins/nvh-loai-san-pham',[NVH_LOAI_SAN_PHAMcontroller::class,'nvhList'])
->name('nvhadmins.nvhloaisanpham');

//thêm loại sản phẩm
Route::get('/nvh-admins/nvh-loai-san-pham/nvh-create',[NVH_LOAI_SAN_PHAMcontroller::class,'nvhCreate'])
->name('nvhadmins.nvhloaisanpham.nvhcreate');
Route::post('/nvh-admins/nvh-loai-san-pham/nvh-create',[NVH_LOAI_SAN_PHAMcontroller::class,'nvhCreateSubmit'])
->name('nvhadmins.nvhloaisanpham.nvhcreatesubmit');

//edit loại sản phẩm
Route::get('/nvh-admins/nvh-loai-san-pham/nvh-edit/{id}',[NVH_LOAI_SAN_PHAMcontroller::class,'nvhEdit'])
->name('nvhadmins.nvhloaisanpham.nvhedit');
Route::post('/nvh-admins/nvh-loai-san-pham/nvh-edit',[NVH_LOAI_SAN_PHAMcontroller::class,'nvhEditSubmit'])
->name('nvhadmins.nvhloaisanpham.nvheditsubmit');

//view
Route::get('/nvh-admins/nvh-loai-san-pham/nvh-view/{id}',[NVH_LOAI_SAN_PHAMcontroller::class,'nvhView'])
->name('nvhadmins.nvhloaisanpham.nvhview');

// delete loại sản phẩm
Route::get('/nvh-admins/nvh-loai-san-pham/nvh-delete/{id}',[NVH_LOAI_SAN_PHAMController::class,'nvhDelete'])
->name('nvhadmins.nvhloaisanpham.nvhdelete');

//sản phẩm

// search
Route::get('/nvh-admins/nvh-san-pham/search', [NVH_SAN_PHAMController::class, 'searchAdmins'])->name('nvhuser.searchAdmins');
// list

Route::get('/nvh-admins/nvh-san-pham',[NVH_SAN_PHAMController::class,'nvhList'])
->name('nvhadims.nvhsanpham');
//thêm loại sản phẩm
Route::get('/nvh-admins/nvh-san-pham/nvh-create',[NVH_SAN_PHAMController::class,'nvhCreate'])
->name('nvhadmins.nvhsanpham.nvhcreate');
Route::post('/nvh-admins/nvh-san-pham/nvh-create',[NVH_SAN_PHAMController::class,'nvhCreateSubmit'])
->name('nvhadmins.nvhsanpham.nvhCreateSubmit');

//xem sản phẩm
Route::get('/nvh-admins/nvh-san-pham/nvh-detail/{id}', [NVH_SAN_PHAMController::class, 'nvhDetail'])
->name('nvhadmins.nvhsanpham.nvhDetail');
// edit
Route::get('/nvh-admins/nvh-san-pham/nvh-edit/{id}', [NVH_SAN_PHAMController::class, 'nvhEdit'])
->name('nvhadmins.nvhsanpham.nvhEdit');
// Xử lý cập nhật sản phẩm
Route::post('/nvh-admins/nvh-san-pham/nvh-edit/{id}', [NVH_SAN_PHAMController::class, 'nvhEditSubmit'])
->name('nvhadmins.nvhsanpham.nvhEditSubmit');
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-san-pham/nvh-delete/{id}', [NVH_SAN_PHAMController::class, 'nvhdelete'])
->name('nvhadmins.nvhsanpham.nvhdelete');

// Khách--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-khach-hang',[NVH_KHACH_HANGcontroller::class,'nvhList'])
->name('nvhadmins.nvhkhachhang');
//detail
Route::get('/nvh-admins/nvh-khach-hang/nvh-detail/{id}', [NVH_KHACH_HANGcontroller::class, 'nvhDetail'])
->name('nvhadmin.nvhkhachhang.nvhDetail');
//create
Route::get('/nvh-admins/nvh-khach-hang/nvh-create',[NVH_KHACH_HANGcontroller::class,'nvhCreate'])
->name('nvhadmin.nvhkhachhang.nvhcreate');
Route::post('/nvh-admins/nvh-khach-hang/nvh-create',[NVH_KHACH_HANGcontroller::class,'nvhCreateSubmit'])
->name('nvhadmin.nvhkhachhang.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-khach-hang/nvh-edit/{id}', [NVH_KHACH_HANGcontroller::class, 'nvhEdit'])
->name('nvhadmin.nvhkhachhang.nvhedit');
Route::post('/nvh-admins/nvh-khach-hang/nvh-edit/{id}', [NVH_KHACH_HANGcontroller::class, 'nvhEditSubmit'])
->name('nvhadmin.nvhkhachhang.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-khach-hang/nvh-delete/{id}', [NVH_KHACH_HANGcontroller::class, 'nvhDelete'])
->name('nvhadmin.nvhkhachhang.nvhdelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-hoa-don',[NVH_HOA_DONController::class,'nvhList'])
->name('nvhadmins.nvhhoadon');
//detail
Route::get('/nvh-admins/nvh-hoa-don/nvh-detail/{id}', [NVH_HOA_DONController::class, 'nvhDetail'])
->name('nvhadmin.nvhhoadon.nvhDetail');
//create
Route::get('/nvh-admins/nvh-hoa-don/nvh-create',[NVH_HOA_DONController::class,'nvhCreate'])
->name('nvhadmin.nvhhoadon.nvhcreate');
Route::post('/nvh-admins/nvh-hoa-don/nvh-create',[NVH_HOA_DONController::class,'nvhCreateSubmit'])
->name('nvhadmin.nvhhoadon.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-hoa-don/nvh-edit/{id}', [NVH_HOA_DONController::class, 'nvhEdit'])
->name('nvhadmin.nvhhoadon.nvhedit');
Route::post('/nvh-admins/nvh-hoa-don/nvh-edit/{id}', [NVH_HOA_DONController::class, 'nvhEditSubmit'])
->name('nvhadmin.nvhhoadon.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-hoa-don/nvh-delete/{id}', [NVH_HOA_DONController::class, 'nvhDelete'])
->name('nvhadmin.nvhhoadon.nvhdelete');

// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-ct-hoa-don',[NVH_CT_HOA_DONController::class,'nvhList'])
->name('nvhadmins.nvhcthoadon');
//detail
Route::get('/nvh-admins/nvh-ct-hoa-don/nvh-detail/{id}', [NVH_CT_HOA_DONController::class, 'nvhDetail'])
->name('nvhadmin.nvhcthoadon.nvhDetail');
//create
Route::get('/nvh-admins/nvh-ct-hoa-don/nvh-create',[NVH_CT_HOA_DONController::class,'nvhCreate'])
->name('nvhadmin.nvhcthoadon.nvhcreate');
Route::post('/nvh-admins/nvh-ct-hoa-don/nvh-create',[NVH_CT_HOA_DONController::class,'nvhCreateSubmit'])
->name('nvhadmin.nvhcthoadon.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-ct-hoa-don/nvh-edit/{id}', [NVH_CT_HOA_DONController::class, 'nvhEdit'])
->name('nvhadmin.nvhcthoadon.nvhedit');
Route::post('/nvh-admins/nvh-ct-hoa-don/nvh-edit/{id}', [NVH_CT_HOA_DONController::class, 'nvhEditSubmit'])
->name('nvhadmin.nvhcthoadon.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-ct-hoa-don/nvh-delete/{id}', [NVH_CT_HOA_DONController::class, 'nvhDelete'])
->name('nvhadmin.nvhcthoadon.nvhdelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-quan-tri',[NVH_QUAN_TRIController::class,'nvhList'])
->name('nvhadmins.nvhquantri');
//detail
Route::get('/nvh-admins/nvh-quan-tri/nvh-detail/{id}', [NVH_QUAN_TRIController::class, 'nvhDetail'])
->name('nvhadmin.nvhquantri.nvhDetail');
//create
Route::get('/nvh-admins/nvh-quan-tri/nvh-create',[NVH_QUAN_TRIController::class,'nvhCreate'])
->name('nvhadmin.nvhquantri.nvhcreate');
Route::post('/nvh-admins/nvh-quan-tri/nvh-create',[NVH_QUAN_TRIController::class,'nvhCreateSubmit'])
->name('nvhadmin.nvhquantri.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-quan-tri/nvh-edit/{id}', [NVH_QUAN_TRIController::class, 'nvhEdit'])
->name('nvhadmin.nvhquantri.nvhedit');
Route::post('/nvh-admins/nvh-quan-tri/nvh-edit/{id}', [NVH_QUAN_TRIController::class, 'nvhEditSubmit'])
->name('nvhadmin.nvhquantri.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-quan-tri/nvh-delete/{id}', [NVH_QUAN_TRIController::class, 'nvhDelete'])
->name('nvhadmin.nvhquantri.nvhdelete');

// Tin Tức--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-tin-tuc',[NVH_TIN_TUCController::class,'nvhList'])
->name('nvhadmins.nvhtintuc');
//detail
Route::get('/nvh-admins/nvh-tin-tuc/nvh-detail/{id}', [NVH_TIN_TUCController::class, 'nvhDetail'])
->name('nvhadmin.nvhtintuc.nvhDetail');
//create
Route::get('/nvh-admins/nvh-tin-tuc/nvh-create',[NVH_TIN_TUCController::class,'nvhCreate'])
->name('nvhadmin.nvhtintuc.nvhcreate');
Route::post('/nvh-admins/nvh-tin-tuc/nvh-create',[NVH_TIN_TUCController::class,'nvhCreateSubmit'])
->name('nvhadmin.nvhtintuc.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-tin-tuc/nvh-edit/{id}', [NVH_TIN_TUCController::class, 'nvhEdit'])
->name('nvhadmin.nvhtintuc.nvhedit');
Route::post('/nvh-admins/nvh-tin-tuc/nvh-edit/{id}', [NVH_TIN_TUCController::class, 'nvhEditSubmit'])
->name('nvhadmin.nvhtintuc.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-tin-tuc/nvh-delete/{id}', [NVH_TIN_TUCController::class, 'nvhDelete'])
->name('nvhadmin.nvhtintuc.nvhdelete');


 

use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/nvh-user', [HomeController::class, 'index'])->name('nvhuser.home');
Route::get('/nvh-user1', [HomeController::class, 'index1'])->name('nvhuser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/nvh-user/show/{id}', [HomeController::class, 'show'])->name('nvhuser.show');
// search
Route::get('/search', [NVH_SAN_PHAMController::class, 'search'])->name('nvhuser.search');
Route::get('/search1', [NVH_SAN_PHAMController::class, 'search1'])->name('nvhuser.search1');

Route::get('/nvhuser/login', [NVH_LOGIN_USERController::class, 'nvhLogin'])->name('nvhuser.login');
Route::post('/nvhuser/login', [NVH_LOGIN_USERController::class, 'nvhLoginSubmit'])->name('nvhuser.nvhLoginSubmit');
Route::get('/nvhuser/logout', [NVH_LOGIN_USERController::class, 'nvhLogout'])->name('nvhuser.logout');


// hỗ trợ 
route::get('/nvh-user/support',function()
{
    return view('nvhuser.support');
});

// signup
Route::get('/nvh-user/signup', [NVH_SIGNUPController::class, 'nvhsignup'])->name('nvhuser.nvhsignup');
Route::post('/nvh-user/signup', [NVH_SIGNUPController::class, 'nvhsignupSubmit'])->name('nvhuser.nvhsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/nvh-user/thanvhoan/{product_id}', [NVH_CT_HOA_DONController::class, 'nvhthanvhoan'])->name('nvhuser.nvhthanvhoan');

// Route để xử lý thanh toán
Route::post('/nvh-user/thanvhoan', [NVH_CT_HOA_DONController::class, 'storeThanvhoan'])->name('nvhuser.storeThanvhoan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [NVH_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [NVH_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [NVH_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [NVH_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [NVH_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [NVH_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng
// giỏ hàng
use App\Http\Controllers\CartController;

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// liên hệ (_menu) 
route::get('/nvhuser-lienhe',function(){
    return view('nvhuser.lienhe');
})->name('nvhuser.lienhe');
// giới thiệt (_menu) 
route::get('/nvhuser-gioithieu',function(){
    return view('nvhuser.gioithieu');
})->name('nvhuser.gioithieu');