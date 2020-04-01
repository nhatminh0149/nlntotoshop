@extends('backend.layouts.master')

@section('title')
    Hiệu chỉnh hình thức vận chuyển
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

    <h4 style="text-align: center;">CẬP NHẬT HÌNH THỨC VẬN CHUYỂN</h4>
    <form id="luuHinhThucVanChuyen" name="luuHinhThucVanChuyen" method="post" action="{{ route('danhsachhinhthucvanchuyen.update', ['id' => $htvc->htvc_ma]) }}">
        <input type="hidden" name="_method" value="PUT" />
        {{ csrf_field() }}
        <div class="form-group">
            <label for="htvc_ma">Mã hình thức vận chuyển</label>
            <input type="text" class="form-control" id="htvc_ma" name="htvc_ma" value="{{ $htvc->htvc_ma }}" readonly>
        </div>

        <div class="form-group">
            <label for="htvc_ten">Tên hình thức vận chuyển</label>
            <input type="text" class="form-control" id="htvc_ten" name="htvc_ten" value="{{ old('htvc_ten', $htvc->htvc_ten) }}">
                @if($errors->has("htvc_ten"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("htvc_ten")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="htvc_chiPhi">Chi phí vận chuyển</label>
            <input type="text" class="form-control" id="htvc_chiPhi" name="htvc_chiPhi" value="{{ old('htvc_chiPhi', $htvc->htvc_chiPhi) }}">
                @if($errors->has("htvc_chiPhi"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("htvc_chiPhi")}}
                    </div>                 
                @endif
        </div>

        <div class="form-group">
            <label for="htvc_dienGiai">Diễn giải</label>
            <input type="text" class="form-control" id="htvc_dienGiai" name="htvc_dienGiai" value="{{ old('htvc_dienGiai', $htvc->htvc_dienGiai) }}">
                @if($errors->has("htvc_dienGiai"))
                    <div class="a" style="color: red; font-style: italic; font-size: 14px;">
                        {{$errors->first("htvc_dienGiai")}}
                    </div>                 
                @endif
        </div>

        <button type="submit" class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Cập nhật</button>
    </form>
@endsection

@section('custom-scripts')

@endsection