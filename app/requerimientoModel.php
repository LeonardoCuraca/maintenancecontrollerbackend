<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requerimientoModel extends Model
{
    protected $table = 'requerimiento';//Definir
    protected $fillable = ['id', 'descripcion', 'conformidad','observaciones', 'ot_id'];
}
