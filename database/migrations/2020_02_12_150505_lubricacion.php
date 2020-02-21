<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lubricacion extends Migration
{
    
    public function up()
    {
        Schema::create('Lubricacion' , function (Blueprint $table) {
                        $table->increments('id' );                     
                        $table->integer('lubricante_id')->unsigned();
                        $table->integer('cantidad');
                        $table->date('fecha');
                        $table->date('fecha_estimada')->nullable();;
                        $table->string('km_anterior')->nullable();//En caso medidor km dañado
                        $table->string('km_actual')->nullable();//En caso medidor km dañado
                        $table->string('km_estimado')->nullable();//En caso medidor km dañado
                        $table->string('km_final')->nullable();//En caso medidor km dañado
                        $table->integer('ot_id')->unsigned();//ok
                        //$table->string('vehiculo_id');//auto
                        //$table->string('tipo_vehiculo');
                        //$table->string('marca_vehiculo');
                        $table->string('modelo_vehiculo');//Manual
                        
                        $table->foreign('ot_id')->references('id')->on('ordentrabajo');
                        $table->foreign('lubricante_id')->references('id')->on('lubricante');
                        $table->timestamps();
                });
    }

    public function down()
    {
         Schema::dropIfExists('Lubricacion');
    }
}
