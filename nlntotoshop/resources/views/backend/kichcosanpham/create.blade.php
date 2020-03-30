@extends('backend.layouts.master')

    @section('title')
        Thêm mới kích cỡ sản phẩm
    @endsection

    @section('custom-css')
        <!-- Các css dành cho thư viện bootstrap-fileinput -->
        <link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
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

        <h4 style="text-align: center;">THÊM MỚI KÍCH CỠ SẢN PHẨM</h4>
        <form id="themKichCoSanPham" name="themKichCoSanPham" method="post" action="{{ route('danhsachkichcosanpham.store') }}">
            {{ csrf_field() }}
        
            <div class="form-group">
                <label for="kcsp_ten">Tên kích cỡ sản phẩm</label>
                <input type="text" class="form-control" id="kcsp_ten" name="kcsp_ten" value="{{ old('kcsp_ten') }}">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
                @if($errors->has("kcsp_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("kcsp_ten")}}
                    </div>                 
                @endif
            </div>
            
            <button type="submit" class="btn btn-outline-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Lưu</button>
        </form>
    @endsection

    @section('custom-scripts')
    
      
    @endsection

<!-- folder storage sinh ra nhờ thực hiện lệnh php artisan storage:link -->
