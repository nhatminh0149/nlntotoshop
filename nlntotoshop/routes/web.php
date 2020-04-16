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

// route Danh mục Kích cỡ sản phẩm
Route::get('/admin/danhsachkichcosanpham/index', 'KichCoSanPhamController@index')->name('danhsachkichcosanpham.index');
Route::get('/admin/danhsachkichcosanpham/create', 'KichCoSanPhamController@create')->name('danhsachkichcosanpham.create');
Route::resource('/admin/danhsachkichcosanpham', 'KichCoSanPhamController');

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
Route::get('/admin/danhsachdondathang/edit{id}', 'DonDatHangController@edit')->name('danhsachdondathang.edit');
Route::resource('/admin/danhsachdondathang', 'DonDatHangController');


// Route::get('/', function (){
//     return view('frontend/index');
// });


//Thực hiện tạo giao diện trang chủ Frontend
Route::get('/', 'FrontendController@index')->name('frontend.home');

//Tạo trang danh sách Sản phẩm (product)
Route::get('/san-pham', 'FrontendController@product')->name('frontend.product');

//Tạo trang danh sách Sản phẩm (product) theo loại
Route::get('/loai-san-pham/{type}', 'FrontendController@getLoaiSp')->name('loaisanpham');

//Tạo trang Chi tiết Sản phẩm (product-detail)
Route::get('/san-pham/{id}', 'FrontendController@productDetail')->name('frontend.productDetail');