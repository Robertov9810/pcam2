<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogos', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->BigInteger('zona_id')->unsigned();
        $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
        $table->BigInteger('subestacion_id')->unsigned();
        $table->foreign('subestacion_id')->references('id')->on('subestaciones')->onDelete('cascade');
        $table->string('siglas');
        $table->string('voltaje');
        $table->string('estatus');           
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogos');
    }
};
