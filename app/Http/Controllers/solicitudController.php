<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\solicitudModel;

//use App\ordentrabajoModel;
//use App\vehiculoModel;

class solicitudController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>solicitudModel::all()], 200);
    }

    public function store(Request $request)
    {
        $solicitud = new solicitudModel;
        $solicitud->id =$request->get('id');
        $solicitud->solicitante = $request->get('solicitante');
        $solicitud->fecha = $request->get('fecha');
        $solicitud->hora = $request->get('hora');
        $solicitud->ot_id = $request->get('ot_id');
        $solicitud->save();

        return response()->json($solicitud);
    }

    public function solicitud_ote($ot_id){

        $solicitud = solicitudModel::where('ot_id', $ot_id)->get();
        return $solicitud;
    }

    public function show($id)
    {
        return solicitudModel::where('id', $id)->get();
    }
    
    public function update(Request $request, $id)
    {   
        
        $solicitud = solicitudModel::find($id);
        $solicitud->solicitante = $request->get('solicitante');
        $solicitud->fecha = $request->get('fecha');
        $solicitud->hora = $request->get('hora'); 
        $solicitud->ot_id = $request->get('ot_id');

        $solicitud->save();

        return response()->json($solicitud, 200);
    }

    public function destroy($id)
    {
        $solicitud = solicitudModel::find($id);
        $solicitud->delete();
        return response()->json(null, 204);
    }
}
