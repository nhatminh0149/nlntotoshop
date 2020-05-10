<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\KhachHang;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

// route Danh mục Nhà cung cấp

Route::get('/admin/danhsachnhacungcap/index', 'NhaCungCapController@index')->name('danhsachnhacungcap.index');
Route::get('/admin/danhsachnhacungcap/create', 'NhaCungCapController@create')->name('danhsachnhacungcap.create');
// Route::post('/admin/danhsachnhacungcap/store', 'NhaCungCapController@store')->name('danhsachnhacungcap.store');
// Route::get('/admin/danhsachnhacungcap/edit/{id}', 'NhaCungCapController@edit')->name('danhsachnhacungcap.edit');
// Route::put('/admin/danhsachnhacungcap/update/{id}', 'NhaCungCapController@update')->name('danhsachnhacungcap.update');

Route::resource('/admin/danhsachnhacungcap', 'NhaCungCapController');

// route Danh mục Loại Sản phẩm
Route::get('/admin/danhsachloaisanpham/index', 'LoaiSanPhamController@index')->name('danhsachloaisanpham.index');
Route::get('/admin/danhsachloaisanpham/create', 'LoaiSanPhamController@create')->name('danhsachloaisanpham.create');
Route::post('/admin/danhsachloaisanpham/store', 'LoaiSanPhamController@store')->name('danhsachloaisanpham.store');
Route::get('/admin/danhsachloaisanpham/edit{id}', 'LoaiSanPhamController@edit')->name('danhsachloaisanpham.edit');
Route::resource('/admin/danhsachloaisanpham', 'LoaiSanPhamController');



// route Danh mục Sản phẩm
Route::get('/admin/danhsachsanpham/index', 'SanPhamController@index')->name('danhsachsanpham.index');
Route::get('/admin/danhsachsanpham/create', 'SanPhamController@create')->name('danhsachsanpham.create');
Route::resource('/admin/danhsachsanpham', 'SanPhamController');

// route Danh mục Khách hàng
Route::get('/admin/danhsachkhachhang/index', 'KhachHangController@index')->name('danhsachkhachhang.index');
Route::get('/admin/danhsachkhachhang/create', 'KhachHangController@create')->name('danhsachkhachhang.create');
Route::resource('/admin/danhsachkhachhang', 'KhachHangController');

// route Danh mục Hình thức vận chuyển
Route::get('/admin/danhsachhinhthucvanchuyen/index', 'HinhThucVanChuyenController@index')->name('danhsachhinhthucvanchuyen.index');
Route::get('/admin/danhsachhinhthucvanchuyen/create', 'HinhThucVanChuyenController@create')->name('danhsachhinhthucvanchuyen.create');
Route::resource('/admin/danhsachhinhthucvanchuyen', 'HinhThucVanChuyenController');

// route Danh mục Đơn đặt hàng
Route::get('/admin/danhsachdondathang/index', 'DonDatHangController@index')->name('danhsachdondathang.index');
Route::get('/admin/danhsachdondathang/active{id}', 'DonDatHangController@active')->name('danhsachdondathang.active');
Route::resource('/admin/danhsachdondathang', 'DonDatHangController');

// Tạo route Thống kê, Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', 'BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'BaoCaoController@donhangData')->name('backend.baocao.donhang.data');
Route::get('/admin/baocao/donhang/spbanchay', 'BaoCaoController@donhangSpbanchay')->name('backend.baocao.donhang.spbanchay');


// Route::get('/', function (){
//     return view('frontend/index');
// });

// Gọi hàm đăng ký các route dành cho Quản lý Xác thực tài khoản (Đăng nhập, Đăng xuất, Đăng ký)
// các route trong file `vendor\laravel\framework\src\Illuminate\Routing\Router.php`, hàm auth()
// Auth::routes();

//Thực hiện tạo giao diện trang chủ Frontend
Route::get('/', 'FrontendController@index')->name('frontend.home');

//Thực hiện tạo giao diện About - giới thiệu
Route::get('/gioi-thieu', 'FrontendController@about')->name('frontend.about');

//Thực hiện tạo giao diện About - giới thiệu
Route::get('/lien-he', 'FrontendController@contact')->name('frontend.contact');

// Tạo route sendMailContactForm
Route::post('/lien-he/goi-loi-nhan', 'FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');

//Tạo trang danh sách Sản phẩm (product)
Route::get('/san-pham', 'FrontendController@product')->name('frontend.product');

//Tạo trang danh sách Sản phẩm (product) theo loại
Route::get('/loai-san-pham/{type}', 'FrontendController@getLoaiSp')->name('loaisanpham');

//Tạo trang Chi tiết Sản phẩm (product-detail)
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');

//Tạo trang thanh toán (checkout)
//Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');

//Tạo đơn hàng và gởi mail xác nhận
Route::get('/gio-hang', 'FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'FrontendController@orderFinish')->name('frontend.orderFinish');

//Khách hàng đăng nhập tài khoản
Route::get('/dang-nhap', 'FrontendController@getLogin')->name('frontend.login');
Route::post('/dang-nhap', 'FrontendController@postLogin')->name('frontend.login');

//Khách hàng đăng ký tài khoản
Route::get('/dang-ky', 'FrontendController@getRegister')->name('frontend.register');
Route::post('/dang-ky', 'FrontendController@postRegister')->name('frontend.register');

//Thực hiện Đăng xuất
Route::get('/log-out', 'FrontendController@postLogout')->name('frontend.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');