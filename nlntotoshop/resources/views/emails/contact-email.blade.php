<table style="width: 100%; border-spacing: 0px">
    <tr>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; border-left: 1px solid black; width: 170px; padding: 5px; text-align: center;"> <img src="https://cdn.nhanh.vn/cdn/store/7136/store_1587022637_735.jpg" style="width: 170px; height: 120px;" /> </td>
        <td style="border-top: 1px solid black;border-bottom: 1px solid black;border-right: 1px solid black; text-align: center; vertical-align: middle; padding: 5px;">
            <h1 style="color: black;">Cửa hàng thời trang Toto Shop</h1>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black; padding: 5px; text-align: left; font-weight: bold;"> Đây là lời nhắn được gởi từ khách hàng có thông tin như sau: </td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: left; padding: 5px; width: 170px;">Email của khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{{ $data['email'] }}</td>
    </tr>
    <tr>
        <th style="border-bottom: 1px solid black;border-right: 1px solid black;border-left: 1px solid black;text-align: left; padding: 5px; width: 170px;">Lời nhắn của khách hàng:</th>
        <td style="border-bottom: 1px solid black;border-right: 1px solid black; padding: 5px;">{!! $data['message'] !!}</td>
    </tr>
</table>