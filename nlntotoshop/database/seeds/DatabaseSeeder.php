<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(KichCoSPTableSeeder::class);
        $this->call(NhaCungCapTableSeeder::class);
        $this->call(LoaiSanPhamTableSeeder::class);
        $this->call(SanPhamTableSeeder::class);
        $this->call(HinhAnhTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(HinhThucVanChuyenTableSeeder::class);
        $this->call(DonDatHangTableSeeder::class);
        $this->call(ChiTietDonHangTableSeeder::class);
    }
}
