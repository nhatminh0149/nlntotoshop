<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('sp_ma');
            $table->string('sp_ten')->unique();
            $table->unsignedInteger('sp_gia')->default('0');
            $table->string('sp_hinh');
            $table->text('sp_thongTin');
            // $table->tinyInteger('sp_trangThai')->default('2')->comment('Trạng thái:1, 2');
            $table->unsignedTinyInteger('l_ma');   
    
            $table->foreign('l_ma')->references('l_ma')->on('loaisanpham') ->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
