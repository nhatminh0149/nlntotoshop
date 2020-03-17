<?php

use Illuminate\Database\Seeder;

class HinhThucVanChuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'htvc_ma'     => 1,
                'htvc_ten'    => "Nhận hàng trực tiếp tại cửa hàng",
                'htvc_chiPhi'   => 0,
                'htvc_dienGiai' => "Áp dụng cho quý khách trong nội ô. Nhận hàng trực tiếp tại cửa hàng.",
            ],   
            [
                'htvc_ma'     => 2,
                'htvc_ten'    => "Nhận hàng trực tiếp qua bưu điện",
                'htvc_chiPhi'   => 0,
                'htvc_dienGiai' => "Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.",
            ], 
            [
                'htvc_ma'     => 3,
                'htvc_ten'    => "Chuyển phát tiêu chuẩn",
                'htvc_chiPhi'   => 20000,
                'htvc_dienGiai' => "Nhận hàng trong vòng từ 3 đến 5 ngày",
            ], 
            [
                'htvc_ma'     => 4,
                'htvc_ten'    => "Chuyển phát nhanh",
                'htvc_chiPhi'   => 30000,
                'htvc_dienGiai' => "Nhận hàng trong vòng từ 2 đến 3 ngày",
            ], 
            [
                'htvc_ma'     => 5,
                'htvc_ten'    => "Chuyển phát hỏa tốc",
                'htvc_chiPhi'   => 40000,
                'htvc_dienGiai' => "Nhận hàng trong vòng 24h",
            ], 
            
        ];
        DB::table('hinhthucvanchuyen')->insert($list);
    }
}
