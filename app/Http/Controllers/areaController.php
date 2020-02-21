<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\areaModel;
use App\User;

class areaController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>areaModel::all()], 200);
    }

    public function show($id)
    {
        return areaModel::where('id', $id)->get();
    }
    
    //no debo crear las areas// modificar las existentes
    public function reasignar_usuario($area_id, $new_encargado_id){

        $area = areaModel::where('id', $area_id)->get();
        $old_id_encargado = $area[0]->encargado_id;
        if($old_id_encargado==null){
           $area = areaModel::find($area_id);//cambiar busqueda en caso de error
           $area->encargado_id = $new_encargado_id;
           $area->save();
           return $area;
        }else{
           $old_encargado= User::find($old_id_encargado);
           $old_encargado->estado = "0";//lo inhabilitamos al antiguo
           $old_encargado->save();
           $area = areaModel::find($area_id);//asignamos al nuevo encargado
           $area->encargado_id = $new_encargado_id;
           $area->save();
           return $area;
        }

    }

    public function encargadoFind(Request $request, $id)
    {
        return areaModel::where('encargado_id', $id)->get();
    }

    public function destroy($id)
    {
        $area = areaModel::find($id);
        $area->delete();
        //return response()->json(['code'=>204,'message'=>'Se ha eliminado correctamente.'],204);
        return response()->json(null, 204);
    }
}
