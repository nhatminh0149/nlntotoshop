<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\NhaCungCap;
use App\LoaiSanPham; 
use App\Sanpham;
use App\HinhThucVanChuyen;
use App\KhachHang;
use App\DonDatHang;

class BaoCaoController extends Controller
{

    /**
     * Action hiển thị view Báo cáo đơn hàng
     */
    public function donhang()
    {
        $nhacungcap_count = NhaCungCap::count();
        $loaisanpham_count = LoaiSanPham::count();
        $sanpham_count = Sanpham::count();
        $hinhthucvanchuyen_count = HinhThucVanChuyen::count();
        $khachhang_count = KhachHang::count();
        $dondathang_count = DonDatHang::count();
        return view('backend.reports.donhang', compact('nhacungcap_count', 'loaisanpham_count', 'sanpham_count', 'hinhthucvanchuyen_count', 'khachhang_count', 'dondathang_count'));
    }

    /**
     * Action AJAX get data cho báo cáo Đơn hàng
     */
    // public function donhangData(Request $request)
    // {
    //     $parameter = [
    //         'tuNgay' => $request->tuNgay,
    //         'denNgay' => $request->denNgay
    //     ];
    //     // dd($parameter);
    //     $data = DB::select('
    //         SELECT ddh.ddh_thoiGianDatHang as thoiGian
    //             , SUM(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) as tongThanhTien
    //         FROM dondathang ddh
    //         JOIN chitietdonhang ctdh ON ddh.ddh_ma = ctdh.ddh_ma
    //         WHERE ddh.ddh_thoiGianDatHang BETWEEN :tuNgay AND :denNgay
    //         GROUP BY ddh.ddh_thoiGianDatHang
    //     ', $parameter);

    //     return response()->json(array(
    //         'code'  => 200,
    //         'data' => $data,
    //     ));
    // }
    public function donhangData(Request $request)
    {
        $parameter = [
            'thang' => $request->thang,
        ];
        // dd($parameter);
        $data = DB::select('
            SELECT month(ddh.ddh_thoiGianDatHang) AS thoiGian, SUM(htvc.htvc_chiPhi + ctdh.ctdh_soLuong * ctdh.ctdh_donGia) as tongThanhTien
            FROM dondathang ddh
            JOIN hinhthucvanchuyen htvc ON htvc.htvc_ma = ddh.htvc_ma
            JOIN chitietdonhang ctdh ON ddh.ddh_ma = ctdh.ddh_ma
            WHERE year(ddh.ddh_thoiGianDatHang) = :thang
            GROUP BY month(ddh.ddh_thoiGianDatHang)
        ', $parameter);

        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }

    public function donhangSpbanchay(Request $request)
    {
        $parameter = [
            'Tensanpham' => $request->Tensanpham,
            'SoLuong' => $request->SoLuong,
        ];
         //dd($parameter);
        $data = DB::select('
            SELECT *
            FROM (
                select sp.sp_ten as Tensanpham, sum(ctdh.ctdh_soLuong) as SoLuong
                from sanpham sp
                join chitietdonhang ctdh on sp.sp_ma = ctdh.sp_ma
                group by ctdh.sp_ma, sp.sp_ten
            ) AS tmp
            order by tmp.SoLuong DESC
            LIMIT 5
        ', $parameter);

        //dd($data);

        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }
}