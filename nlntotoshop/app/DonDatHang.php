<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonDatHang extends Model
{
    protected $table        = 'dondathang';
    protected $fillable     = ['kh_ma', 'ddh_thoiGianDatHang', 'ddh_diaChiGiaoHang', 'ddh_dienThoai', 'ddh_trangThai', 'htvc_ma'];
    protected $guarded      = ['ddh_ma'];
    protected $primaryKey   = 'ddh_ma';
    protected $dates        = ['ddh_thoiGianDatHang'];
    protected $dateFormat   = 'Y-m-d H:i:s';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function khachhang(){
        return $this->belongsTo('App\KhachHang', 'kh_ma', 'kh_ma');
    }
    public function hinhthucvanchuyen(){
        return $this->belongsTo('App\HinhThucVanChuyen', 'htvc_ma', 'htvc_ma');
    }
}
