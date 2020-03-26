@extends('backend.layouts.master')

    @section('title')
        Thêm mới nhà cung cấp
    @endsection

    @section('custom-css')
        <!-- Các css dành cho thư viện bootstrap-fileinput -->
        <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    @endsection
    

    @section('content')

        <!-- show lỗi sai lên màn hình nếu có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h4 style="text-align: center;">THÊM MỚI NHÀ CUNG CẤP</h4>
        <form id="themNhaCungCap" name="themNhaCungCap" method="post" action="{{ route('danhsachnhacungcap.store') }}">
            {{ csrf_field() }}
        
            <div class="form-group">
                <label for="ncc_ten">Tên nhà cung cấp</label>
                <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" value="{{ old('ncc_ten') }}">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
            </div>

            <div class="form-group">
                <label for="ncc_diaChi">Địa chỉ</label>
                <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" value="{{ old('ncc_diaChi') }}">
            </div>

            <div class="form-group">
                <label for="ncc_dienThoai">Điện thoại</label>
                <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" value="{{ old('ncc_dienThoai') }}">
            </div>
            
            <div class="form-group">
                <label for="ncc_taoMoi">Ngày tạo mới</label>
                <input type="date" class="form-control" id="ncc_taoMoi" name="ncc_taoMoi" value="{{ old('ncc_taoMoi') }}" data-mask-datetime>
            </div>
            <div class="form-group">
                <label for="ncc_capNhat">Ngày cập nhật</label>
                <input type="date" class="form-control" id="ncc_capNhat" name="ncc_capNhat" value="{{ old('ncc_capNhat') }}" data-mask-datetime>
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    @endsection

    @section('custom-scripts')
    <script>
        $(document).ready(function () {
            $("#themNhaCungCap").validate({
                rules: {
                    ncc_ten: {
                        required: true,
                    },
                    ncc_diaChi: {
                        required: true,
                    },
                    ncc_dienThoai: {
                        required: true,
                        minlength: 10,
                        maxlength: 11,
                        digits: true
                    },
                },
                messages: {
                    ncc_ten: {
                        required: "Vui lòng nhập Tên Nhà cung cấp",
                    },
                    ncc_diaChi: {
                        required: "Vui lòng nhập Địa chỉ Nhà cung cấp",
                    },
                    ncc_dienThoai: {
                        required: "Vui lòng nhập Số điện thoại Nhà cung cấp",
                        minlength: "Số điện thoại phải ít nhất 10 kí tự",
                        maxlength: "Số điện thoại không được vượt quá 11 kí tự",
                        digits: "Vui lòng nhập số"
                    },
                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Thêm class `invalid-feedback` cho field đang có lỗi
                    error.addClass("invalid-feedback");
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                    // Thêm icon "Kiểm tra không Hợp lệ"
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                            .insertAfter(element);
                    }
                },
                success: function (label, element) {
                    // Thêm icon "Kiểm tra Hợp lệ"
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                            .insertAfter($(element));
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                }
            });
        });
    </script>
      
    @endsection

<!-- folder storage sinh ra nhờ thực hiện lệnh php artisan storage:link -->
