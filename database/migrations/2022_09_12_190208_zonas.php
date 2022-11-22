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

        Schema::create('zonas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('siglas');
            $table->string('descripcion');
            $table->bigInteger('gerencia_id')->unsigned();
            $table->foreign('gerencia_id')->references('id')->on('gerencias')->onDelete('cascade');
            /*$table->bigInteger('proceso_id')->unsigned();
            $table->foreign('proceso_id')->references('id')->on('tipoprocesos')->onDelete('cascade');*/
            $table->timestamps();
        



           // $table->unsignedBigInteger('id_gerencias');
          // $table->foreign('id_gerencia')->references('id_gerencia')->on('gerencia');
            //$table->unsignedBigInteger('id_proceso');
          //  $table->foreign('id_proceso')->references('id_proceso')->on('tipo_proceso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('zonas');
    }
};
