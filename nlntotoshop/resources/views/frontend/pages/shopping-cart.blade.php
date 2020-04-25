{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Giỏ hàng 
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')

<!-- Hiển thị giỏ hàng -->
<ngcart-cart template-url="{{ asset('vendor/ngCart/template/ngCart/cart.html') }}"></ngcart-cart>

<!-- Thông tin khách hàng -->
<div class="container" ng-controller="orderController">
    <form name="orderForm" ng-submit="submitOrderForm()" novalidate>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin khách hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                <div class="alert alert-danger" ng-show="orderForm.$invalid">
                    <ul>
                        <!-- Thông báo lỗi kh_email -->
                        <li><span class="error" ng-show="orderForm.kh_email.$error.required">Vui lòng nhập email</span></li>
                        <li><span class="error" ng-show="!orderForm.kh_email.$error.required && orderForm.kh_email.$error.pattern">Chỉ chấp nhập GMAIL, vui lòng kiểm tra lại</span></li>

                        <!-- Thông báo lỗi kh_taiKhoan -->
                        <li><span class="error" ng-show="orderForm.kh_taiKhoan.$error.required">Vui lòng nhập tên tài khoản</span></li>
                        <li><span class="error" ng-show="orderForm.kh_taiKhoan.$error.minlength">Tên tài khoản phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_taiKhoan.$error.maxlength">Tên tài khoản phải <= 50 ký tự</span> </li> 
                        <!-- Thông báo lỗi kh_hoTen -->
                        <li><span class="error" ng-show="orderForm.kh_hoTen.$error.required">Vui lòng nhập Họ tên</span></li>
                        <li><span class="error" ng-show="orderForm.kh_hoTen.$error.minlength">Họ tên phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_hoTen.$error.maxlength">Họ tên phải <= 100 ký tự</span> </li> 
                        <!-- Thông báo lỗi kh_gioiTinh -->
                        <li><span class="error" ng-show="orderForm.kh_gioiTinh.$error.required">Vui lòng chọn giới tính</span></li>

                       

                        <!-- Thông báo lỗi kh_diaChi -->
                        <li><span class="error" ng-show="orderForm.kh_diaChi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_diaChi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li> 
                        <!-- Thông báo lỗi kh_dienThoai -->
                        <li><span class="error" ng-show="orderForm.kh_dienThoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_dienThoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li> 
                    </ul> 
                </div> 

                <div class="form-group">
                    <label for="kh_taiKhoan">Tài khoản:</label>
                    <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" ng-model="kh_taiKhoan" ng-minlength="6" ng-maxlength="50" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_hoTen">Họ tên:</label>
                    <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" ng-model="kh_hoTen" ng-minlength="6" ng-maxlength="100" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="kh_gioiTinh">Giới tính:</label>
                    <select name="kh_gioiTinh" id="kh_gioiTinh" class="form-control" ng-model="kh_gioiTinh" ng-required=true>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kh_email">Email:</label>
                    <input type="email" class="form-control" id="kh_email" name="kh_email" ng-model="kh_email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                </div>
                
                <div class="form-group">
                    <label for="kh_diaChi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" ng-model="kh_diaChi" ng-minlength="6" ng-maxlength="250">
                </div>
                <div class="form-group">
                    <label for="kh_dienThoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" ng-model="kh_dienThoai" ng-minlength="6" ng-maxlength="11">
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <h2>Thông tin Đặt hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                <div class="alert alert-danger" ng-show="orderForm.$invalid">
                    <ul>
 
                        <!-- Thông báo lỗi ddh_diaChiGiaoHang -->
                        <li><span class="error" ng-show="orderForm.ddh_diaChiGiaoHang.$error.required">Vui lòng nhập Địa chỉ</span></li>
                        <li><span class="error" ng-show="orderForm.ddh_diaChiGiaoHang.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.ddh_diaChiGiaoHang.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li> 
                        <!-- Thông báo lỗi ddh_dienThoai -->
                        <li><span class="error" ng-show="orderForm.ddh_dienThoai.$error.required">Vui lòng nhập Điện thoại</span></li>
                        <li><span class="error" ng-show="orderForm.ddh_dienThoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.ddh_dienThoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li>
                        <!-- Thông báo lỗi htvc_ma -->
                        <li><span class="error" ng-show="orderForm.htvc_ma.$error.required">Vui lòng chọn Hình thức vận chuyển</span></li>

                        
                    </ul>
                </div>
                
                <div class="form-group">
                    <label for="ddh_diaChiGiaoHang">Địa chỉ giao hàng:</label>
                    <input type="text" class="form-control" id="ddh_diaChiGiaoHang" name="ddh_diaChiGiaoHang" ng-model="ddh_diaChiGiaoHang" ng-minlength="6" ng-maxlength="250" ng-required=true>
                </div>
                <div class="form-group">
                    <label for="ddh_dienThoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="ddh_dienThoai" name="ddh_dienThoai" ng-model="ddh_dienThoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                </div>
                
                <div class="form-group">
                    <label for="htvc_ma">Hình thức vận chuyển:</label>
                    <select name="htvc_ma" id="htvc_ma" class="form-control" ng-model="htvc_ma" ng-required=true>
                        @foreach($danhsachvanchuyen as $htvc)
                        <option value="{{ $htvc->htvc_ma }}">{{ $htvc->htvc_ten }} ({{ $htvc->htvc_chiPhi }} vnđ)</option>
                        @endforeach
                    </select>
                </div>
               
            </div>
        </div>

        <!-- Div Thông báo validate hợp lệ 
        Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$valid = true
        Sử dụng tiền chỉ lệnh ng-show="orderForm.$valid"
        -->
        <div class="alert alert-success" ng-show="orderForm.$valid">
            Thông tin hợp lệ, vui lòng bấm nút <b>"Thanh toán"</b> để hoàn tất ĐƠN HÀNG<br />
            Chúng tôi sẽ gởi mail đển quý khách. Xin chân thành cám ơn Quý Khách hàng đã tin tưởng sản phẩm của chúng tôi.
        </div>
        <!-- Nút submit form -->
        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
            Thanh toán
        </button>
    </form>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `orderController`
    app.controller('orderController', function($scope, $http, ngCart) {
        $scope.ngCart = ngCart;

        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitOrderForm = function() {
            debugger;
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.orderForm.$valid) {
                // lấy data của Form
                var dataInputOrderForm_KhachHang = {
                    "kh_taiKhoan": $scope.orderForm.kh_taiKhoan.$viewValue,
                    "kh_hoTen": $scope.orderForm.kh_hoTen.$viewValue,
                    "kh_gioiTinh": $scope.orderForm.kh_gioiTinh.$viewValue,
                    "kh_email": $scope.orderForm.kh_email.$viewValue,
                   
                    "kh_diaChi": $scope.orderForm.kh_diaChi.$viewValue,
                    "kh_dienThoai": $scope.orderForm.kh_dienThoai.$viewValue,
                };

                var dataInputOrderForm_DonDatHang = {
                   
                    "ddh_diaChiGiaoHang": $scope.orderForm.ddh_diaChiGiaoHang.$viewValue,
                    "ddh_dienThoai": $scope.orderForm.ddh_dienThoai.$viewValue,
                    
                    "htvc_ma": $scope.orderForm.htvc_ma.$viewValue,
           
                };

                var dataCart = ngCart.getCart();

                var dataInputOrderForm = {
                    "khachhang": dataInputOrderForm_KhachHang,
                    "dondathang": dataInputOrderForm_DonDatHang,
                    "giohang": dataCart,
                    "_token": "{{ csrf_token() }}",
                };

                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.order`
                $http({
                    url: "{{ route('frontend.order') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputOrderForm)
                }).then(function successCallback(response) {
                    // Clear giỏ hàng ngCart
                    //$scope.ngCart.empty();

                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');

                    // Chuyển sang trang Hoàn tất đặt hàng
                    if (response.data.redirectUrl) {
                        location.href = response.data.redirectUrl;
                    }
                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>
@endsection