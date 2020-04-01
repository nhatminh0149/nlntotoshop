<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table        = 'chitietdonhang';
    protected $fillable     = ['ctdh_soLuong', 'ctdh_donGia'];
    protected $guarded      = ['ddh_ma','sp_ma', 'htvc_ma', 'kcsp_ma'];
    protected $primaryKey   = ['ddh_ma','sp_ma','htvc_ma'];
    public    $incrementing = false;
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function sanpham(){
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');
    }
    public function kichcosanpham(){
        return $this->belongsTo('App\KichCoSanPham', 'kcsp_ma', 'kcsp_ma');
    }
    public function hinhthucvanchuyen(){
        return $this->belongsTo('App\HinhThucVanChuyen', 'htvc_ma', 'htvc_ma');
    }
}
