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

    <h4 style="text-align: center;">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</h4>
    <form id="luuKhachHang" name="luuKhachHang" method="post" action="{{ route('danhsachkhachhang.update', ['id' => $kh->kh_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="kh_ma">Mã khách hàng</label>
            <input type="text" class="form-control" id="kh_ma" name="kh_ma" value="{{ $kh->kh_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="kh_taiKhoan">Tài khoản khách hàng</label>
            <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" value="{{ old('kh_taiKhoan', $kh->kh_taiKhoan) }}">
                @if($errors->has("kh_taiKhoan"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_taiKhoan")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="kh_matKhau">Mật khẩu</label>
            <input type="password" class="form-control" id="kh_matKhau" name="kh_matKhau" value="{{ old('kh_matKhau', $kh->kh_matKhau) }}">
                @if($errors->has("kh_matKhau"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_matKhau")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="kh_hoTen">Họ tên khách hàng</label>
            <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" value="{{ old('kh_hoTen', $kh->kh_hoTen) }}">
                @if($errors->has("kh_taiKhoan"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_taiKhoan")}}
                    </div>                 
                @endif
        </div>

        <label for="kh_gioiTinh">Giới tính</label>
        <select name="kh_gioiTinh" class="form-control">
            <option value="0" {{ old('kh_gioiTinh') == 0 ? "selected" : "" }}>Nữ</option>
            <option value="1" {{ old('kh_gioiTinh') == 1 ? "selected" : "" }}>Nam</option>
            <option value="2" {{ old('kh_gioiTinh') == 2 ? "selected" : "" }}>Khác</option>
            @if($errors->has("kh_gioiTinh"))
                <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                    {{$errors->first("kh_gioiTinh")}}
                </div>                 
            @endif
        </select>

        <div class="form-group">
            <label for="kh_email">Email khách hàng</label>
            <input type="text" class="form-control" id="kh_email" name="kh_email" value="{{ old('kh_email', $kh->kh_email) }}">
                @if($errors->has("kh_email"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_email")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="kh_diaChi">Địa chỉ</label>
            <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" value="{{ old('kh_diaChi', $kh->kh_diaChi) }}">
                @if($errors->has("kh_diaChi"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_diaChi")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="kh_dienThoai">Điện thoại</label>
            <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" value="{{ old('kh_dienThoai', $kh->kh_dienThoai) }}">
                @if($errors->has("kh_dienThoai"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_dienThoai")}}
                    </div>                 
                @endif
        </div>

        <label for="kh_trangThai">Trạng thái</label>
        <select name="kh_trangThai" class="form-control">
            <option value="0" {{ old('kh_trangThai') == 0 ? "selected" : "" }}>Chưa kích hoạt</option>
            <option value="1" {{ old('kh_trangThai') == 1 ? "selected" : "" }}>Kích hoạt</option>
        </select>
        <br>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
    </form>
@endsection

@section('custom-scripts')

@endsection