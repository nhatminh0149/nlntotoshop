{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Danh sách nhà cung cấp
@endsection

{{-- Thay thế nội dung vào Placeholder `content` của view `backend.layouts.index` --}}
@section('content')
    <!-- Đây là div hiển thị Kết quả (thành công, thất bại) sau khi thực hiện các chức năng Thêm, Sửa, Xóa.
    - Div này chỉ hiển thị khi trong Session có các key `alert-*` từ Controller trả về.
    - Sử dụng các class của Bootstrap "danger", "warning", "success", "info" để hiển thị màu cho đúng với trạng thái kết quả.
    -->
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info', 'dark'] as $msg)
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
    <h4 style="background: #0c0805; color: #f6a519; margin-bottom: -1px; text-align: center; border: 1px solid #ccc; padding: 10px">DANH SÁCH NHÀ CUNG CẤP</h4>
    <!-- Tạo table hiển thị danh sách các sản phẩm -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã NCC</th>
                <th>Tên NCC</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhsachnhacungcap as $ncc)
                <tr>
                    <td>{{ $ncc->ncc_ma }}</td>
                    <td>{{ $ncc->ncc_ten }}</td>
                    <td>{{ $ncc->ncc_diaChi }}</td>
                    <td>{{ $ncc->ncc_dienThoai }}</td>
                    <td>
                        <a href="{{ route('danhsachnhacungcap.edit', ['id' => $ncc->ncc_ma]) }}" class="btn btn-outline-dark pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
                        <form method="post" action="{{ route('danhsachnhacungcap.destroy', ['id' => $ncc->ncc_ma]) }}" class="pull-left">
                            <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            &nbsp;<button type="submit" class="btn btn-outline-dark"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('danhsachnhacungcap.create') }}" class="btn btn-outline-dark"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Thêm mới nhà cung cấp</a><br><br>
    {{ $danhsachnhacungcap->links() }}
@endsection
