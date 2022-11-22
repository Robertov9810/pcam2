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
      Schema::create('puntos', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->string('leyenda');
            $table->string('entity_name');
            $table->integer('bin_in')->unique();
            $table->integer('bin_out')->unique();
            $table->string('estatus');
            $table->BigInteger('estadopunto_id')->unsigned();
            $table->foreign('estadopunto_id')->references('id')->on('estadopuntos');
            $table->string('comentario');
            $table->string('control_validado');                                  
            $table->BigInteger('subestacion_id')->unsigned();
            $table->foreign('subestacion_id')->references('id')->on('subestaciones');
            $table->BigInteger('tipopunto_id')->unsigned();
            $table->foreign('tipopunto_id')->references('id')->on('tipopuntos');
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
     Schema::dropIfExists('puntos');
    }
};
