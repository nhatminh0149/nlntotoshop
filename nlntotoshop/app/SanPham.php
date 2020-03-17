<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table        = 'sanpham';
    protected $fillable     = ['sp_ten', 'sp_gia', 'sp_hinh','sp_thongTin','sp_trangThai','l_ma'];
    protected $guarded      = ['sp_ma'];

    protected $primaryKey   = 'sp_ma';
    
    public function loaisanpham(){
        return $this->belongsTo('App\LoaiSanPham', 'l_ma', 'l_ma');
    }
    public function hinhanhlienquan(){
        return $this->hasMany('App\HinhAnh', 'sp_ma', 'sp_ma');
    }
}
