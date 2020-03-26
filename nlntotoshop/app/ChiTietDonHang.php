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
}
