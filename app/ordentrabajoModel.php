<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordentrabajoModel extends Model
{
    protected $table = 'ordentrabajo';//Definir
    protected $fillable = [
    	'id', 'correlativo', 'conductor', 'tipo_vehiculo', 'area_id',
        'dni', 'acoplado', 'placa_temporal' ,
    	'estado' , 'vehiculo_id', 'observaciones', 'operacion', 'prioridad',
    	'aprobadas', 'progreso_tareas', 
        'fecha_ingreso', 'h_ingreso',
        'f_programada_inicio', 'h_programada_inicio',
        'f_programada_fin', 'h_programada_fin',
        'f_inicio_real','h_inicio_real',
        'f_fin_real','hora_fin_real','fecha_salida' ];
}
