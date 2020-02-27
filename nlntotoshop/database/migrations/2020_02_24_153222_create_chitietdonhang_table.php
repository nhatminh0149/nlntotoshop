<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->unsignedBigInteger('ddh_ma');
            $table->unsignedBigInteger('sp_ma');
            $table->unsignedTinyInteger('kcsp_ma');
            $table->unsignedTinyInteger('htvc_ma');
            $table->unsignedSmallInteger('ctdh_soLuong')->default('1');
            $table->unsignedInteger('ctdh_donGia')->default('1');
            
            $table->primary(['ddh_ma', 'sp_ma', 'htvc_ma']);
            $table->foreign('ddh_ma')->references('ddh_ma')->on('dondathang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');            
            $table->foreign('htvc_ma')->references('htvc_ma')->on('hinhthucvanchuyen')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('kcsp_ma')->references('kcsp_ma')->on('kichcosp')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
}
