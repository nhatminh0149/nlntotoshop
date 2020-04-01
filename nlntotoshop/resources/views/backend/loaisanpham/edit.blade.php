@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh loại sản phẩm
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

    <h4 style="text-align: center;">CẬP NHẬT LOẠI SẢN PHẨM</h4>
    <form id="luuLoaiSanPham" name="luuLoaiSanPham" method="post" action="{{ route('danhsachloaisanpham.update', ['id' => $l->l_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="l_ma">Mã loại</label>
            <input type="text" class="form-control" id="l_ma" name="l_ma" value="{{ $l->l_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="l_ten">Tên loại</label>
            <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ old('l_ten', $l->l_ten) }}">
                @if($errors->has("l_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("l_ten")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="ncc_ma">Nhà cung cấp</label>
            <select name="ncc_ma" class="form-control">
                @foreach($danhsachnhacungcap as $ncc)
                    @if($ncc->ncc_ma == $l->ncc_ma)
                    <option value="{{ $ncc->ncc_ma }}" selected>{{ $ncc->ncc_ten }}</option>
                    @else
                    <option value="{{ $ncc->ncc_ma }}">{{ $ncc->ncc_ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
    </form>
@endsection

@section('custom-scripts')
    <!-- <script>
        $(document).ready(function () {
            $("#luuLoaiSanPham").validate({
                rules: {
                    l_ten: {
                        required: true,
                    },
                },
                messages: {
                    l_ten: {
                        required: "Vui lòng nhập Tên loại sản phẩm",
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