<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\empleadoModel;

class empleadoController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>empleadoModel::all()], 200);
    }

    public function store(Request $request)
    {
        
        $empleado = new empleadoModel;
        //$empleado->id =$request->get('id');
        $empleado->nombres = $request->get('nombres');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->area_id = $request->get('area_id');
        //$empleado->dni = $request->get('dni');

        $empleado->save();

        return response()->json($empleado);
    }

    public function show($id)//id empleado
    {
        return empleadoModel::where('id', $id)->get();
    }

    public function showByArea($area_id) {
      return empleadoModel::where('area_id', $area_id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        $empleado = empleadoModel::find($id);
        $empleado->nombres = $request->get('nombres');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->area_id = $request->get('area_id');
        //$empleado->dni = $request->get('dni');

        $empleado->save();

        return response()->json($empleado, 200);
    }

    public function encargadoFind(Request $request, $id)
    {
        return empleadoModel::where('encargado_id', $id)->get();
    }



    public function destroy($id)
    {
        $empleado = empleadoModel::find($id);
        $empleado->delete();
        
        return response()->json(null, 204);
    }
}
