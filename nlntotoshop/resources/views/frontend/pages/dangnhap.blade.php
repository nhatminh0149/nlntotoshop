{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Đ Ă N G N H Ậ P - P A G E
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
        {{ __('totoshop.h3_dang') }} &nbsp; {{ __('totoshop.h3_nhap') }}
    </h3>
</section>

<div class="container">
	<div class="content mt-5">
		<h3>{{ __('totoshop.h3_khdangnhap') }}</h3>
        <form method="post" action="{{ route('frontend.login') }}">
			{{ csrf_field() }}
			
			@if(Session::has('flag'))
            	<div class="alert alert-{{  Session::get('flag') }}"> {{ Session::get('message') }} </div>
			@endif
            <div class="form-group">
                <label for="kh_taiKhoan">{{ __('totoshop.dn_kh_taikhoan') }}</label>
                <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
                @if($errors->has("kh_taiKhoan"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_taiKhoan")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="kh_matKhau">{{ __('totoshop.dn_kh_matKhau') }}</label>
                <input type="password" class="form-control" id="kh_matKhau" name="kh_matKhau">
                @if($errors->has("kh_matKhau"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kh_matKhau")}}
                    </div>                 
                @endif
            </div>

            <br>
            <button type="submit" class="btn btn-outline-dark">{{ __('totoshop.dn_button') }}</button>&nbsp;&nbsp;
        </form>
	</div>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')

@endsection