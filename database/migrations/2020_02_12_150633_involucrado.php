<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Involucrado extends Migration
{
    public function up()
    {
        Schema::create('involucrado' , function (Blueprint $table) {
                        $table->increments('id' );//Empleado Areas mantenimiento
                        $table->integer('empleado_id')->unsigned();
                        $table->integer('ot_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleado_mantenimiento');
                        $table->foreign('ot_id')->references('id')->on('ordentrabajo');
                        $table->timestamps();
                });
    }

    public function down()
    {
        Schema::dropIfExists('involucrado');
    }
}
