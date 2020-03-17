<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    const     CREATED_AT    = 'ncc_taoMoi';
    const     UPDATED_AT    = 'ncc_capNhat';
    protected $table        = 'nhacungcap';
    protected $fillable     = ['ncc_ten', 'ncc_diaChi', 'ncc_dienThoai', 'ncc_taoMoi', 'ncc_capNhat'];
    protected $guarded      = ['ncc_ma'];
    protected $primaryKey   = 'ncc_ma';
    protected $dates        = ['ncc_taoMoi', 'ncc_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function loaisanpham(){
        return $this->hasMany('App\LoaiSanPham', 'ncc_ma', 'ncc_ma');
    }
}
