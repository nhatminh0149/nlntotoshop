<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->bigIncrements('kh_ma');
            $table->string('kh_taiKhoan', 50);
            $table->string('kh_matKhau', 256);
            $table->string('kh_hoTen', 100);
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('0-Nữ, 1-Nam, 2-Khác');
            $table->string('kh_email', 100);
            $table->unsignedTinyInteger('kh_trangThai')->default('2')->comment('0-User, 1-Admin');
            
            $table->unique(['kh_taiKhoan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
