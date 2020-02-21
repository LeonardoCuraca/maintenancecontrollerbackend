<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\involucradoModel;

class involucradoController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>involucradoModel::all()], 200);
    }

    public function store(Request $request)
    {
        
        $involucrado = new involucradoModel;
        //$involucrado->id =$request->get('id');
        $involucrado->empleado_id = $request->get('empleado_id');
        $involucrado->ot_id = $request->get('ot_id');

        $involucrado->save();

        return response()->json($involucrado);
    }

    public function show($id)
    {
        //
        return involucradoModel::where('empleado_id', $id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        $involucrado = involucradoModel::find($id);
        $involucrado->empleado_id = $request->get('empleado_id');
        $involucrado->ot_id = $request->get('ot_id');

        $involucrado->save();

        return response()->json($involucrado, 200);
    }

    public function encargadoFind(Request $request, $id)
    {
        return involucradoModel::where('encargado_id', $id)->get();
    }

    public function destroy($id)
    {
        $involucrado = involucradoModel::find($id);
        $involucrado->delete();
        //return response()->json(['code'=>204,'message'=>'Se ha eliminado correctamente.'],204);
        return response()->json(null, 204);
    }
}
