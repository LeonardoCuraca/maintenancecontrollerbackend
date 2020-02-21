<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ordentrabajoModel;
use App\vehiculoModel;
use App\requerimientoModel;
use App\tareaModel;
use App\tipovehiculoModel;
use App\DateTime;
use App\IrregularidadesModel;

use Illuminate\Support\Facades\DB;

class ordentrabajoController extends Controller
{
    public function index()
    {
     return response()->json(['status'=>'ok','data'=>ordentrabajoModel::all(), 200]);
    }

    public function multifiltro($campo1,$valor1,$campo2,$valor2,$campo3,$valor3)
    {
    //Tiene 3 niveles pero 1 valor por campo
        if($campo1 == true and $valor1 == true){
            if($campo2 == true and $valor2 == true){
                if($campo3 == true and $valor3 == true){
                     $sql='select * from ordentrabajo where '.$campo1.'="'.$valor1.'" and '.$campo2.'="'.$valor2.'" and '.$campo3.'="'.$valor3.'"';
                }else{
                    $sql='select * from ordentrabajo where '.$campo1.'="'.$valor1.'" and '.$campo2.'="'.$valor2.'"';
                }
            }else{
              $sql='select * from ordentrabajo where '.$campo1.'="'.$valor1.'"';
            }
        }else{
            return "No hay parametros";
        }
        $respuesta=DB::select($sql);
        return $respuesta;
    }


  public function query(Request $request){//TIENE 2 NIVELES

    $size_request = sizeof($request->data);
    $consulta= "select * from ordentrabajo where "; //where
    $query="";
    $var=-1;
    $conter=0;
    $mult=1;
    $w=0;
    $multiplicacion=1;
if($size_request > 0){

    for ($x=0; $x < $size_request ; $x++) {
          foreach ($request->data[$x] as $key_request => $values) {
            $size_campo= sizeof($values);
          }
          $multiplicacion=$multiplicacion*$size_campo;
    }

    $max= $size_request*$multiplicacion;

    for ($ide=0; $ide < $size_request; $ide++) {

        foreach ($request->data[$ide] as $key_request => $valores) {
            $campo= $key_request;
            $size_campo= sizeof($valores);//tamaño de cada arrar campo
        }
        $ultimate= $size_request-1;
        $ultimate2= $size_campo-1;

      for ($i=0; $i < $size_campo; $i++) {
            $i=$conter;
            $w=$w+1;
          if($ide == $ultimate){ //llego a la superficie
               $var=$var+1;
            if($var == $ultimate2){//llego a la superficie y ultima rama
                  if($w == $max){//recorrio todo
                    $query = $query.' '.$campo.' ="'.$valores[$var].'"';
                    $i=$ultimate2;
                    $ide=$ultimate;
                    //return "Este es el fin del ciclo";
                  }else{
                  $query = $query.' '.$campo.' ="'.$valores[$var].'" or ';
                  $conter=$conter+1;
                  $ide=-1;
                  $i=$ultimate2;
                  $var=-1;
                  }
            }elseif($var < $size_campo){
                   $query = $query.' '.$campo.' ="'.$valores[$var].'" or ';
                   $i=$ultimate2;
                   $ide=-1;
            }else{
                   return "Solo tiene 2 niveles";
            }
          }else{
                $query = $query.' '.$campo.' ="'.$valores[$i].'" and ';
                $i=$ultimate2;
          }
      }
    }
    $SQL = $consulta.' '.$query;
    $respuesta=DB::select($SQL);
    return $respuesta;
}else{
    return DB::select('select * from ordentrabajo');
}

}



  public function query_limitado(Request $request){

      $size_request = sizeof($request->data);
    $consulta= "select * from ordentrabajo where "; //where
    $query="";
    $var=-1;
    $conter=0;
    $mult=1;
    $w=0;
    $multiplicacion=1;
if($size_request > 0){

    for ($ide=0; $ide < $size_request; $ide++) {

        foreach ($request->data[$ide] as $key_request => $valor) {
            $campo= $key_request;
        }
        $query = $query.' and '.$campo.' ="'.$valor[0].'"';
    }

    $sinand= substr($query,5) ;
    $SQL = $consulta.' '.$sinand;
    $respuesta=DB::select($SQL);
    return $respuesta;
}else{
    return DB::select('select * from ordentrabajo');
}

    }



    public function otcount() {
      return sizeof(ordentrabajoModel::all());
    }

    public function store(Request $request)
    {   $notificacion=false;
        $ote = new ordentrabajoModel;
        $ote->correlativo = $request->get('correlativo');
        $ote->conductor = $request->get('conductor');
        $ote->dni = $request->get('dni');
        $ote->estado = $request->get('estado');
        $placa= $request->get('vehiculo_id');
        $vehiculo = vehiculoModel::where('placa', $placa)->get();
        if(sizeof($vehiculo)<1){
            $ote->vehiculo_id = null;
            $ote->placa_temporal = $placa;
            $ote->tipo_vehiculo = null;
            $ote->acoplado = null;
            $notificacion = true;
        }else{
        $ote->acoplado = $request->get('acoplado');
        $ote->vehiculo_id = $request->get('vehiculo_id');//paso 1
        $ote->placa_temporal = null;
        $id_tipo_vehiculo = $vehiculo[0] -> fk_id_tipovehiculo;
        $tipo = tipovehiculoModel::where('id_tipovehiculo', $id_tipo_vehiculo)->get();
        $ote->tipo_vehiculo = $tipo[0] -> nombre;
        }
        $ote->area_id = $request->get('area_id');
        $ote->operacion = $request->get('operacion');
        $ote->prioridad = $request->get('prioridad');
        $ote->fecha_ingreso = $request->get('fecha_ingreso');
        $ote->h_ingreso = $request->get('h_ingreso');
        if($notificacion==true){
          $codigo_acceso = $request->get('codigo_acceso');
          if($codigo_acceso==1){//Entra aqui si ya notifico que la placa no existe
                $ote->save();
                $irregularidad = new IrregularidadesModel;
                $irregularidad->ot_id = $ote->id;//$id_ot;
                $irregularidad->estado = "1";
                $irregularidad->mensaje = "Se ha registrado una OT con una placa inexistente";
                $irregularidad->placa = $ote->placa_temporal;
                $irregularidad->save();
                $mensaje = array(
                'message' => 'Se ha registrado una OT con una placa inexistente',
                'alert-type' => 'success');
                return $mensaje;
          }else{
            return 1;//En caso de que aun no ha avisado de que la placa no existe
          }
        }else{//En caso de que la placa si existe
            $ote->save();
            $mensaje = array(
            'message' => 'Esta OT ha sido registrada correctamente',
            'alert-type' => 'success');
            return $mensaje;
        }
    }

    public function findByCorrelativo($correlativo) {
      return response()->json(['status'=>'ok','data'=>ordentrabajoModel::where('correlativo', $correlativo)->get(), 200]);
    }

    public function otesarea($area_id){
        //listado de otes por area
        return response()->json(['status'=>'ok','data'=>ordentrabajoModel::where('area_id', $area_id)->get()], 200);
    }

    public function otesarea_count($area_id){
        //conteo de otes por area
        $otes = ordentrabajoModel::where('area_id', $area_id)->get();
        return sizeof($otes);
    }


    public function ot_empresa($id_empresa){
        $vehiculos= vehiculoModel::where('fk_id_empresa', $id_empresa)->get();
        $size_vehiculos = sizeof($vehiculos);
        $consulta= "select * from ordentrabajo where ";
        $query = "";
        for ($i=0; $i < $size_vehiculos; $i++) {
          $var = $vehiculos[$i]-> placa;
          $query = $query.' or vehiculo_id ="'.$var.'"';
        }
      $sinand = substr($query, 4);
      $SQL = $consulta.' '.$sinand;
      $respuesta = DB::select($SQL);
      return $respuesta;
    }

    public function ot_operacion($operacion){
        $data= ordentrabajoModel::where('operacion', $operacion)->get();
        return $data;
    }

    public function conteo($id_reque)//cabia de estado al requerimiento
    {//y actualiza el porcentaje
      $requerimiento = requerimientoModel::where('id', $id_reque)->get();
      $requerimiento[0]->conformidad = !$requerimiento[0]->conformidad;
      $requerimiento[0]->save();

      $id_ot = $requerimiento[0]-> ot_id;

      $requerimientos = requerimientoModel::where('ot_id', $id_ot)->get();

      $complete = 0;

      for ($i = 0; $i < sizeof($requerimientos); $i++) {
        if ($requerimientos[$i]->conformidad == 1) {
          $complete = $complete + 1;
        }
      }

      $percent = ($complete / sizeof($requerimientos) * 100);

      $ot = ordentrabajoModel::where('id', $id_ot)->get();
      $ot[0]->aprobadas = $percent;
      $ot[0]->save();

      return $ot[0]->aprobadas;

    }


    public function conteo_tarea($id_tarea)//actualiza el estado reque y porcentaje de ot
    {
      $tarea = tareaModel::where('id', $id_tarea)->get();
      $tarea[0]->conformidad = !$tarea[0]->conformidad;
      $tarea[0]->save();

      $id_ot = $tarea[0]-> ot_id;

      $tareas = tareaModel::where('ot_id', $id_ot)->get();

      $complete = 0;

      for ($i = 0; $i < sizeof($tareas); $i++) {
        if ($tareas[$i]->conformidad == 1) {
          $complete = $complete + 1;
        }
      }

      $percent = ($complete / sizeof($tareas) * 100);

      $ot = ordentrabajoModel::where('id', $id_ot)->get();
      $ot[0]->progreso_tareas = $percent;
      $ot[0]->save();

      return $ot[0]->progreso_tareas;

    }


    public function ote_area_estado($id_area, $estado){
        //listado por area y estado
        $ote_area_estado = DB::table('ordentrabajo')
        ->select(DB::raw('id, vehiculo_id , aprobadas'))//aprobadas = %
        ->where('area_id', '=' ,$id_area)
        ->where('estado', '=' , $estado)
        ->get();

        return $ote_area_estado;
    }

    public function ote_estado_general($estado){
        //listado por estado
        $ote_area_estado = DB::table('ordentrabajo')
        ->where('estado', '=' , $estado)
        ->get();

        return response()->json(['status'=>'ok','data'=>$ote_area_estado], 200);
    }

    public function ote_area_estado_general($id_area, $estado){
        //listado por area y estado
        $ote_area_estado = DB::table('ordentrabajo')
        ->where('area_id', '=' ,$id_area)
        ->where('estado', '=' , $estado)
        ->get();

        return response()->json(['status'=>'ok','data'=>$ote_area_estado], 200);
    }

    public function ote_area_estado_count($id_area, $estado){
        //conteo por area y estado
        $ote_area_estado = DB::table('ordentrabajo')
        ->select(DB::raw('id'))
        ->where('area_id', '=' ,$id_area)
        ->where('estado', '=' , $estado)
        ->get();

        return sizeof($ote_area_estado);
    }

    public function show($id)
    {
        return ordentrabajoModel::where('id', $id)->get();
    }

    public function paginacion($limite){

        $otes = DB::table('ordentrabajo')
                  ->orderBy('id','asc')
                  ->paginate($limite);

                  return $otes;
                  //return response()->json($otes);

        //http://localhost:8000/api/vehiculo/ote/conteo/10?page=2
    }

    public function pag_estado($estado){//remplaza al que no tiene paginacion

        $otes = DB::table('ordentrabajo')
                  //->select(DB::raw('id'))//añadir campos
                  ->where('estado' , '=' , $estado)
                  ->orderBy('id','asc')
                  ->paginate($limite);

                  return $otes;
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('America/Lima');

        $ote = ordentrabajoModel::find($id);
        $ote->correlativo = $Request->get('correlativo');
        $ote->conductor = $request->get('conductor');
        $ote->dni = $request->get('dni');
        $ote->estado = $request->get('estado');

        $ote->area_id = $request->get('area_id');
        $ote->operacion = $request->get('operacion');
        $ote->prioridad = $request->get('prioridad');
        $ote->observaciones = $request->get('observaciones');

        //fechas fase 1
        $ote->fecha_ingreso = $request->get('fecha_ingreso');
        $ote->h_ingreso = $request->get('h_ingreso');
        $ote->fecha_salida = $Request->get('fecha_salida');

        //calculo
        $placa= $request->get('vehiculo_id');
        $vehiculo = vehiculoModel::where('placa', $placa)->get();
        if(sizeof($vehiculo)<1){
            //return "llego aqui";
            $ote->vehiculo_id = null;//prueba
            $ote->placa_temporal = $placa;
            $ote->tipo_vehiculo = null;
            $ote->acoplado = null;
        }else{
        $ote->acoplado = $request->get('acoplado');
        $ote->vehiculo_id = $request->get('vehiculo_id');//paso 1
        $ote->placa_temporal = null;
        $id_tipo_vehiculo = $vehiculo[0] -> fk_id_tipovehiculo;
        $tipo = tipovehiculoModel::where('id_tipovehiculo', $id_tipo_vehiculo)->get();
        $ote->tipo_vehiculo = $tipo[0] -> nombre;
        }

        $ote->save();
        return response()->json($ote, 200);
    }

    public function updateObservacion(Request $request, $id)
    {
        $ote = ordentrabajoModel::find($id);
        $ote->observaciones = $request->get('observaciones');
        $ote->save();
        return response()->json($ote->observaciones, 200);
    }

    public function updateEstado(Request $request, $id)
    {
        $ote = ordentrabajoModel::find($id);
        $ote->estado = $request->get('estado');
        $ote->save();
        return response()->json($ote->estado, 200);
    }

    public function f_h_programables(Request $request, $id)//Manual
    {
        $ote = ordentrabajoModel::find($id);
        $ote->f_programada_inicio = $request->get('f_programada_inicio');
        $ote->h_programada_inicio = $request->get('h_programada_inicio');
        $ote->f_programada_fin = $request->get('f_programada_fin');
        $ote->h_programada_fin = $request->get('h_programada_fin');
        $ote->save();
        return response()->json($ote, 200);
    }

    public function f_h_inicio_real($id)//AUTOMATICO
    {
        //$date = new DateTime();
        $date = new \DateTime('America/Lima');
        date_default_timezone_set('America/Lima');
        $ote = ordentrabajoModel::find($id);
        $ote->f_inicio_real = $date->format('y-m-d');
        $ote->h_inicio_real = $date->format('h:i:s');
        $ote->save();
        return response()->json($ote, 200);
    }

    public function f_h_fin_real($id)//AUTOMATICO
    {
         $date = new \DateTime('America/Lima');
        date_default_timezone_set('America/Lima');
        $ote = ordentrabajoModel::find($id);
        $ote->f_fin_real = $date->format('y-m-d');
        $ote->h_fin_real = $date->format('h:i:s');
        $ote->save();
        return response()->json($ote, 200);
    }

    //  LEO

    public function ot_vehiculo($placa) {
      return response()->json(['status'=>'ok','data'=>ordentrabajoModel::where('vehiculo_id', $placa)->get()], 200);
    }

    public function destroy($id)
    {
        $ote = ordentrabajoModel::find($id);
        $ote->delete();
        return response()->json(null, 204);
    }
}
