{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Đ Ă N G N H Ậ P - P A G E
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<style>
		table{
			margin: 0px auto;
			
		}
		td{
			padding: 10px;
		}
		td input[type="text"],td input[type="password"]{
			background: none; 
			display: block;
			margin-left: 50px; 
			text-align:center;
			border: 1px solid grey;
			padding:15px;
			width: 200px; 
			height:20px;
			outline:none;
			color:black; 
			border-radius:5px;
			font-size: 16px;
		}
		
		td input[type="submit"] {
			background: none;
			display: inline-block;
			margin-left: 15px;
			margin-top: 15px;
			text-align:center;
			border:2px solid grey; 
			border-radius: 5px;
			border-color:grey;
			width: 80px;
			height:30px;
			line-height:20px; 
			outline:none;
			color:black;
			
		}
</style>
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style=" background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;">
    <h3 class="ltext-105 cl0 txt-center">
        Đ Ă N G &nbsp; N H Ậ P
    </h3>
</section>

<div class="container">
	<div class="content mt-5">
		<form action="#" method="POST">
			<table>
				<tr>
					<td>Tên tài khoản:</td>
					<td>
						<input type="text" name="kh_taiKhoan"/>
					</td>
				</tr>
				<tr>
					<td>Mật khẩu:</td>
					<td>
						<input type="password" name="kh_matKhau"/>
					</td>
				<tr>
					<td></td>
					<td style="padding-left:50px">
						<input type="submit" name="dangky" value="Đăng ký"/>
						<input type="submit" name="dangnhap" value="Đăng nhập"/> 
					</td>
				</tr>
				
			</table>
		</form>
	</div>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')

@endsection