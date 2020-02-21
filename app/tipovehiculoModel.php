<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipovehiculoModel extends Model
{
      protected $table = 'tipovehiculo';

      protected $fillable = ['id_tipovehiculo' , 'nombre'];
}
