<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\rolModel;

class rolController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>rolModel::all()], 200);
    }

    public function store(Request $request)
    {   
        date_default_timezone_set('America/Lima');
        $rol = new rolModel;
        $rol->rol_name = $request->get('rol_name');

        $rol->save();

        return response()->json($rol);
    }

    public function show($id)
    {
        return rolModel::where('id', $id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        date_default_timezone_set('America/Lima');
        
        $rol = rolModel::find($id);
        $rol->rol_name = $request->get('rol_name');

        $rol->save();

        return response()->json($rol, 200);
    }

    public function destroy($id)
    {
        $rol = rolModel::find($id);
        $rol->delete();
        return response()->json(null, 204);
    }
}
