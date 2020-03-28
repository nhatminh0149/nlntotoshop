<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\NhaCungCap;
use Session;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ //View hien thi ds 
    public function index()
    {
        // Sử dụng Eloquent Model để truy vấn dữ liệu
        // $ds_loaisanpham = LoaiSanPham::all(); // SELECT * FROM loaisanpham
        $ds_loaisanpham = LoaiSanPham::paginate(5); // SELECT * FROM sanpham LIMIT 0,5
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
        // Hiển thị view `backend.sanpham.index`
        return view('backend.loaisanpham.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloaisanpham`
            ->with('danhsachloaisanpham', $ds_loaisanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ //view hien thi trang tao
    public function create()
    {
        $ds_nhacungcap = NhaCungCap::all();
        return view('backend.loaisanpham.create')->with('danhsachnhacungcap', $ds_nhacungcap);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ //them dl moi vap bang dl
    public function store(Request $request)
    {
        $l = new LoaiSanPham();
        $l->l_ma = $request->l_ma;
        $l->l_ten = $request->l_ten;
        $l->l_ngaytaoMoi = $request->l_ngaytaoMoi;
        $l->l_ngaycapNhat = $request->l_ngaycapNhat;
        $l->ncc_ma = $request->ncc_ma;

        $l->save();

        Session::flash('alert-info', 'Thêm mới thành công');
        
        return redirect()->route('danhsachloaisanpham.index');
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
     */ //hien thi trang cap nhat
    public function edit($id)
    {
        $loaisanpham = LoaiSanPham::where("l_ma", $id)->first();
        $ds_nhacungcap = NhaCungCap::all();
        return view('backend.loaisanpham.edit')->with('l', $loaisanpham)->with('danhsachnhacungcap', $ds_nhacungcap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ //tim doi tuong dua vao khoa chinh va cap nhat bang dl
    public function update(Request $request, $id)
    {
        $l = LoaiSanPham::where("l_ma",  $id)->first();;
        $l->l_ma = $request->l_ma;
        $l->l_ten = $request->l_ten;
        $l->l_ngaytaoMoi = $request->l_ngaytaoMoi;
        $l->l_ngaycapNhat = $request->l_ngaycapNhat;
        $l->ncc_ma = $request->ncc_ma;
        
        $l->save();

        Session::flash('alert-info', 'Cập nhật thành công');
        
        return redirect()->route('danhsachloaisanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $l = LoaiSanPham::where("l_ma",  $id)->first();
        $l->delete();
        Session::flash('alert-info', 'Xóa loại sản phẩm thành công');
        return redirect()->route('danhsachloaisanpham.index');
    }
}
