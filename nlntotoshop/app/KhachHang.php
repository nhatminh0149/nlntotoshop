<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table        = 'khachhang';
    protected $fillable     = ['kh_taiKhoan', 'kh_matKhau', 'kh_hoTen', 'kh_gioiTinh', 'kh_email', 'kh_trangThai'];
    protected $guarded      = ['kh_ma'];
    protected $primaryKey   = 'kh_ma';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function dondathang(){
        return $this->hasMany('App\DonDatHang', 'kh_ma', 'kh_ma');
    }
    
}
