<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table        = 'loaisanpham';
    protected $fillable     = ['l_ten', 'ncc_ma'];
    protected $guarded      = ['l_ma'];
    protected $primaryKey   = 'l_ma';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function nhacungcap(){
        return $this->belongsTo('App\NhaCungCap', 'ncc_ma', 'ncc_ma');
    }
    public function sanpham(){
        return $this->hasMany('App\SanPham', 'l_ma', 'l_ma');
    }
}
