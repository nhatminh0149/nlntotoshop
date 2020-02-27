<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->unsignedTinyInteger('ncc_ma')->autoIncrement()->comment('Ma ncc');
            $table->string('ncc_ten', 100);
            $table->string('ncc_diaChi', 250);
            $table->string('ncc_dienThoai', 15);
            $table->timestamp('ncc_taoMoi')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ncc_capNhat')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
           
            $table->unique(['ncc_ten', 'ncc_dienThoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
