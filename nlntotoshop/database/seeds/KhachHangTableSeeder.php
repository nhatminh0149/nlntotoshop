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
            'kh_taiKhoan'  => 'minhminh',
            'kh_matKhau'   => bcrypt('minhminh'),
            'kh_hoTen'     => 'Nguyễn Minh Minh',
            'kh_gioiTinh'  => '0',
            'kh_email'     => 'minhb1606911@student.ctu.edu.vn',
            'kh_diaChi'    => '12, đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0919589765',
            'kh_trangThai' => 2 // Khả dụng  
            ],     
            [
            'kh_ma'        => '2',
            'kh_taiKhoan'  => 'queanh',
            'kh_matKhau'   => bcrypt('queanh'),
            'kh_hoTen'     => 'Đường Quế Anh',
            'kh_gioiTinh'  => '0',
            'kh_email'     => 'queanhst98@gmail.com',
            'kh_diaChi'    => '98, đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0909000777',
            'kh_trangThai' => 2 // Khả dụng  
            ],     
            [
            'kh_ma'        => '3',
            'kh_taiKhoan'  => 'didi',
            'kh_matKhau'   => bcrypt('didi'),
            'kh_hoTen'     => 'Nguyễn Phước Duy',
            'kh_gioiTinh'  => '1',
            'kh_email'     => 'didi@gmail.com',
            'kh_diaChi'    => 'Hẻm 56, đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, TP Cần Thơ',
            'kh_dienThoai' => '0989222333',
            'kh_trangThai' => 2 // Khả dụng  
            ],     
        ];
        DB::table('khachhang')->insert($list);
    }
}
