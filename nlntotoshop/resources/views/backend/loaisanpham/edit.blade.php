@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh loại sản phẩm
@endsection

@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h4 style="text-align: center;">CẬP NHẬT LOẠI SẢN PHẨM</h4>
    <form id="xoaLoaiSanPham" name="xoaLoaiSanPham" method="post" action="{{ route('danhsachloaisanpham.update', ['id' => $l->l_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="l_ma">Mã loại</label>
            <input type="text" class="form-control" id="l_ma" name="l_ma" value="{{ $l->l_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="l_ten">Tên loại</label>
            <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ old('l_ten', $l->l_ten) }}">
        </div>
        
        <div class="form-group">
            <label for="l_ngaytaoMoi">Ngày tạo mới</label>
            <input type="date" class="form-control" id="l_ngaytaoMoi" name="l_ngaytaoMoi" value="{{ old('l_ngaytaoMoi', $l->l_ngaytaoMoi) }}" data-mask-datetime>
        </div>
        <div class="form-group">
            <label for="l_ngaycapNhat">Ngày cập nhật</label>
            <input type="date" class="form-control" id="l_ngaycapNhat" name="l_ngaycapNhat" value="{{ old('l_ngaycapNhat', $l->l_ngaycapNhat) }}" data-mask-datetime>
        </div>
        <div class="form-group">
        <label for="ncc_ma">Nhà cung cấp</label>
        <select name="ncc_ma" class="form-control">
            @foreach($danhsachnhacungcap as $ncc)
                @if($ncc->ncc_ma == $l->ncc_ma)
                <option value="{{ $ncc->ncc_ma }}" selected>{{ $ncc->ncc_ten }}</option>
                @else
                <option value="{{ $ncc->ncc_ma }}">{{ $ncc->ncc_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection

@section('custom-scripts')
    
@endsection