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

// route Danh mục Loại Sản phẩm
Route::resource('/admin/danhsachloaisanpham', 'LoaiSanPhamController');

// route Danh mục Loại Sản phẩm
Route::resource('/admin/danhsachsanpham', 'SanPhamController');

// route Danh mục Loại Sản phẩm
Route::resource('/admin/danhsachnhacungcap', 'NhaCungCapController');