<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KichCoSanPham;
use Session;

class KichCoSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_kichcosanpham = KichCoSanPham::paginate(5);
        return view('backend.kichcosanpham.index')
            ->with('danhsachkichcosanpham', $ds_kichcosanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_kichcosp = KichCoSanPham::all();
        return view('backend.kichcosanpham.create')->with('danhsachkichcosanpham', $ds_kichcosp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ //Action store() thường dùng để thực thi câu lệnh INSERT dữ liệu vào database.
    public function store(Request $request)
    {
        $this->validate($request, [
            'kcsp_ten' => 'required|unique:kichcosp,kcsp_ten',
        ],[
            'kcsp_ten.required' => "Tên kích cỡ sản phẩm không được để trống",
            'kcsp_ten.unique' => "Tên kích cỡ sản phẩm này đã có trong CSDL", 
        ]);

        $kcsp = new KichCoSanPham();
        $kcsp->kcsp_ma = $request->kcsp_ma;
        $kcsp->kcsp_ten = $request->kcsp_ten;

        $kcsp->save();

        Session::flash('alert-warning', 'Thêm mới thành công');
        
        return redirect()->route('danhsachkichcosanpham.index');
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
        $kichcosanpham = KichCoSanPham::where("kcsp_ma",  $id)->first();;

        return view('backend.kichcosanpham.edit')
            ->with('kcsp', $kichcosanpham);
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
        $kcsp = KichCoSanPham::where("kcsp_ma",  $id)->first();;
        $kcsp->kcsp_ma = $request->kcsp_ma;
        $kcsp->kcsp_ten = $request->kcsp_ten;
        
        $kcsp->save();

        Session::flash('alert-info', 'Cập nhật thành công');
        
        return redirect()->route('danhsachkichcosanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kcsp = kichcosp::where("KichCoSanPham",  $id)->first();
    
        $kcsp->delete();

        Session::flash('alert-danger', 'Xóa kích cỡ sản phẩm thành công');
        
        return redirect()->route('danhsachkichcosanpham.index');
    }
}
