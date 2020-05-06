{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Danh sách khách hàng
@endsection

{{-- Thay thế nội dung vào Placeholder `content` của view `backend.layouts.index` --}}
@section('content')
<!-- Đây là div hiển thị Kết quả (thành công, thất bại) sau khi thực hiện các chức năng Thêm, Sửa, Xóa.
- Div này chỉ hiển thị khi trong Session có các key `alert-*` từ Controller trả về.
- Sử dụng các class của Bootstrap "danger", "warning", "success", "info" để hiển thị màu cho đúng với trạng thái kết quả.
-->


<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<!-- Tạo nút Thêm mới sản phẩm
- Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
- Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachsanpham.create`
- Sẽ có dạng http://tenmiencuaban.com/admin/danhsachsanpham/create
-->
<h4 style="background: #0c0805; color: #f6a519; margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px"> DANH SÁCH KHÁCH HÀNG </h4>

<!-- Tạo table hiển thị danh sách các sản phẩm -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã KH</th>
            <th>Tài khoản</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Email</th>>
            <th>Trạng thái</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachkhachhang as $kh)
            <tr>
                <td>{{ $kh->kh_ma }}</td>
                <td>{{ $kh->kh_taiKhoan }}</td>
                <td>{{ $kh->kh_hoTen }}</td>
                <td>
                    @if (($kh->kh_gioiTinh) == 0)
                       {{ 'Nữ' }}
                    @elseif (($kh->kh_gioiTinh) == 1) 
                        {{ 'Nam' }}
                    @else 
                        {{ 'Khác' }}
                    @endif
                </td>
                <td>{{ $kh->kh_email }}</td>
                <td>
                    @if (($kh->kh_trangThai) == 0)
                        {{ 'User' }}
                    @elseif (($kh->kh_trangThai) == 1) 
                            {{ 'Admin' }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('danhsachkhachhang.edit', ['id' => $kh->kh_ma]) }}" class="btn btn-outline-dark pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
                    <form method="post" action="{{ route('danhsachkhachhang.destroy', ['id' => $kh->kh_ma]) }}" class="pull-left">
                        <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                        <!-- <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        &nbsp;<button type="submit" class="btn btn-outline-dark"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa</button> -->
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('danhsachkhachhang.create') }}" class="btn btn-outline-dark"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Thêm mới khách hàng</a><br><br>
{{ $danhsachkhachhang->links() }}
@endsection
