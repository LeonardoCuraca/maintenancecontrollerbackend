<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresa extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('empresa')) {  
            Schema::create('empresa', function(Blueprint $table){
                $table->increments('id_empresa');
                $table->string('razon_social',50);
                $table->string('ruc',11);
                $table->string('dom_fiscal',150);
                $table->string('telefono',9);
                $table->string('per_contacto',60);
                $table->string('per_telefono',9);
                $table->integer('fk_id_tipo_relacion');
                $table->integer('estado')->length(4);
            });
        }    
    }

    public function down()
    {
        //Schema::dropIfExists('empresa');
    }
}
