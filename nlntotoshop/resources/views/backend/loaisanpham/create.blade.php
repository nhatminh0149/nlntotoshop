@extends('backend.layouts.master')

@section('title')
    Thêm mới loại sản phẩm
@endsection

@section('custom-css')
    <!-- Các css dành cho thư viện bootstrap-fileinput -->
    <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
    

@section('content')

    <!-- show lỗi sai lên màn hình nếu có -->
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    
    <h4 style="text-align: center;">THÊM MỚI LOẠI SẢN PHẨM</h4>
    <form id="themLoaiSanPham" name="themLoaiSanPham" method="post" action="{{ route('danhsachloaisanpham.store') }}">
        {{ csrf_field() }}
       
        <div class="form-group">
            <label for="l_ten">Tên loại sản phẩm</label>
            <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ old('l_ten') }}">
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
                    @if(old('ncc_ma') == $ncc->ncc_ma)
                        <option value="{{ $ncc->ncc_ma }}" selected>{{ $ncc->ncc_ten }}</option>
                    @else
                        <option value="{{ $ncc->ncc_ma }}">{{ $ncc->ncc_ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Lưu</button>
    </form>
@endsection
@section('custom-scripts')
    
@endsection

                        <!-- folder storage sinh ra nhờ thực hiện lệnh php artisan storage:link -->
