@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh sản phẩm
@endsection

@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
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
    <form id="luuSanPham" name="luuSanPham" method="post" action="{{ route('danhsachsanpham.update', ['id' => $sp->sp_ma]) }}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}

        <div class="form-group">
            <label for="sp_ma">Mã sản phẩm</label>
            <input type="text" class="form-control" id="sp_ma" name="sp_ma" value="{{ $sp->sp_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="l_ma">Loại sản phẩm</label>
            <select name="l_ma" class="form-control">
                @foreach($danhsachloai as $loai)
                    @if($loai->l_ma == $sp->l_ma)
                    <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                    @else
                    <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten', $sp->sp_ten) }}">
                @if($errors->has("sp_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("sp_ten")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="sp_gia">Giá sản phẩm</label>
            <input type="number" class="form-control" id="sp_gia" name="sp_gia" value="{{ old('sp_gia', $sp->sp_gia) }}">
                @if($errors->has("sp_gia"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("sp_gia")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="sp_hinh">Hình đại diện</label>
            <div class="file-loading">     
                <input id="sp_hinh" type="file" name="sp_hinh">
            </div>
                @if($errors->has("sp_hinh"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("sp_hinh")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="sp_thongTin">Thông tin</label>
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin', $sp->sp_thongTin) }}">
                @if($errors->has("sp_thongTin"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("sp_thongTin")}}
                    </div>                 
                @endif
        </div>

        
        <div class="form-group">
            <label>Hình ảnh liên quan sản phẩm</label>
            <div class="file-loading">
                <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
    </form>
@endsection

@section('custom-scripts')
    <!-- Các script dành cho thư viện bootstrap-fileinput -->
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#sp_hinh").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-outline-primary btn-md",
                fileType: "any",
                append: false,
                showRemove: false,
                autoReplace: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset('/storage/photos/' . $sp->sp_hinh) }}" //asset mặc định vào thư mục public
                ],
                initialPreviewConfig: [
                    {
                        caption: "{{ $sp->sp_hinh }}", 
                        size: {{ Storage::exists('public/photos/' . $sp->sp_hinh) ? Storage::size('public/photos/' . $sp->sp_hinh) : 0 }}, 
                        width: "120px", 
                        url: "{$url}", 
                        key: 1
                    },
                ]
            });
            $("#sp_hinhanhlienquan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-outline-primary btn-md",
                fileType: "any",
                append: false,
                showRemove: false,
                autoReplace: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                allowedFileExtensions: ["jpg", "gif", "png", "txt"],
                initialPreviewShowDelete: false,
                initialPreviewAsData: true,
                initialPreview: [
                    @foreach($sp->hinhanhlienquan()->get() as $hinhAnh)
                    "{{ asset('/storage/photos/' . $hinhAnh->ha_ten) }}",
                    @endforeach
                ],
                initialPreviewConfig: [
                    @foreach($sp->hinhanhlienquan()->get() as $index=>$hinhAnh)
                    {
                        caption: "{{ $hinhAnh->ha_ten }}", 
                        size: {{ Storage::exists('public/photos/' . $hinhAnh->ha_ten) ? Storage::size('public/photos/' . $hinhAnh->ha_ten) : 0 }}, 
                        width: "120px", 
                        url: "{$url}", 
                        key: {{ ($index + 1) }}
                    },
                    @endforeach
                ]
            });
        });
    </script>

<!-- <script>
        $(document).ready(function () {
            $("#luuSanPham").validate({
                rules: {
                    sp_ten: {
                        required: true,
                    },
                    sp_gia: {
                        required: true,
                        minlength: 6,
                        digits: true,
                    },
                    sp_hinh: {
                       
                        fileType: {
                            types: ["jpg", "gif", "png", "txt"],
                        },
                    },
                    sp_thongTin: {
                        required: true,
                    },
                },
                messages: {
                    sp_ten: {
                        required: "Vui lòng nhập Tên sản phẩm",
                    },
                    sp_gia: {
                        required: "Vui lòng nhập Giá sản phẩm",
                        minlength: "Giá sản phẩm phải ít nhất 6 kí tự",
                        digits: "Vui lòng nhập số"
                    },
                    sp_hinh: {
                        
                    },
                    sp_thongTin: {
                        required: "Vui lòng nhập Thông tin sản phẩm",
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