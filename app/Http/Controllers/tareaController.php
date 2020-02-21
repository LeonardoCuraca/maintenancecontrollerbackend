<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\tareaModel;

use App\ordentrabajoModel;

class tareaController extends Controller
{
    public function index($ot_id)
    {
        return tareaModel::where('ot_id', $ot_id)->get();
    }

    public function store(Request $request)
    {
        date_default_timezone_set('America/Lima');
        $req = new tareaModel;
        $req->descripcion = $request->get('descripcion');
        $req->conformidad = $request->get('conformidad');
        $req->ot_id = $request->get('ot_id');       
        $req->save();

        //Actualizar porcentaje
        $id_ot= $request->get('ot_id');
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

        return response()->json($req);
    }

    public function show($id)
    {
        return tareaModel::where('id', $id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        date_default_timezone_set('America/Lima');

        $req = tareaModel::find($id);
        $req->descripcion = $request->get('descripcion');
        $req->conformidad = $request->get('conformidad');
        //$req->observaciones = $request->get('observaciones');
        $req->ot_id = $request->get('ot_id');

        $req->save();

        return response()->json($req, 200);
    }

    public function updateObservacion(Request $request, $id)
    {
        $req = tareaModel::find($id);
        $req->observaciones = $request->get('observaciones');
        $req->save();
        return response()->json($req->observaciones, 200);
    }

    public function destroy($id)
    {
        $req = tareaModel::find($id);
        $req->delete();
        return response()->json(null, 204);
    }
}
