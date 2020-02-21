<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tipovehiculo extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('tipovehiculo')) {  
            Schema::create('tipovehiculo', function(Blueprint $table){
             $table->increments('id_tipovehiculo');
             $table->string('nombre',20);
            });
        }    
    }

    public function down()
    {
        //Schema::dropIfExists('tipovehiculo');
    }
}
