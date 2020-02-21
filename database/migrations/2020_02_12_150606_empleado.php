<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleado extends Migration
{
    public function up()
    {
        Schema::create('empleado_mantenimiento' , function (Blueprint $table) {
                    $table->increments('id' );//Empleado Areas mantenimiento
                    $table->string('nombres');
                    $table->string('apellidos');
                    $table->integer('area_id')->unsigned();
                    $table->foreign('area_id')->references('id')->on('area_mantenimiento');
                    //$table->string('productividad');
                });
    }

    public function down()
    {
        Schema::dropIfExists('empleado_mantenimiento');
    }
}
