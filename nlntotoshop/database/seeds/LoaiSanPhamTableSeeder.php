<?php

use Illuminate\Database\Seeder;

class LoaiSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $today = new DateTime('2019-11-27 09:00:00');

        array_push($list, [
            'l_ma' => 1,
            'l_ten' => "Áo Nam",
            'l_ngaytaoMoi' => $today->format('Y-m-d H:i:s'),
            'l_ngaycapNhat' => $today->format('Y-m-d H:i:s'),
            'l_trangThai' => '2',
            'ncc_ma' => '1',
        ]);
        array_push($list, [
            'l_ma' => 2,
            'l_ten' => "Quần Nam",
            'l_ngaytaoMoi' => $today->format('Y-m-d H:i:s'),
            'l_ngaycapNhat' => $today->format('Y-m-d H:i:s'),
            'l_trangThai' => '2',
            'ncc_ma' => '2',
        ]);
        array_push($list, [
            'l_ma' => 3,
            'l_ten' => "Áo Nữ",
            'l_ngaytaoMoi' => $today->format('Y-m-d H:i:s'),
            'l_ngaycapNhat' => $today->format('Y-m-d H:i:s'),
            'l_trangThai' => '2',
            'ncc_ma' => '3',
        ]);
        array_push($list, [
            'l_ma' => 4,
            'l_ten' => "Quần Nữ",
            'l_ngaytaoMoi' => $today->format('Y-m-d H:i:s'),
            'l_ngaycapNhat' => $today->format('Y-m-d H:i:s'),
            'l_trangThai' => '2',
            'ncc_ma' => '1',
        ]);
        array_push($list, [
            'l_ma' => 5,
            'l_ten' => "Đồ Đôi",
            'l_ngaytaoMoi' => $today->format('Y-m-d H:i:s'),
            'l_ngaycapNhat' => $today->format('Y-m-d H:i:s'),
            'l_trangThai' => '2',
            'ncc_ma' => '2',
        ]);
        DB::table('loaisanpham')->insert($list);
    }
}
