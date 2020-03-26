<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonDatHang extends Model
{
    protected $table        = 'dondathang';
    protected $fillable     = ['kh_ma', 'ddh_thoiGianDatHang', 'ddh_diaChiGiaoHang', 'ddh_dienThoai', 'ddh_trangThai'];
    protected $guarded      = ['ddh_ma'];
    protected $primaryKey   = 'ddh_ma';
}
