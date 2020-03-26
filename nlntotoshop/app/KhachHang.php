<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table        = 'khachhang';
    protected $fillable     = ['kh_taiKhoan', 'kh_matKhau', 'kh_hoTen', 'kh_gioiTinh', 'kh_email', 'kh_diaChi', 'kh_dienThoai', 'kh_trangThai'];
    protected $guarded      = ['kh_ma'];
    protected $primaryKey   = 'kh_ma';
    
}
