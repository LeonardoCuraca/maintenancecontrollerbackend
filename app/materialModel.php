<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materialModel extends Model
{
    protected $table = 'material';//Definir
    protected $fillable = ['id', 'descripcion', 'UM' , 'costo'];
}
