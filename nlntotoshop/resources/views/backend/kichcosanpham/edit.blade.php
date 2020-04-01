@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh kích cỡ sản phẩm
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

    <h4 style="text-align: center;">CẬP NHẬT KÍCH CỠ SẢN PHẨM</h4>
    <form id="luuKichCoSanPham" name="luuKichCoSanPham" method="post" action="{{ route('danhsachkichcosanpham.update', ['id' => $kcsp->kcsp_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="kcsp_ma">Mã nhà cung cấp</label>
            <input type="text" class="form-control" id="kcsp_ma" name="kcsp_ma" value="{{ $kcsp->kcsp_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="kcsp_ten">Tên</label>
            <input type="text" class="form-control" id="kcsp_ten" name="kcsp_ten" value="{{ old('kcsp_ten', $kcsp->kcsp_ten) }}">
                @if($errors->has("kcsp_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kcsp_ten")}}
                    </div>                 
                @endif
        </div>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
    </form>
@endsection

@section('custom-scripts')
    <!-- <script>
        $(document).ready(function () {
            $("#luuKichCoSanPham").validate({
                rules: {
                    kcsp_ten: {
                        required: true,
                    },
                },
                messages: {
                    kcsp_ten: {
                        required: "Vui lòng nhập Tên kích cỡ sản phẩm",
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
    </script> -->

@endsection