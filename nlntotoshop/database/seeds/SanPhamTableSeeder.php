<?php

use Illuminate\Database\Seeder;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime('2020-02-27 09:00:00');
        $list=[
            [
                'sp_ma' => 1,
                'sp_ten' => 'ÁO THUN B1',
                'sp_gia' => '235000',
                'sp_hinh' => "aothunB1.jpg",
                'sp_thongTin' => 'Áo thun B1 màu đen với logo đơn giản tay ngắn, mang lại cảm giác trẻ trung, năng động cho người mặc.',
                // 'sp_trangThai' => '2',
                'l_ma' => '1',
            ],
            [
                'sp_ma' => 2,
                'sp_ten' => 'ÁO THUN B2',
                'sp_gia' => '245000',
                'sp_hinh' => "aothunB2.jpg",
                'sp_thongTin' => 'ÁO thun B2 màu vàng với họa tiết Puma tay ngắn, mang lại cảm giác trẻ trung, năng động cho người mặc.',
                // 'sp_trangThai' => '2',
                'l_ma' => '1',
            ],
            [
                'sp_ma' => 3,
                'sp_ten' => 'ÁO THUN B3',
                'sp_gia' => '245000',
                'sp_hinh' => "aothunB3.jpg",
                'sp_thongTin' => 'Áo thun B3 tay ngắn, màu đen, đa họa tiết, mang lại cảm giác trẻ trung, năng động cho người mặc.',
                // 'sp_trangThai' => '2',
                'l_ma' => '1',
            ],
            [
                'sp_ma' => 4,
                'sp_ten' => 'ÁO THUN B4',
                'sp_gia' => '265000',
                'sp_hinh' => "aothunB4.jpg",
                'sp_thongTin' => 'Áo thun B4 ráp tay, màu xám đen, mang lại cảm giác trẻ trung, năng động cho người mặc.',
                // 'sp_trangThai' => '2',
                'l_ma' => '1',
            ],
            [
                'sp_ma' => 5,
                'sp_ten' => 'ÁO THUN B5',
                'sp_gia' => '195000',
                'sp_hinh' => "aothunB5.jpg",
                'sp_thongTin' => 'Áo thun B5 tay ngắn, màu đen, logo lớn, mang lại cảm giác trẻ trung, năng động cho người mặc.',
                // 'sp_trangThai' => '2',
                'l_ma' => '1',
            ],
           
           
        ];

        DB::table('sanpham')->insert($list);
    }
}
