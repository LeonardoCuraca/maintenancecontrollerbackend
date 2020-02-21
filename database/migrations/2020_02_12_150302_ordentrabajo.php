<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ordentrabajo extends Migration
{
    public function up()
    {
        Schema::create('ordentrabajo' , function (Blueprint $table) {
                        $table->increments('id', 6);
                        $table->string('correlativo',11)->unique();
                        $table->string('conductor');                       
                        $table->string('tipo_vehiculo')->nullable();
                        $table->string('dni');
                        $table->integer('area_id')->unsigned();
                        $table->string('operacion')->nullable();
        $table->string('aprobadas')->nullable()->default('0');//progreso
        $table->string('progreso_tareas')->nullable()->default('0');
                $table->date('fecha_ingreso');
                    $table->time('h_ingreso');        
                    $table->date('f_programada_inicio')->nullable();//f2
                    $table->time('h_programada_inicio')->nullable();
                    $table->date('f_programada_fin')->nullable();
                    $table->time('h_programada_fin')->nullable();
                    $table->date('f_inicio_real')->nullable();
                    $table->time('h_inicio_real')->nullable();
                    $table->date('f_fin_real')->nullable();
                    $table->time('h_fin_real')->nullable();
                $table->date('fecha_salida')->nullable();//f3
                        $table->string('acoplado', 7)->nullable();
                        $table->string('estado');//visualizar los pendientes
                        $table->string('prioridad');
                        $table->string('observaciones')->nullable();
                        $table->string('vehiculo_id', 7)->nullable();//extra
                        $table->string('placa_temporal', 7)->nullable();
        $table->foreign('vehiculo_id')->references('placa')->on('vehiculo');
        $table->foreign('area_id')->references('id')->on('area_mantenimiento');
        $table->foreign('acoplado')->references('placa')->on('vehiculo');
        $table->timestamps();
                });
    }

    public function down()
    {
        Schema::dropIfExists('ordentrabajo');
    }
}
