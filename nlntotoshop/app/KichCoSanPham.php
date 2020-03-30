<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KichCoSanPham extends Model
{ 
    protected $table        = 'kichcosp';
    protected $fillable     = ['kcsp_ten'];
    protected $guarded      = ['kcsp_ma'];
    protected $primaryKey   = 'kcsp_ma';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function chitietdonhang(){
        return $this->hasMany('App\ChiTietDonHang', 'kcsp_ma', 'kcsp_ma');
    }
}
