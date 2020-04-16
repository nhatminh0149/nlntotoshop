@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh khách hàng
@endsection

@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
@endsection

@section('content')
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <h4 style="text-align: center;">XEM LẠI THÔNG TIN HÓA ĐƠN</h4>
    <form id="reHoaDon" name="reHoaDon" method="post" action="{{ route('danhsachdondathang.update', ['id' => $ddh->ddh_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}

        <div class="form-group">
            <label for="ddh_ma">Mã ĐĐH</label>
            <input type="text" class="form-control" id="ddh_ma" name="ddh_ma" value="{{ $ddh->ddh_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="kh_taiKhoan">Tài khoản khách hàng</label>
            <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" value="{{ old('kh_taiKhoan', $ddh->kh_taiKhoan) }}" readonly>
        </div>

        <div class="form-group">
            <label for="ddh_thoiGianDatHang">Thời gian đặt hàng</label>
            <input type="text" class="form-control" id="ddh_thoiGianDatHang" name="ddh_thoiGianDatHang" value="{{ old('ddh_thoiGianDatHang', $ddh->ddh_thoiGianDatHang) }}" readonly>
        </div>

        <div class="form-group">
            <label for="ddh_diaChiGiaoHang">Nơi giao</label>
            <input type="text" class="form-control" id="ddh_diaChiGiaoHang" name="ddh_diaChiGiaoHang" value="{{ old('ddh_diaChiGiaoHang', $ddh->ddh_diaChiGiaoHang) }}" readonly>
        </div>

        <div class="form-group">
            <label for="ddh_dienThoai">SĐT</label>
            <input type="text" class="form-control" id="ddh_dienThoai" name="ddh_dienThoai" value="{{ old('ddh_dienThoai', $ddh->ddh_dienThoai) }}" readonly>
        </div>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Duyệt đơn hàng</button>
    </form>
@endsection

@section('custom-scripts')

@endsection