<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Marca extends Migration
{

    public function up()
    {
        if (!Schema::hasTable('marca')) {      
            Schema::create('marca', function(Blueprint $table){
                $table->increments('id_marca');
                $table->string('nombre',30);
            });
        }    
    }

    public function down()
    {
        //Schema::dropIfExists('marca');
    }
}
