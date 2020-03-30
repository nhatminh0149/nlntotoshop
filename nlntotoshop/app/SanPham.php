<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table        = 'sanpham';
    protected $fillable     = ['sp_ten', 'sp_gia', 'sp_hinh','sp_thongTin','l_ma'];
    protected $guarded      = ['sp_ma'];
    protected $primaryKey   = 'sp_ma';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at
    
    public function loaisanpham(){
        return $this->belongsTo('App\LoaiSanPham', 'l_ma', 'l_ma');
    }
    public function hinhanhlienquan(){
        return $this->hasMany('App\HinhAnh', 'sp_ma', 'sp_ma');
    }
    public function chitietdonhang(){
        return $this->hasMany('App\ChiTietDonHang', 'sp_ma', 'sp_ma');
    }
}
