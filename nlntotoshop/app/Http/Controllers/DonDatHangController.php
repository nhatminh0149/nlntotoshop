<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonDatHang;
use App\ChiTietDonHang;

class DonDatHangController extends Controller
{
    public function index()
    {
        $ds_dondathang = DonDatHang::paginate(5);
        return view('backend.dondathang.index')->with('danhsachdondathang',$ds_dondathang);
    }
}
