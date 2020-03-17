<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucVanChuyen extends Model
{
    protected $table        = 'hinhthucvanchuyen';
    protected $fillable     = ['htvc_ten', 'htvc_chiPhi', 'htvc_dienGiai'];
    protected $guarded      = ['htvc_ma'];
    protected $primaryKey   = 'htvc_ma';
}
