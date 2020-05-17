<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; border-left: 1px solid black; width: 170px; padding: 5px; text-align: center;"> <img src="https://cdn.nhanh.vn/cdn/store/7136/store_1587022637_735.jpg" style="width: 170px; height: 120px;" /> </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;">
            <h1 style="color: black;">T O T O S H O P</h1>
        </td>
    </tr>
    <tr>
        <th colspan="4" style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px;">
            Thông tin đơn hàng [{{ $data['dondathang']['ddh_ma'] }}]
        </th>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Tài khoản khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['khachhang']['kh_taiKhoan'] }}</td> 
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Họ tên khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['khachhang']['kh_hoTen'] }}</td> 
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Email khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['khachhang']['kh_email'] }}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">Thời gian đặt hàng:</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px;">{{ $data['dondathang']['ddh_thoiGianDatHang'] }}</td>
    </tr>
    <tr>

        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: right; padding: 5px;">Địa chỉ giao hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['dondathang']['ddh_diaChiGiaoHang'] }}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">Số điện thoại nhận hàng:</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px;">{{ $data['dondathang']['ddh_dienThoai'] }}</td> 
    </tr>
    
    <tr>
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">SP: Số lượng x Đơn giá</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px; text-align: left;"> 
            <ul>
                @foreach($data['dondathang']['giohang'] as $item)
                <li>{{ $item['_name'] }}: {{ $item['_quantity'] }} x {{ $item['_price'] }}</li>
                @endforeach
            </ul>
        </td>
    </tr>
</table>

