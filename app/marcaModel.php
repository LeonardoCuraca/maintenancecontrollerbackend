<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marcaModel extends Model
{
    protected $table = 'marca';

    protected $fillable = ['id_marca' , 'nombre'];
}
