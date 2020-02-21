<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empleadoModel extends Model
{
    protected $table = 'empleado_mantenimiento';//Definir
    protected $fillable = ['id', 'nombres', 'apellidos' , 'area_id'];
}
