{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Danh sách đơn đặt hàng
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
<h4 style="background: #0c0805; color: #f6a519; margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">DANH SÁCH ĐƠN ĐẶT HÀNG</h4>
<!-- Tạo table hiển thị danh sách các sản phẩm -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã ĐĐH</th>
            <th>Tài khoản KH</th>
            <th>Ngày lập</th>
            <th>Nơi giao</th>
            <th>SĐT</th>
            <th>Tổng tiền</th>
            <th>Trạng thái xử lý</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachdondathang as $ddh)
            <tr>
                <td>{{ $ddh->ddh_ma }}</td>
                <td></td>
                <td>{{ $ddh->ddh_thoiGianDatHang }}</td>
                <td>{{ $ddh->ddh_diaChiGiaoHang }}</td>
                <td>{{ $ddh->ddh_dienThoai }}</td>
                <td></td>
                <td>{{ $ddh->ddh_trangThai }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $danhsachdondathang->links() }}
@endsection
