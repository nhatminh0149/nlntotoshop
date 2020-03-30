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
            'ncc_ma' => '1',
        ]);
        array_push($list, [
            'l_ma' => 2,
            'l_ten' => "Quần Nam",
            'ncc_ma' => '2',
        ]);
        array_push($list, [
            'l_ma' => 3,
            'l_ten' => "Áo Nữ",
            'ncc_ma' => '3',
        ]);
        array_push($list, [
            'l_ma' => 4,
            'l_ten' => "Quần Nữ",
            'ncc_ma' => '1',
        ]);
        array_push($list, [
            'l_ma' => 5,
            'l_ten' => "Đồ Đôi",
            'ncc_ma' => '2',
        ]);
        DB::table('loaisanpham')->insert($list);
    }
}
