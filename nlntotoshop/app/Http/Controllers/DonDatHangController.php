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
use Session;

class DonDatHangController extends Controller
{
    public function index()
    {
        // $ds_dondathang = DonDatHang::paginate(5);
        //return view('backend.dondathang.index')->with('danhsachdondathang',$ds_dondathang);

//         $sql=<<<EOT
//         SELECT ddh.ddh_ma, kh.kh_taiKhoan, ddh.ddh_thoiGianDatHang, ddh.ddh_diaChiGiaoHang, ddh.ddh_dienThoai, ddh.ddh_trangThai,
//             sum(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) AS TongThanhTien
//         FROM dondathang ddh 
//         JOIN khachhang kh ON kh.kh_ma=ddh.kh_ma
//         JOIN chitietdonhang ctdh ON ctdh.ddh_ma = ddh.ddh_ma
//         GROUP BY ddh.ddh_ma, kh.kh_taiKhoan, ddh.ddh_thoiGianDatHang, ddh.ddh_diaChiGiaoHang, ddh.ddh_dienThoai, ddh.ddh_trangThai
// EOT;

//         $ds_dondathang = DB::select($sql);
//         return view('backend.dondathang.index')->with('danhsachdondathang',$ds_dondathang);

        $ds_dondathang = DB::table('dondathang')
                ->select('dondathang.ddh_ma', 'khachhang.kh_taiKhoan', 'dondathang.ddh_thoiGianDatHang',
                         'dondathang.ddh_diaChiGiaoHang', 'dondathang.ddh_dienThoai', 'dondathang.ddh_trangThai', 'hinhthucvanchuyen.htvc_chiPhi',
                          DB::raw('SUM(hinhthucvanchuyen.htvc_chiPhi + chitietdonhang.ctdh_soLuong * chitietdonhang.ctdh_donGia) as TongThanhTien'))
                ->join('hinhthucvanchuyen', 
                       'hinhthucvanchuyen.htvc_ma', '=', 'dondathang.htvc_ma')
                ->join('khachhang',
                       'dondathang.kh_ma', '=', 'khachhang.kh_ma')
                ->join('chitietdonhang',
                       'dondathang.ddh_ma', '=', 'chitietdonhang.ddh_ma')
                ->groupBy('dondathang.ddh_ma', 'khachhang.kh_taiKhoan', 'dondathang.ddh_thoiGianDatHang',
                          'dondathang.ddh_diaChiGiaoHang', 'dondathang.ddh_dienThoai', 'dondathang.ddh_trangThai', 'hinhthucvanchuyen.htvc_chiPhi')
                ->paginate(5);
        //print_r($ds_dondathang);
        return view('backend.dondathang.index')->with('danhsachdondathang',$ds_dondathang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /**
     * Xử lý duyệt đơn hàng
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $ddh = DonDatHang::find($id);

        $ddh->ddh_trangThai = 2;
        $ddh->save();
        Session::flash('alert-success', 'Xử lý đơn hàng thành công');
        return redirect()->back();
    }

}
