<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lubricante extends Migration
{
    public function up()
    {
        Schema::create('lubricante' , function (Blueprint $table) {
                        $table->increments('id' );                     
                        $table->string('descripcion');
                        $table->integer('costo');
                        $table->timestamps();
                });
    }

    public function down()
    {
         Schema::dropIfExists('lubricante');
    }
}
