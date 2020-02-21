<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class involucradoModel extends Model
{
    protected $table = 'involucrado';//Definir
    protected $fillable = ['id', 'empleado_id', 'ot_id'];
}
