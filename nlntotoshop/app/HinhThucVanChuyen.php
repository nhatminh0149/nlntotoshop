<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucVanChuyen extends Model
{
    protected $table        = 'hinhthucvanchuyen';
    protected $fillable     = ['htvc_ten', 'htvc_chiPhi', 'htvc_dienGiai'];
    protected $guarded      = ['htvc_ma'];
    protected $primaryKey   = 'htvc_ma';
    public $timestamps = false; //ko muốn tạo 2 cột created_at và updated _at

    public function chitietdonhang(){
        return $this->hasMany('App\ChiTietDonHang', 'htvc_ma', 'htvc_ma');
    }
}
