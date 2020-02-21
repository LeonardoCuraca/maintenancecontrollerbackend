<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Area extends Migration
{
    public function up()
    {
        Schema::create('area_mantenimiento' , function (Blueprint $table) {
                        $table->increments('id');
                        $table->string('nombre');
                        $table->integer('encargado_id')->unsigned()->nullable();//extra
                $table->foreign('encargado_id')->references('id')->on('users');
                        $table->timestamps();
                });
    }

    public function down()
    {
        Schema::dropIfExists('area_mantenimiento');
    }
}
