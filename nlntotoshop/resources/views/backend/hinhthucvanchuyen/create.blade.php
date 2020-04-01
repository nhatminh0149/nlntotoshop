@extends('backend.layouts.master')

    @section('title')
        Thêm mới hình thức vận chuyển
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

        <h4 style="text-align: center;">THÊM MỚI HÌNH THỨC VẬN CHUYỂN</h4>
        <form id="themHinhThucVanChuyen" name="themHinhThucVanChuyen" method="post" action="{{ route('danhsachhinhthucvanchuyen.store') }}">
            {{ csrf_field() }}
        
            <div class="form-group">
                <label for="htvc_ten">Tên hình thức vận chuyển</label>
                <input type="text" class="form-control" id="htvc_ten" name="htvc_ten" value="{{ old('htvc_ten') }}">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
                @if($errors->has("htvc_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("htvc_ten")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="htvc_chiPhi">chi phí vận chuyển</label>
                <input type="number" class="form-control" id="htvc_chiPhi" name="htvc_chiPhi" value="{{ old('htvc_chiPhi') }}">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
                @if($errors->has("htvc_chiPhi"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("htvc_chiPhi")}}
                    </div>                 
                @endif
            </div>

            <div class="form-group">
                <label for="htvc_dienGiai">Diễn giải</label>
                <input type="text" class="form-control" id="htvc_dienGiai" name="htvc_dienGiai" value="{{ old('htvc_dienGiai') }}">
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
                @if($errors->has("htvc_dienGiai"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("htvc_dienGiai")}}
                    </div>                 
                @endif
            </div>
            
            <button type="submit" class="btn btn-outline-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Lưu</button>
        </form>
    @endsection

    @section('custom-scripts')   
      
    @endsection

<!-- folder storage sinh ra nhờ thực hiện lệnh php artisan storage:link -->
