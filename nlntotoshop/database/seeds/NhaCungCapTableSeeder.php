<?php

use Illuminate\Database\Seeder;

class NhaCungCapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $today = new DateTime('2020-02-26 09:00:00');

        array_push($list, [
            'ncc_ma'        => '1',
            'ncc_ten'       => 'Công Ty TNHH May Mặc Dony',
            'ncc_diaChi'    => '142/4 Bàu Cát 2, P.12, Q. Tân Bình Tp. Hồ Chí Minh',
            'ncc_dienThoai' => '0862675818',
        ]);
        array_push($list, [
            'ncc_ma'        => '2',
            'ncc_ten'       => 'Thời Trang Thiết Kế Cao Cấp Liveevil',
            'ncc_diaChi'    => '172 Phố Huế, Q. Hai Bà Trưng, Hà Nội',
            'ncc_dienThoai' => '0918757480',
        ]);
        array_push($list, [
            'ncc_ma'        => '3',
            'ncc_ten'       => 'Công Ty TNHH Sản Xuất & Thương Mại Vĩnh Tài',
            'ncc_diaChi'    => '351/7 Lê Văn Sỹ, Phường 13, Quận 3, Tp. Hồ Chí Minh',
            'ncc_dienThoai' => '0903738111',
        ]);
        DB::table('nhacungcap')->insert($list);
    }
}
