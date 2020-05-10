{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Đ Ă N G K Ý - P A G E
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<style>
    @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500|Quicksand");
    
    .content h3{
        font-family: Quicksand, sans-serif;
        letter-spacing: 1px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px; 
    }
    form{
        margin: 0px auto;
        width: 500px;
        border: 1px solid #ccc;
        padding: 30px;
    }
    label{
        font-family: Quicksand, sans-serif;
        font-weight: bold;
        letter-spacing: 1px;
    }
</style>
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style=" background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;">
    <h3 class="ltext-105 cl0 txt-center">
        {{ __('totoshop.h3_dangky') }}
    </h3>
</section>

<div class="container">
	<div class="content mt-5">
        <h3>{{ __('totoshop.h3_khdangky') }}</h3>
        <form method="post" action="{{ route('frontend.register') }}">
            {{ csrf_field() }}

            @if(Session::has('thanhcong'))
                <div class= "alert alert-success">{{ Session::get('thanhcong') }}</div>        
            @endif

            <div class="form-group">
                <label for="kh_taiKhoan">{{ __('totoshop.kh_taikhoan') }}</label>
                <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" value="{{ old('kh_taiKhoan') }}">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
                @if($errors->has("kh_taiKhoan"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_taiKhoan")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="kh_matKhau">{{ __('totoshop.kh_matKhau') }}</label>
                <input type="password" class="form-control" id="kh_matKhau" name="kh_matKhau" value="{{ old('kh_matKhau') }}">
                @if($errors->has("kh_matKhau"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_matKhau")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="re_kh_matKhau">{{ __('totoshop.re_kh_matKhau') }}</label>
                <input type="password" class="form-control" id="re_kh_matKhau" name="re_kh_matKhau" value="{{ old('re_kh_matKhau') }}">
                @if($errors->has("re_kh_matKhau"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("re_kh_matKhau")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="kh_hoTen">{{ __('totoshop.kh_hoTen') }}</label>
                <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" value="{{ old('kh_hoTen') }}">
                @if($errors->has("kh_hoTen"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_hoTen")}}
                    </div>                 
                @endif
            </div>

            <label for="kh_gioiTinh">{{ __('totoshop.kh_gioiTinh') }}</label>
            <select name="kh_gioiTinh" class="form-control">
                <option value="0" {{ old('kh_gioiTinh') == 0 ? "selected" : "" }}>{{ __('totoshop.nu') }}</option>
                <option value="1" {{ old('kh_gioiTinh') == 1 ? "selected" : "" }}>{{ __('totoshop.nam') }}</option>
                <option value="2" {{ old('kh_gioiTinh') == 2 ? "selected" : "" }}>{{ __('totoshop.khac') }}</option>
                @if($errors->has("kh_gioiTinh"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_gioiTinh")}}
                    </div>                 
                @endif
            </select>
            <br>
            <div class="form-group">
                <label for="kh_email">Email</label>
                <input type="text" class="form-control" id="kh_email" name="kh_email" value="{{ old('kh_email') }}">
                @if($errors->has("kh_email"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_email")}}
                    </div>                 
                @endif
            </div>

            <!-- <div class="form-group">
                <label for="kh_diaChi">Địa chỉ</label>
                <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" value="{{ old('kh_diaChi') }}">
                @if($errors->has("kh_diaChi"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_diaChi")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="kh_dienThoai">Điện thoại</label>
                <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" value="{{ old('kh_dienThoai') }}">
                @if($errors->has("kh_dienThoai"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_dienThoai")}}
                    </div>                 
                @endif
            </div> -->
            <br>
            <button type="submit" class="btn btn-outline-dark">OK</button>&nbsp;&nbsp;
            <button type="reset" value="Reset" class="btn btn-outline-dark">RESET</button>
        </form>
	</div>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')

@endsection