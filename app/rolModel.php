<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rolModel extends Model
{
    protected $table = 'rol_mantenimiento';//Definir
    protected $fillable = ['id', 'rol_name'];
}
