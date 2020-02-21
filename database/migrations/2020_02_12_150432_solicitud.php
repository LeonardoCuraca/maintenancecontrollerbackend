<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solicitud extends Migration
{
    public function up()
    {
        Schema::create('solicitud' , function (Blueprint $table) {
                        $table->increments('id' );// esto es "material"
                        $table->string('solicitante');
                        $table->date('fecha');
                        $table->time('hora');
                        $table->integer('ot_id')->unsigned();//Del "OT" sacamos el vehiculo_id
                    $table->foreign('ot_id')->references('id')->on('ordentrabajo');
                        $table->timestamps();
                });
    }

    public function down()
    {
         Schema::dropIfExists('solicitud');
    }
}
