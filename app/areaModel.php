<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class areaModel extends Model
{
    protected $table = 'area_mantenimiento';//Definir
    protected $fillable = ['id', 'nombre', 'encargado_id'];
}
