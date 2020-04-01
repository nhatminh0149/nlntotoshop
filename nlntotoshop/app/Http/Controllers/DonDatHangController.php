<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonDatHang;
use App\ChiTietDonHang;
use App\SanPham;
use App\KichCoSanPham;
use App\HinhThucVanChuyen;
use App\KhachHang;
use DB;

class DonDatHangController extends Controller
{
    public function index()
    {
        // $ds_dondathang = DonDatHang::paginate(5);
        //return view('backend.dondathang.index')->with('danhsachdondathang',$ds_dondathang);
        $sql=<<<EOT
        SELECT ddh.ddh_ma, kh.kh_taiKhoan, ddh.ddh_thoiGianDatHang, ddh.ddh_diaChiGiaoHang, ddh.ddh_dienThoai, ddh.ddh_trangThai,
            sum(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) AS TongThanhTien
        FROM dondathang ddh 
        JOIN khachhang kh ON kh.kh_ma=ddh.kh_ma
        JOIN chitietdonhang ctdh ON ctdh.ddh_ma = ddh.ddh_ma
        GROUP BY ddh.ddh_ma, kh.kh_taiKhoan, ddh.ddh_thoiGianDatHang, ddh.ddh_diaChiGiaoHang, ddh.ddh_dienThoai, ddh.ddh_trangThai
EOT;

        $ds_dondathang = DB::select($sql);
        return view('backend.dondathang.index')->with('danhsachdondathang',$ds_dondathang);
    }
}
