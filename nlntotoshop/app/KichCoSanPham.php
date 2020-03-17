<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KichCoSanPham extends Model
{ 
    protected $table        = 'kichcosp';
    protected $fillable     = ['kcsp_ten'];
    protected $guarded      = ['kcsp_ma'];
    protected $primaryKey   = 'kcsp_ma';
}
