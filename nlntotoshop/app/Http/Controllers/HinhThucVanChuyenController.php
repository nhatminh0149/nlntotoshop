<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HinhThucVanChuyen;
use Session;

class HinhThucVanChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_hinhthucvanchuyen = HinhThucVanChuyen::paginate(5);
        return view('backend.hinhthucvanchuyen.index')->with('danhsachhinhthucvanchuyen',$ds_hinhthucvanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_htvc = HinhThucVanChuyen::all();
        return view('backend.hinhthucvanchuyen.create')->with('hinhthucvanchuyen', $ds_htvc);
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
            'htvc_ten' => 'required|unique:hinhthucvanchuyen,htvc_ten',
            'htvc_chiPhi' => 'required',
            'htvc_dienGiai' => 'required',
        ],[
            'htvc_ten.required' => "Hình thức vận chuyển không được để trống",
            'htvc_ten.unique' => "Hình thức vận chuyển này đã có trong CSDL", 
            'htvc_chiPhi.required' => "Chi phí vận chuyển không được để trống",
            'htvc_dienGiai.required' => "Diễn giải không được để trống",
        ]);

        $htvc = new HinhThucVanChuyen();
        $htvc->htvc_ma = $request->htvc_ma;
        $htvc->htvc_ten = $request->htvc_ten;
        $htvc->htvc_chiPhi = $request->htvc_chiPhi;
        $htvc->htvc_dienGiai = $request->htvc_dienGiai;

        $htvc->save();

        Session::flash('alert-warning', 'Thêm mới thành công');
        
        return redirect()->route('danhsachhinhthucvanchuyen.index');
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
        $hinhthucvanchuyen = HinhThucVanChuyen::where("htvc_ma",  $id)->first();;

        return view('backend.hinhthucvanchuyen.edit')
            ->with('htvc', $hinhthucvanchuyen);
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
            'htvc_ten' => 'required',
            'htvc_chiPhi' => 'required',
            'htvc_dienGiai' => 'required',
        ],[
            'htvc_ten.required' => "Hình thức vận chuyển không được để trống", 
            'htvc_chiPhi.required' => "Chi phí vận chuyển không được để trống",
            'htvc_dienGiai.required' => "Diễn giải không được để trống",
        ]);

        $htvc = HinhThucVanChuyen::where("htvc_ma",  $id)->first();;
        $htvc->htvc_ma = $request->htvc_ma;
        $htvc->htvc_ten = $request->htvc_ten;
        $htvc->htvc_chiPhi = $request->htvc_chiPhi;
        $htvc->htvc_dienGiai = $request->htvc_dienGiai;
        
        $htvc->save();

        Session::flash('alert-info', 'Cập nhật thành công');
        
        return redirect()->route('danhsachhinhthucvanchuyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $htvc = HinhThucVanChuyen::where("htvc_ma",  $id)->first();
        $htvc->delete();
        Session::flash('alert-danger', 'Xóa hình thức vận chuyển thành công'); 
        return redirect()->route('danhsachhinhthucvanchuyen.index');
    }
}
