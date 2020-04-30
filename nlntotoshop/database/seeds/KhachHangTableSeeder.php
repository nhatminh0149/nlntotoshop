<?php

use Illuminate\Database\Seeder;

class KhachHangTableSeeder extends Seeder
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
            'kh_ma'        => '1',
            'kh_taiKhoan'  => 'admin',
            'kh_matKhau'   =>  md5('admin0149'),
            'kh_hoTen'     => 'Admin',
            'kh_gioiTinh'  => '0',
            'kh_email'     => 'tranlenhatminh97@gmail.com',
            'kh_diaChi'    => 'KTXB, đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0919589765',
            'kh_trangThai' => 1 // Admin 
            ],     
            [
            'kh_ma'        => '2',
            'kh_taiKhoan'  => 'queanh',
            'kh_matKhau'   =>  md5('queanh'),
            'kh_hoTen'     => 'Đường Quế Anh',
            'kh_gioiTinh'  => '0',
            'kh_email'     => 'queanhst98@gmail.com',
            'kh_diaChi'    => '98, đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0909000777',
            'kh_trangThai' => 0 // User 
            ],     
            [
            'kh_ma'        => '3',
            'kh_taiKhoan'  => 'didi',
            'kh_matKhau'   =>  md5('dididi'),
            'kh_hoTen'     => 'Nguyễn Phước Duy',
            'kh_gioiTinh'  => '1',
            'kh_email'     => 'didi@gmail.com',
            'kh_diaChi'    => 'Hẻm 56, đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0989222333',
            'kh_trangThai' => 0 // User 
            ],     
        ];
        DB::table('khachhang')->insert($list);
    }
}
