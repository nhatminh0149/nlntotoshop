<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->unsignedTinyInteger('l_ma')->autoIncrement()->comment('Ma loai san pham');
            $table->string('l_ten', 100)->unique()->comment('Tên loại sản phẩm');
            $table->unsignedTinyInteger('ncc_ma');

            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap') ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaisanpham');
    }
}
