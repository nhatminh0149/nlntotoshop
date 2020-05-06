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
            [
                'ddh_ma'         => 1,
                'sp_ma'          => 2,
                'ctdh_soLuong'   => '1',
                'ctdh_donGia'    => '245000',
            ],      
            [
                'ddh_ma'         => 2,
                'sp_ma'          => 21,
                'ctdh_soLuong'   => '1',
                'ctdh_donGia'    => '185000',
            ],      
            [
                'ddh_ma'         => 3,
                'sp_ma'          => 3,
                'ctdh_soLuong'   => '2',
                'ctdh_donGia'    => '245000',
            ],      
            [
                'ddh_ma'         => 4,
                'sp_ma'          => 5,
                'ctdh_soLuong'   => '1',
                'ctdh_donGia'    => '195000',
            ],      
            [
                'ddh_ma'         => 5,
                'sp_ma'          => 21,
                'ctdh_soLuong'   => '1',
                'ctdh_donGia'    => '185000',
            ],             
            [
                'ddh_ma'         => 6,
                'sp_ma'          => 12,
                'ctdh_soLuong'   => '1',
                'ctdh_donGia'    => '365000',
            ],      
        ];
        DB::table('chitietdonhang')->insert($list);
    }
}
