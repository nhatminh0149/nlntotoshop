<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKichcospTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kichcosp', function (Blueprint $table) {
            $table->unsignedTinyInteger('kcsp_ma')->autoIncrement()->comment('Ma kich co sp');
            $table->string('kcsp_ten')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kichcosp');
    }
}
