{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Đ Ă N G K Ý - P A G E
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
<style>
		table{
			margin: 0px auto;			
        }
        
		td{
			padding: 6px;
		}
       
        td input[type="text"],td input[type="password"],td input[type="file"]{
            background: none; 
            display: block;
            margin-left: 50px; 
            text-align:center;
            border: 1px solid grey;
            padding: 15px;
            width: 200px; 
            height:20px;
            outline:none;
            color:black; 
            border-radius:5px;
            font-size: 16px;
        }
        
        td input[type="submit"],td input[type="reset"] {
            background: none;
            display: inline-block;
            margin-left: 15px;
            margin-top: 15px;
            text-align:center;
            border:2px solid grey; 
            border-radius:5px;
            border-color: grey;
            width: 80px;
            height:30px;
            line-height:20px; 
            outline:none;
            color:black;    
        }

        td input[type="radio"]{
            margin-left: 30px;
        }
        
</style>
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style=" background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)),
            url('{{ asset('img/banner/banner8.jpg') }}') center no-repeat;">
    <h3 class="ltext-105 cl0 txt-center">
        Đ Ă N G &nbsp; K Ý
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
                </tr>
                <tr>
                    <td>Gõ lại mật khẩu: </td>
                    <td>
                        <input type="password" name="re_khmk"/>
                    </td>
                </tr>
                <tr>
                    <td>Họ tên:</td>
                    <td>
                        <input type="text" name="kh_hoTen"/>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td style="padding-left:60px">
                        <select name="kh_gioiTinh" id="kh_gioiTinh">
                            <option value="0">Nữ</option>
                            <option value="1">Nam</option>
                            <option value="2">Khác</option>
                        </select>
                    </td>
                </tr>             
                <tr>	
                    <td>Email:</td>
                    <td>
                        <input name="kh_email" type="text" value="">
                    </td>
                </tr>
                <tr>	
                    <td>Địa chỉ:</td>
                    <td>
                        <input name="kh_diaChi" type="text" value="">
                    </td>
                </tr>
                <tr>	
                    <td>SĐT:</td><td><input name="kh_dienThoai" type="text" value=""></td>
                </tr>
            
                <tr>
                    <td></td>
                    <td style="padding-left:50px">
                        <input type="submit" name="submitDK" value="OK"/>
                        <input type="reset" value="RESET"/> 
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