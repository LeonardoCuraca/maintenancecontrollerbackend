<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IrregularidadesModel extends Model
{
    protected $table = 'irregularidades';
    protected $fillable = [
                          'id', 'ot_id', 'estado', 'mensaje', 'placa'
                          ];
}
