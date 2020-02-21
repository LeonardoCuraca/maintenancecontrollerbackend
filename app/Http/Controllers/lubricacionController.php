<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\lubricacionModel;
use App\ordentrabajoModel;

class lubricacionController extends Controller
{
    public function index()
    {
     return response()->json(['status'=>'ok','data'=>lubricacionModel::all()], 200);
    }

    public function store(Request $request)
    {
        $lubricacion = new lubricacionModel;
        
        $lubricacion->lubricante_id = $request->get('lubricante_id');
        $lubricacion->cantidad = $request->get('cantidad');
        $lubricacion->fecha = $request->get('fecha');
        $lubricacion->fecha_estimada = $request->get('fecha_estimada');
        $lubricacion->km_actual = $request->get('km_actual'); 
        $lubricacion->km_estimado = $request->get('km_estimado');
        $lubricacion->ot_id = $request->get('ot_id');     
        $lubricacion->modelo_vehiculo = $request->get('modelo_vehiculo'); 

        //Obtener registro anterior //km_anterior
        $ot_ide= $request->get('ot_id');
        $ote = ordentrabajoModel::where('id', $ot_ide)->get();
        $lubricacion->vehiculo_id = $ote[0] -> vehiculo_id;//obtenemos la placa
        $vehi_id = $ote[0]-> vehiculo_id;
        //$vehi_id= //$request->get('vehiculo_id');
    //$lubricaciones = lubricacionModel::where('vehiculo_id', $vehi_id)->get();
        $count_regis= DB::select('select count(id) as n from lubricacion where vehiculo_id=?', [$vehi_id]);
        $var1= $count_regis[0] ->n;

        $resultado = DB::table('lubricacion')
                 ->select(DB::raw('id'))
                 ->where('vehiculo_id', '=' , $vehi_id)
                 ->orderBy('id', 'desc')
                 ->get();
        
        if($var1>=1){

           $id_regis_anterior= $resultado[0] -> id;
           $lubricacion_ant = lubricacionModel::where('id', $id_regis_anterior)->get();
           $lubricacion->km_anterior = $lubricacion_ant[0]-> km_final;
           
        }else{
        	$lubricacion->km_anterior="0";       
        }
        //Auto relleno de km_final
        $var_km_actual= $request->get('km_actual');
        $var_km_estimado= $request->get('km_estimado');
        $var_km_final= $var_km_actual + $var_km_estimado;
        $lubricacion->km_final = $var_km_final;

        $lubricacion->save();

        return response()->json($lubricacion);
    }


    public function calculo(Request $request)
    {
        /*$conteo = DB::table('lubricacion')
                  ->select(DB::raw('id'))
                  ->paginate(10);*/

        //http://localhost:8000/api/vehiculo/ote/conteo?page=2
    }

    public function show($id)
    {
        return lubricacionModel::where('id', $id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        $lubricacion = lubricacionModel::find($id);    
        $lubricacion->save();

        return response()->json($lubricacion, 200);
    }

    public function destroy($id)
    {
        $lubricacion = lubricacionModel::find($id);
        $lubricacion->delete();
        return response()->json(null, 204);
    }
}
