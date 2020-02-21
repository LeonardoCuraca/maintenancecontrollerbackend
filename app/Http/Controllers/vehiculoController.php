<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\vehiculoModel;
use App\ordentrabajoModel;

use Carbon\Carbon;

class vehiculoController extends Controller
{
    
    public function notificacion($vehiculo_id, $area_id){
    	
    $Data = DB::select('select * from ordentrabajo where vehiculo_id="'.$vehiculo_id.'" and area_id="'.$area_id.'" order by fecha_salida desc limit 2');

    $fecha_salida_1 = $Data[0]-> fecha_ingreso;
    $fecha_salida_2 = $Data[1]-> fecha_salida;

    $var1 = Carbon::parse($fecha_salida_1);
    $var2 = Carbon::parse($fecha_salida_2);

    $diasDiferencia = $var1->diffInDays($var2);

    if($diasDiferencia<3){
       //notificar
    	$notification = array(
            'message' => 'Este vehiculo ha ingresado recientemente',
            'alert-type' => 'success'
    	);

    }else{
       $notification = array(
            'message' => 'OT registrada correctamente',
            'alert-type' => 'info'
    	);
       return $notification;
    }

    return $diasDiferencia;

    }
    
}
