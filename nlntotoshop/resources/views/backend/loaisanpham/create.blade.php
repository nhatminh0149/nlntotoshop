@extends('backend.layouts.master')

@section('title')
    Thêm mới loại sản phẩm
@endsection

@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
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
    
    <h4 style="text-align: center;">THÊM MỚI LOẠI SẢN PHẨM</h4>
    <form id="themLoaiSanPham" name="themLoaiSanPham" method="post" action="{{ route('danhsachloaisanpham.store') }}">
        {{ csrf_field() }}
       
        <div class="form-group">
            <label for="l_ten">Tên loại sản phẩm</label>
            <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ old('l_ten') }}">
        </div>
        
        <div class="form-group">
            <label for="l_ngaytaoMoi">Ngày tạo mới</label>
            <input type="date" class="form-control" id="l_ngaytaoMoi" name="l_ngaytaoMoi" value="{{ old('l_ngaytaoMoi') }}" data-mask-datetime>
        </div>
        <div class="form-group">
            <label for="l_ngaycapNhat">Ngày cập nhật</label>
            <input type="date" class="form-control" id="l_ngaycapNhat" name="l_ngaycapNhat" value="{{ old('l_ngaycapNhat') }}" data-mask-datetime>
        </div>

        <div class="form-group">
            <label for="ncc_ma">Nhà cung cấp</label>
            <select name="ncc_ma" class="form-control">
                @foreach($danhsachnhacungcap as $ncc)
                    @if(old('ncc_ma') == $ncc->ncc_ma)
                    <option value="{{ $ncc->ncc_ma }}" selected>{{ $ncc->ncc_ten }}</option>
                    @else
                    <option value="{{ $ncc->ncc_ma }}">{{ $ncc->ncc_ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function () {
            $("#themLoaiSanPham").validate({
                rules: {
                    l_ten: {
                        required: true,
                    },   
                },
                messages: {
                    l_ten: {
                        required: "Vui lòng nhập Tên Loại sản phẩm",
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
