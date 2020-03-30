<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{

    protected $table        = 'nhacungcap';
    protected $fillable     = ['ncc_ten', 'ncc_diaChi', 'ncc_dienThoai'];
    protected $guarded      = ['ncc_ma'];
    protected $primaryKey   = 'ncc_ma';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function loaisanpham(){
        return $this->hasMany('App\LoaiSanPham', 'ncc_ma', 'ncc_ma');
    }
}
