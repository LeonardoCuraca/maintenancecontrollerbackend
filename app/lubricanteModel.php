<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lubricanteModel extends Model
{
    protected $table = 'lubricante';//Definir
    protected $fillable = ['id', 'descripcion', 'costo'];
}
