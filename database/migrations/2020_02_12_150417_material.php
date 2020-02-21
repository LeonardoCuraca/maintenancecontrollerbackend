<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Material extends Migration
{
    public function up()
    {
        Schema::create('material' , function (Blueprint $table) {
                        $table->string('id', 12);//String y primary key
                        $table->string('descripcion');
                        $table->string('UM');
                        $table->double('costo');
                        $table->primary('id');
                        //$table->string('stock');//Almacen
                        //$table->string('almacen_id');//almacen
                        //$table->string('provedor');//almacen
                });
    }

    public function down()
    {
         Schema::dropIfExists('material');
    }
}
