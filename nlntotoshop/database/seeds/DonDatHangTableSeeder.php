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
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'số 11, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0923444555',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 2,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'số 15, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 3,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'số 15, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 4,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'số 15, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 5,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'số 15, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 1,
            ],
            [
                'ddh_ma'                => 6,
                'kh_ma'                 => 3,
                'ddh_thoiGianDatHang'   => $today,
                'ddh_diaChiGiaoHang'    => 'số 15, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TPCT',
                'ddh_dienThoai'         => '0923444666',
                'ddh_trangThai'         => 1,
                'htvc_ma'               => 1,
            ],
        ];
        DB::table('dondathang')->insert($list);
    }
}
