<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_solicitadoModel extends Model
{
    protected $table = 'm_solicitado';//Definir
    

    protected $fillable = ['id', 'material_id' ,'solicitada' , 'cantidad_solicitada' 
                         , 'asignada','cantidad_asignada','solicitud_id'];                     
}
