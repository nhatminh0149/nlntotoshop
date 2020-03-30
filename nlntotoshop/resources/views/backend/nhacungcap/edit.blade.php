@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh nhà cung cấp
@endsection

@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
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

    <h4 style="text-align: center;">CẬP NHẬT NHÀ CUNG CẤP</h4>
    <form id="luuNhaCungCap" name="luuNhaCungCap" method="post" action="{{ route('danhsachnhacungcap.update', ['id' => $ncc->ncc_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="ncc_ma">Mã nhà cung cấp</label>
            <input type="text" class="form-control" id="ncc_ma" name="ncc_ma" value="{{ $ncc->ncc_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="ncc_ten">Tên nhà cung cấp</label>
            <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" value="{{ old('ncc_ten', $ncc->ncc_ten) }}">
        </div>

        <div class="form-group">
            <label for="ncc_diaChi">Địa chỉ</label>
            <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" value="{{ old('ncc_diaChi', $ncc->ncc_diaChi) }}">
        </div>

        <div class="form-group">
            <label for="ncc_dienThoai">Điện thoại</label>
            <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" value="{{ old('ncc_dienThoai', $ncc->ncc_dienThoai) }}">
        </div>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
    </form>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
            $("#luuNhaCungCap").validate({
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
                        digits: true,
                    },
                },
                messages: {
                    ncc_ten: {
                        required: "Vui lòng nhập Tên nhà cung cấp",
                    },
                    ncc_diaChi: {
                        required: "Vui lòng nhập Địa chỉ hà cung cấp",
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