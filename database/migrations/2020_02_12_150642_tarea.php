<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tarea extends Migration
{
    public function up()
    {
        Schema::create('tarea' , function (Blueprint $table) {
                        $table->increments('id' );                     
                        $table->string('descripcion');
                        $table->boolean('conformidad')->default('0');
                        $table->string('observaciones')->nullable();
                        $table->integer('ot_id')->unsigned();
                        $table->foreign('ot_id')->references('id')->on('ordentrabajo');
                        $table->timestamps();
                });
    }

    public function down()
    {
        Schema::dropIfExists('tarea');
    }
}
