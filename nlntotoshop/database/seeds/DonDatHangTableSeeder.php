<?php

use Illuminate\Database\Seeder;

class DonDatHangTableSeeder extends Seeder
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
                'ddh_ma'                => 1,
                'kh_ma'                 => 1,
                'ddh_thoiGianDatHang'   => '2020-03-09 09:30:15',
                'ddh_diaChiGiaoHang'    => 'Số 11, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0916990092',
                'ddh_trangThai'         => 2,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 2,
                'kh_ma'                 => 2,
                'ddh_thoiGianDatHang'   => '2020-04-08 08:11:30',
                'ddh_diaChiGiaoHang'    => 'Số 15, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0945991880',
                'ddh_trangThai'         => 2,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 3,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => '2020-04-12 08:41:30',
                'ddh_diaChiGiaoHang'    => 'Số 22, đường Trần Văn Tất, khóm 7, phường 1, TP. Bạc Liêu.  ',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 2,
                'htvc_ma'               => 4,
            ],
            [
                'ddh_ma'                => 4,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => '2020-04-12 09:30:30',
                'ddh_diaChiGiaoHang'    => 'Số 22, đường Trần Văn Tất, khóm 7, phường 1, TP. Bạc Liêu.  ',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 2,
                'htvc_ma'               => 4,
            ],
            [
                'ddh_ma'                => 5,
                'kh_ma'                 => 2,
                'ddh_thoiGianDatHang'   => '2020-05-01 11:29:11',
                'ddh_diaChiGiaoHang'    => 'Số 11, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT  ',
                'ddh_dienThoai'         => '0945991880',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 3,
            ],
            [
                'ddh_ma'                => 6,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'Số 22, đường Trần Văn Tất, khóm 7, phường 1, TP. Bạc Liêu.  ',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 4,
            ],
        ];
        DB::table('dondathang')->insert($list);
    }
}
