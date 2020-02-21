<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitudModel extends Model
{
    protected $table = 'solicitud';//Definir
    protected $fillable = ['id', 'solicitante', 'fecha',
                           'hora', 'ot_id'];
}
