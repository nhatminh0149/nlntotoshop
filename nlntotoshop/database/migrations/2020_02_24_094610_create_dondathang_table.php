<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDondathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dondathang', function (Blueprint $table) {
            $table->bigIncrements('ddh_ma')->comment('Mã đơn đặt hàng');
            $table->unsignedBigInteger('kh_ma');
            $table->dateTime('ddh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('ddh_diaChiGiaoHang', 250);
            $table->string('ddh_dienThoai', 11);
            $table->unsignedTinyInteger('ddh_trangThai')->default('1')->comment('1-chưa xử lý, 2-đã xử lý');
            $table->unsignedTinyInteger('htvc_ma');

            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('htvc_ma')->references('htvc_ma')->on('hinhthucvanchuyen')->onDelete('CASCADE')->onUpdate('CASCADE');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dondathang');
    }
}
