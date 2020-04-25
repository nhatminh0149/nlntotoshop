<?php

use Illuminate\Database\Seeder;

class ChiTietDonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime();
        $list = [
            [
                'ddh_ma'         => 1,
                'sp_ma'          => 1,
                'ctdh_soLuong'   => '2',
                'ctdh_donGia'    => '235000',
            ],      
        ];
        DB::table('chitietdonhang')->insert($list);
    }
}
