<?php

use Illuminate\Database\Seeder;

class KichCoSPTableSeeder extends Seeder
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
                'kcsp_ma'       => 1,
                'kcsp_ten'      => "S",  
            ], 
            [
                'kcsp_ma'       => 2,
                'kcsp_ten'      => "M",  
            ], 
            [
                'kcsp_ma'       => 3,
                'kcsp_ten'      => "L",  
            ], 
            [
                'kcsp_ma'       => 4,
                'kcsp_ten'      => "XL",  
            ], 
            
        ];
        DB::table('kichcosp')->insert($list);
    }
}
