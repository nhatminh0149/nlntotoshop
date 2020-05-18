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
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">SP: Số lượng x Đơn giá:</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px; text-align: left;"> 
            <ul>
                @foreach($data['dondathang']['giohang'] as $item)
                <li>{{ $item['_name'] }}: {{ $item['_quantity'] }} x {{ $item['_price'] }}</li>
                @endforeach
            </ul>
        </td>
    </tr>

    <tr>
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">Tổng tiền sản phẩm:</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px; text-align: left;"> 
            <?php 
            $total=0;
            foreach($data['dondathang']['giohang'] as $item)
            {
                $total+=$item['_quantity'] * $item['_price'];
            }
            ?>
            {{ number_format($total, 0, ',' , ',') }} VNĐ
            
        </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">Tiền vận chuyển:</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px; text-align: left;"> 
            @if ($data['dondathang']['htvc_ma'] == 1)
                {{ '0 VNĐ (Nhận hàng trực tiếp tại cửa hàng)' }}
            @elseif($data['dondathang']['htvc_ma'] == 2)
                {{ '0 VNĐ (Nhận hàng trực tiếp qua bưu điện)' }}
            @elseif($data['dondathang']['htvc_ma'] == 3)
                {{ '5,000 VNĐ (Giao hàng trong khu vực nội ô thành phố)' }}
            @elseif($data['dondathang']['htvc_ma'] == 4)
                {{ '20,000 VNĐ (Chuyển phát tiêu chuẩn)' }}
            @elseif($data['dondathang']['htvc_ma'] == 5)
                {{ '30,000 VNĐ (Chuyển phát nhanh)' }}
            @endif
        </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black; border-right: 1px solid black; border-left: 1px solid black; text-align: right; padding: 5px;">Tổng hóa đơn:</th>
        <td style="border-bottom: 1px solid black; border-right: 1px solid black; padding: 5px; text-align: left;"> 
            <?php
                if($data['dondathang']['htvc_ma'] == 1){
                    $total=$total+0;
                }
                if($data['dondathang']['htvc_ma'] == 2){
                    $total=$total+0;
                }
                if($data['dondathang']['htvc_ma'] == 3){
                    $total=$total+5000;
                }
                if($data['dondathang']['htvc_ma'] == 4){
                    $total=$total+20000;
                }
                if($data['dondathang']['htvc_ma'] == 5){
                    $total=$total+30000;
                }
            ?>
            {{ number_format($total, 0, ',' , ',') }} VNĐ
        </td>
    </tr>

</table>

