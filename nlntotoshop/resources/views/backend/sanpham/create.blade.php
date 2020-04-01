@extends('backend.layouts.master')
@section('title')
Thêm mới sản phẩm
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

    <form method="post" action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="l_ma">Loại sản phẩm</label>
            <select name="l_ma" class="form-control">
                @foreach($danhsachloai as $loai)
                    @if(old('l_ma') == $loai->l_ma)
                    <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                    @else
                    <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten') }}">
                @if($errors->has("sp_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("sp_ten")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="sp_gia">Giá sản phẩm</label>
            <input type="number" class="form-control" id="sp_gia" name="sp_gia" value="{{ old('sp_gia') }}">
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
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin') }}">
                @if($errors->has("sp_thongTin"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("sp_thongTin")}}
                    </div>                 
                @endif
        </div>

        <!-- <select name="sp_trangThai" class="form-control">
            <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
            <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        </select> -->

        <div class="form-group">
            <label>Hình ảnh liên quan sản phẩm</label>
            <div class="file-loading">
                <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Lưu</button>
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
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false
            });
            $("#sp_hinhanhlienquan").fileinput({
                theme: 'fas',
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-outline-primary btn-md",
                fileType: "any",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                allowedFileExtensions: ["jpg", "gif", "png", "txt"]
            });
        });
    </script>

@endsection