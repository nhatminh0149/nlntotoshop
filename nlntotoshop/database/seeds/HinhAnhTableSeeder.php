<?php

use Illuminate\Database\Seeder;

class HinhAnhTableSeeder extends Seeder
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
                'sp_ma'          => 1,
                'ha_stt'        => 1,
                'ha_ten'        => 'aothunB1.jpg',
            ],     
        ];
        DB::table('hinhanh')->insert($list);
    }
}
