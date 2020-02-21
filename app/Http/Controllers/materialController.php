<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\materialModel;

class materialController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>materialModel::all()], 200);
    }

    public function store(Request $request)
    {   
        //date_default_timezone_set('America/Lima');
        $material = new materialModel;
        $material->id = $request->get('id');
        $material->descripcion = $request->get('descripcion');
        $material->UM = $request->get('UM');
        $material->costo = $request->get('costo');

        $material->save();

        return response()->json($material);
    }

    public function show($id)
    {
        return materialModel::where('id', $id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        //date_default_timezone_set('America/Lima');
        
        $material = materialModel::find($id);
        $material->descripcion = $request->get('descripcion');
        $material->UM = $request->get('UM');
        $material->costo = $request->get('costo');

        $material->save();

        return response()->json($material, 200);
    }

    public function destroy($id)
    {
        $material = materialModel::find($id);
        $material->delete();
        return response()->json(null, 204);
    }
}
