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
Route::resource('/admin/danhsachkhachhang', 'KhachHangController');

// route Danh mục Hình thức vận chuyển
Route::resource('/admin/danhsachhinhthucvanchuyen', 'HinhThucVanChuyenController');

// route Danh mục Đơn đặt hàng
Route::resource('/admin/danhsachdondathang', 'DonDatHangController');