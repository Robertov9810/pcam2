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
        Schema::create('subestaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('siglas');
            $table->integer('voltaje');
            $table->string('enlace');
            $table->BigInteger('zona_id')->unsigned();
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->bigInteger('gerencia_id')->unsigned();
            $table->foreign('gerencia_id')->references('id')->on('gerencias')->onDelete('cascade');
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
        Schema::dropIfExists('subestaciones');
    }
};