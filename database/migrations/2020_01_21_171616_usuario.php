<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuario extends Migration
{
    public function up()
    {
        Schema::create('users' , function (Blueprint $table) {
                        $table->increments('id' );                     
                        $table->string('nombre');
                        //$table->string('area_id');
                        $table->string('email');
                        $table->string('password');
                        $table->timestamps();
                        $table->string('estado');
                        $table->integer('rol_id')->unsigned();
                        $table->foreign('rol_id')->references('id')->on('rol_mantenimiento');
                });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
