<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MSolicitado extends Migration
{
    public function up()
    {
        Schema::create('m_solicitado' , function (Blueprint $table) {
                        $table->increments('id' );// esto es "material"
                        $table->string('material_id', 12)->nullable();//foreign a Material
                        $table->string('solicitada');//descripcion del material
                        $table->integer('cantidad_solicitada');//cantidad solicitada
                        $table->string('asignada')->nullable();//material asignada
                        $table->integer('cantidad_asignada')->nullable();//cantidad aprobada
                        $table->integer('solicitud_id')->unsigned();

                        $table->foreign('solicitud_id')->references('id')->on('solicitud');
                        $table->foreign('material_id')->references('id')->on('material');
                        $table->timestamps();
                });
    }

    public function down()
    {
         Schema::dropIfExists('m_solicitado');
    }
}
