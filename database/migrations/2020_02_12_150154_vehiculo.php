<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehiculo extends Migration
{
    public function up()
    {
        /*Schema::create('vehiculo' , function (Blueprint $table) {
                        $table->string('placa', 7);
                        $table->string('marca');
                        $table->string('tipo_vehiculo');
                        $table->string('n_ejes');
                        $table->string('alto');
                        $table->string('ancho');
                        $table->string('largo');
                        $table->primary('placa');
                });*/
        if (!Schema::hasTable('vehiculo')) {           
                Schema::create('vehiculo' , function (Blueprint $table) {
                        $table->increments('id_vehiculo',8);
                        $table->string('placa',7)->unique();
                        $table->string('prefijo',5);
                    $table->integer('fk_id_tipovehiculo')->unsigned();//por defecto es length 11
                        $table->integer('fk_id_carroceria');
                        $table->integer('fk_id_marca')->unsigned();
                        $table->integer('fk_id_modelo');
                        $table->integer('fk_id_categoria');
                        $table->integer('fk_id_empresa')->unsigned();
                        $table->integer('fk_id_status');
                        $table->string('serie_chasis',17);
                        $table->string('serie_motor',17);
                        $table->date('fecha')->nullable();
                        $table->integer('ejes')->length(1);
                        $table->double('carga_util',8,2);
                        $table->double('carga_neta',8,2);
                        $table->double('carga_bruta',8,2);
                        $table->double('alto',4,2);
                        $table->double('ancho',4,2);
                        $table->double('largo',4,2);
                        $table->string('observacion',100)->nullable();

$table->foreign('fk_id_tipovehiculo')->references('id_tipovehiculo')->on('tipovehiculo');
$table->foreign('fk_id_empresa')->references('id_empresa')->on('empresa');
$table->foreign('fk_id_marca')->references('id_marca')->on('marca');            
                });
        }                
    }

    public function down()
    {
        //Schema::dropIfExists('vehiculo');//Solo para pruebas
    }
}
