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
        <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$errors->first("ncc_ten")}}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->

        <h4 style="text-align: center;">THÊM MỚI NHÀ CUNG CẤP</h4>
        <form id="themNhaCungCap" name="themNhaCungCap" method="post" action="{{ route('danhsachnhacungcap.store') }}">
            {{ csrf_field() }}
        
            <div class="form-group">
                <label for="ncc_ten">Tên nhà cung cấp</label>
                <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" value="{{ old('ncc_ten') }}">
                    @if($errors->has("ncc_ten"))
                        <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                            {{$errors->first("ncc_ten")}}
                        </div>                 
                    @endif
                <!-- "old" để lấy ra input cũ từ view, Nếu không tìm thấy input cũ thì sẽ trả về null. -->
            </div>

            <div class="form-group">
                <label for="ncc_diaChi">Địa chỉ</label>
                <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" value="{{ old('ncc_diaChi') }}">
                    @if($errors->has("ncc_diaChi"))
                        <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                            {{$errors->first("ncc_diaChi")}}
                        </div>                 
                    @endif
            </div>

            <div class="form-group">
                <label for="ncc_dienThoai">Điện thoại</label>
                <input type="text" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" value="{{ old('ncc_dienThoai') }}">
                    @if($errors->has("ncc_dienThoai"))
                        <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                            {{$errors->first("ncc_dienThoai")}}
                        </div>                 
                    @endif
            </div>
            
            <button type="submit" class="btn btn-outline-dark"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Lưu</button>
        </form>
    @endsection

    @section('custom-scripts')
      
    @endsection

<!-- folder storage sinh ra nhờ thực hiện lệnh php artisan storage:link -->
