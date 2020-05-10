{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
G I Ớ I T H I Ệ U - P A G E
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style=" background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;">
    <h3 class="ltext-105 cl0 txt-center">
        {{ __('totoshop.h3_gioithieu') }}
    </h3>
</section>
<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        {{ __('totoshop.h3_gioithieu_tieude') }}
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        {{ __('totoshop.p1_gioithieu') }}    
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        {{ __('totoshop.p2_gioithieu') }}
                    </p>
                    <p class="stext-113 cl6 p-b-26">
                        {{ __('totoshop.p3_gioithieu') }}
                    </p>
                </div>
            </div>
            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('img/lookbook/lookbook11.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        {{ __('totoshop.h3_nhiemvu') }}
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        {{ __('totoshop.p1_nhiemvu') }}
                        <br>
                        {{ __('totoshop.p2_nhiemvu') }}
                    </p>
                    <div class="bor16 p-l-29 p-b-9 m-t-5">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                        {{ __('totoshop.p3_nhiemvu') }}
                        </p>
                        <span class="stext-111 cl8">
                            - ToToShop’s
                        </span>
                    </div>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('img/lookbook/lookbook14.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
@endsection
