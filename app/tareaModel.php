<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tareaModel extends Model
{
    protected $table = 'tarea';//Definir
    protected $fillable = ['id', 'descripcion', 'conformidad','observaciones', 'ot_id'];
}
