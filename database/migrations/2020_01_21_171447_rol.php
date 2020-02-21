<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rol extends Migration
{
    public function up()
    {
        Schema::create('rol_mantenimiento' , function (Blueprint $table) {
                        $table->increments('id' );                     
                        $table->string('rol_name');
                        $table->timestamps();
                });
    }

    public function down()
    {
         Schema::dropIfExists('rol_mantenimiento');
    }
}
