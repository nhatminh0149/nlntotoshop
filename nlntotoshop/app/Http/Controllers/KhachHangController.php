<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Khachhang;
use Session;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_khachhang = KhachHang::paginate(5);
        return view('backend.khachhang.index')
            ->with('danhsachkhachhang', $ds_khachhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_khachhang = KhachHang::all();
        return view('backend.khachhang.create')->with('danhsachkhachhang', $ds_khachhang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kh_taiKhoan' => 'required|unique:khachhang,kh_taiKhoan',
            'kh_matKhau' => 'required|min:6',
            'kh_hoTen' => 'required',
            'kh_email' => 'required|email',
            // 'kh_diaChi' => 'required',
            // 'kh_dienThoai' => 'required|digits:10',
        ],[
            'kh_taiKhoan.required' => "Tên tài khoản của khách hàng không được để trống",
            'kh_taiKhoan.unique' => "Tên tài khoản này đã có trong CSDL", 
            'kh_matKhau.required' => "Mật khẩu của khách hàng không được để trống", 
            'kh_matKhau.min' => "Mật khẩu phải ít nhất có 6 kí tự", 
            'kh_hoTen.required' => "Họ tên của khách hàng không được để trống", 
            'kh_email.required' => "Email của khách hàng không được để trống", 
            'kh_email.email' => "Email không đúng định dạng", 
            // 'kh_diaChi.required' => "Địa chỉ của khách hàng không được để trống", 
            // 'kh_dienThoai.required' => "SĐT của khách hàng không được để trống", 
            // 'kh_dienThoai.digits' => "SĐT của khách hàng phải là số 10 kí tự", 
        ]);

        $kh = new KhachHang();
        $kh->kh_ma = $request->kh_ma;
        $kh->kh_taiKhoan = $request->kh_taiKhoan;
        $kh->kh_matKhau = md5($request->kh_matKhau);
        $kh->kh_hoTen = $request->kh_hoTen;
        $kh->kh_gioiTinh = $request->kh_gioiTinh;
        $kh->kh_email = $request->kh_email;
        // $kh->kh_diaChi = $request->kh_diaChi;
        // $kh->kh_dienThoai = $request->kh_dienThoai;
        $kh->kh_trangThai = $request->kh_trangThai;

        $kh->save();

        Session::flash('alert-warning', 'Thêm mới thành công');
        
        return redirect()->route('danhsachkhachhang.index');
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
        $khachhang = KhachHang::where("kh_ma",  $id)->first();;

        return view('backend.khachhang.edit')
            ->with('kh', $khachhang);
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
        $this->validate($request, [
            'kh_taiKhoan' => 'required',
            'kh_matKhau' => 'required|min:6',
            'kh_hoTen' => 'required',
            'kh_email' => 'required|email',
            // 'kh_diaChi' => 'required',
            // 'kh_dienThoai' => 'required|digits:10',
        ],[
            'kh_taiKhoan.required' => "Tên tài khoản của khách hàng không được để trống",
            // 'kh_taiKhoan.unique' => "Tên tài khoản này đã có trong CSDL", 
            'kh_matKhau.required' => "Mật khẩu của khách hàng không được để trống", 
            'kh_matKhau.min' => "Mật khẩu phải ít nhất có 6 kí tự", 
            'kh_hoTen.required' => "Họ tên của khách hàng không được để trống", 
            'kh_email.required' => "Email của khách hàng không được để trống", 
            'kh_email.email' => "Email không đúng định dạng", 
            // 'kh_diaChi.required' => "Địa chỉ của khách hàng không được để trống", 
            // 'kh_dienThoai.required' => "SĐT của khách hàng không được để trống", 
            // 'kh_dienThoai.digits' => "SĐT của khách hàng phải là số 10 kí tự", 
        ]);

        $kh = KhachHang::where("kh_ma",  $id)->first();;
        $kh->kh_ma = $request->kh_ma;
        $kh->kh_taiKhoan = $request->kh_taiKhoan;
        $kh->kh_matKhau = md5($request->kh_matKhau);
        $kh->kh_hoTen = $request->kh_hoTen;
        $kh->kh_gioiTinh = $request->kh_gioiTinh;
        $kh->kh_email = $request->kh_email;
        // $kh->kh_diaChi = $request->kh_diaChi;
        // $kh->kh_dienThoai = $request->kh_dienThoai;
        $kh->kh_trangThai = $request->kh_trangThai;
        
        $kh->save();

        Session::flash('alert-info', 'Cập nhật thành công');
        
        return redirect()->route('danhsachkhachhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
