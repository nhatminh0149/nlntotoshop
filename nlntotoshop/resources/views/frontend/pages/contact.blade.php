{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
L I Ê N H Ệ - P A G E
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<style>
    @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500|Quicksand");
    .form1{
        margin-left: 280px;
        width: 50%;
        border: 1px solid #e6e6e6;
        padding: 20px 15px 30px 15px;
    }
    
    .row .col-md-12 h2{
        font-family: 'Muli', sans-serif;
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
        {{ __('totoshop.h3_lienhe') }}
    </h3>
</section>

<!-- Content page -->
<section class="bg0 p-t-70 p-b-70" ng-controller="contactController">
    <div class="container">
        <div class="form1">
            <!-- <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md"> -->
                <form name="contactForm" ng-submit="submitContactForm()" novalidate>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        {{ __('totoshop.h4_lienhe') }}
                    </h4>

                    <!-- Div Thông báo lỗi 
                        Chỉ hiển thị khi các validate trong form `contactForm` không hợp lệ => contactForm.$invalid = true
                        Sử dụng tiền chỉ lệnh ng-show="contactForm.$invalid"
                    -->
                    <div class="alert alert-danger" ng-show="contactForm.$invalid">
                        <ul>
                            <!-- Thông báo lỗi email -->
                            <li><span class="error" ng-show="contactForm.email.$error.required">{{ __('totoshop.loi_mail') }}</span></li>
                            <li><span class="error" ng-show="!contactForm.email.$error.required && contactForm.email.$error.pattern">{{ __('totoshop.loi_gmail') }}</span></li>

                            <!-- Thông báo lỗi message -->
                            <li><span class="error" ng-show="contactForm.message.$error.required">{{ __('totoshop.loi_loinhan') }}</span></li>
                            <li><span class="error" ng-show="contactForm.message.$error.minlength">{{ __('totoshop.loi_loinhanmin') }}</span></li>
                            <li><span class="error" ng-show="contactForm.message.$error.maxlength">{{ __('totoshop.loi_loinhanmax') }}</span> </li> </li> </div> <!-- Div Thông báo validate hợp lệ Chỉ hiển thị khi các validate trong form `contactForm` không hợp lệ=> contactForm.$valid = true
                                Sử dụng tiền chỉ lệnh ng-show="contactForm.$valid"
                                -->
                                <div class="alert alert-success" ng-show="contactForm.$valid">
                                    {{ __('totoshop.hople_lienhe') }}
                                </div>

                                <!-- Validate email -->
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="{{ __('totoshop.email_cua_ban') }}" ng-model="email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                                    <span class="valid" ng-show="userInfo.email.$valid">Hợp lệ</span>
                                    <img class="how-pos4 pointer-none" src="{{ asset('themes/cozastore/images/icons/icon-email.png') }}" alt="ICON">
                                </div>

                                <!-- Validate lời nhắm -->
                                <div class="bor8 m-b-30">
                                    <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="{{ __('totoshop.can_giup_do') }}" ng-model="message" ng-minlength="6" ng-maxlength="250" ng-required=true></textarea>
                                </div>

                                <!-- Nút submit form -->
                                <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" ng-disabled="contactForm.$invalid">
                                    {{ __('totoshop.guiloinhan') }}
                                </button>
                </form>
            <!-- </div> -->
        </div>

        <!-- Bản đồ Địa chỉ công ty -->
        <div class="row mt-5">
            <div class="col-md-12 text-center mb-4">
                <h2>{{ __('totoshop.diachicuahang') }}</h2>
            </div>
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.823377586331!2d105.77734171428223!3d10.031429375245953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0898ecfa45f37%3A0xf3c22c993cac6bda!2sTotoshop!5e0!3m2!1svi!2s!4v1587528395636!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `contactController`
    app.controller('contactController', function($scope, $http) {
        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitContactForm = function() {
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.contactForm.$valid) {
                // lấy data của Form
                var dataInputContactForm = {
                    "email": $scope.contactForm.email.$viewValue,
                    "message": $scope.contactForm.message.$viewValue,
                    "_token": "{{ csrf_token() }}",
                };
                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.contact.sendMailContactForm`
                $http({
                    url: "{{ route('frontend.contact.sendMailContactForm') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputContactForm)
                }).then(function successCallback(response) {
                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Gởi mail thành công!', 'Chúng tôi sẽ trả lời Quý khách trong thời gian sớm nhất. Xin cám ơn!', 'success');
                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình gởi mail!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>
@endsection