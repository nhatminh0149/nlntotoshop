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
                'kcsp_ma'        => 1,
                'htvc_ma'        => 1,
                'ctdh_soLuong'   => '2',
                'ctdh_donGia'    => '235000',
            ],
            [
                'ddh_ma'         => 2,
                'sp_ma'          => 35,
                'kcsp_ma'        => 2,
                'htvc_ma'        => 2,
                'ctdh_soLuong'   => '2',
                'ctdh_donGia'    => '880000',
            ],      
        ];
        DB::table('chitietdonhang')->insert($list);
    }
}
