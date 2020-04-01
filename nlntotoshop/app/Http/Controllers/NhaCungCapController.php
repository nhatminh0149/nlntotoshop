<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaCungCap;
use Session;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *///HIỂN THỊ DANH SÁCH
    public function index()
    {//get
        $ds_nhacungcap = NhaCungCap::paginate(5);
        return view('backend.nhacungcap.index')
            ->with('danhsachnhacungcap', $ds_nhacungcap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ //HIỂN THỊ VIEW TẠO DL MỚI
    public function create()
    {//get
        $ds_nhacungcap = NhaCungCap::all();
        return view('backend.nhacungcap.create')->with('danhsachnhacungcap', $ds_nhacungcap);
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachnhacungcap` 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ //THÊM DL MỚI VÀO BẢNG DỮ LIỆU, Action store() thường dùng để thực thi câu lệnh INSERT dữ liệu vào database.
    public function store(Request $request)
    { // post 
        $this->validate($request, [
            'ncc_ten' => 'required|unique:nhacungcap,ncc_ten',
            'ncc_diaChi' => 'required',
            'ncc_dienThoai' => 'required|unique:nhacungcap,ncc_dienThoai|digits:10',
        ],[
            'ncc_ten.required' => "Tên nhà cung cấp không được để trống",
            'ncc_ten.unique' => "Tên nhà cung cấp này đã có trong CSDL",
            'ncc_diaChi.required' => "Địa chỉ nhà cung cấp không được để trống",
            'ncc_dienThoai.required' => "SĐT nhà cung cấp không được để trống",
            'ncc_dienThoai.unique' => "SĐT nhà cung cấp này đã có trong CSDL",
            'ncc_dienThoai.digits' => "SĐT nhà cung cấp phải ở dạng số 10 kí tự",   
        ]);

        $ncc = new NhaCungCap();
        $ncc->ncc_ma = $request->ncc_ma;
        $ncc->ncc_ten = $request->ncc_ten;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;

        $ncc->save();

        Session::flash('alert-warning', 'Thêm mới thành công');
        
        return redirect()->route('danhsachnhacungcap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ //TÌM KIẾM ĐỐI TƯỢNG DỰA VÀO KHÓA CHÍNH, SAU ĐÓ HIỂN THỊ VIEW CHI TIẾT NCC
    public function show($id)
    {//get
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ //HIỂN THỊ TRANG CẬP NHẬT ĐỐI TƯỢNG DL DỰA VÀO KHÓA CHÍNH
     //Action edit($id) thường dùng để hiển thị màn hình bao gồm form và các ô nhập liệu (input).
    public function edit($id)
    {//get
        $nhacungcap = NhaCungCap::where("ncc_ma",  $id)->first();;

        return view('backend.nhacungcap.edit')
            ->with('ncc', $nhacungcap);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ //TÌM ĐỐI TƯỢNG DL DỰA VÀO KHÓA CHÍNH VÀ CẬP NHẬT DL VÀO BẢNG DL
    public function update(Request $request, $id)
    {//put/patch

        $this->validate($request, [
            'ncc_ten' => 'required',
            'ncc_diaChi' => 'required',
            'ncc_dienThoai' => 'required|digits:10',
        ],[
            'ncc_ten.required' => "Tên nhà cung cấp không được để trống",
            // 'ncc_ten.unique' => "Tên nhà cung cấp này đã có trong CSDL",
            'ncc_diaChi.required' => "Địa chỉ nhà cung cấp không được để trống",
            'ncc_dienThoai.required' => "SĐT nhà cung cấp không được để trống",
            // 'ncc_dienThoai.unique' => "SĐT nhà cung cấp này đã có trong CSDL",
            'ncc_dienThoai.digits' => "SĐT nhà cung cấp phải ở dạng số 10 kí tự",   
        ]);

        $ncc = NhaCungCap::where("ncc_ma",  $id)->first();;
        $ncc->ncc_ma = $request->ncc_ma;
        $ncc->ncc_ten = $request->ncc_ten;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;
        
        $ncc->save();

        Session::flash('alert-info', 'Cập nhật thành công');
        
        return redirect()->route('danhsachnhacungcap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ //TÌM ĐỐI TƯỢNG DL DỰA VÀO KHÓA CHÍNH VÀ XÓA DL KHỎI BẢNG DL
    public function destroy($id)
    {//delete
        $ncc = NhaCungCap::where("ncc_ma",  $id)->first();
    
        $ncc->delete();

        Session::flash('alert-danger', 'Xóa nhà cung cấp thành công');
        
        return redirect()->route('danhsachnhacungcap.index');
    }
}
