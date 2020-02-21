<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lubricacionModel extends Model
{
    protected $table = 'lubricacion';
    protected $fillable = ['id', 'lubricante_id', 'cantidad' , 'fecha' , 
                           'fecha_estimada' , 'km_anterior', 'km_actual',
                           'km_estimado' , 'km_final' , 'ot_id' ,
                           'vehiculo_id' , 'modelo_vehiculo'];//modelo manual
}
