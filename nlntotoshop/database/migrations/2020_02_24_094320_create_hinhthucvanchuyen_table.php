<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhthucvanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhthucvanchuyen', function (Blueprint $table) {
            $table->unsignedTinyInteger('htvc_ma')->autoIncrement();
            $table->string('htvc_ten');
            $table->unsignedInteger('htvc_chiPhi')->default('0')->comment('Phí giao hàng');
            $table->text('htvc_dienGiai')->comment('Thông tin dịch vụ giao hàng');
            
            $table->unique(['htvc_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhthucvanchuyen');
    }
}
