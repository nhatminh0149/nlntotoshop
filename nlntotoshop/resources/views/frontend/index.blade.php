{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
T O T O S H O P 
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Slider -->
@include('frontend.widgets.homepage-slider')

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
@endsection