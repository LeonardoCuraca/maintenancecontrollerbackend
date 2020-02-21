<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresaModel extends Model
{
    protected $table = 'empresa';//Definir
    protected $fillable = ['id_empresa', 'razon_social', 'ruc' , 'dom_fiscal',
                           'telefono', 'per_contacto' , 'per_telefono' ,
                           'fk_id_tipo_relacion' , 'estado'];
}
