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
        //metod up se ejecuta primero y crea la tabla 'users'
        //que contiene los parametros que se le asignaran a la tabla (id,name,email,email_verified_at,password,remembertoken,timestamps)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    //metodo down elimina la tabla 'users'
    {
        Schema::dropIfExists('users');
    }
};
