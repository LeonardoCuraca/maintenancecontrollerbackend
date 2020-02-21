<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\m_solicitadoModel;

//use App\materialModel;

class m_solicitadoController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>m_solicitadoModel::all()], 200);
    }

    public function store(Request $request)
    {
        
        $m_solicitados = new m_solicitadoModel;
        //$m_solicitados->material_id =$request->get('material_id');
        $m_solicitados->solicitud_id = $request->get('solicitud_id');
        $m_solicitados->solicitada =$request->get('solicitada');
        $m_solicitados->cantidad_solicitada =$request->get('cantidad_solicitada');
        //$m_solicitados->asignada =$request->get('asignada');
        //$m_solicitados->cantidad_asignada =$request->get('cantidad_asignada');

        $m_solicitados->save();

        return response()->json($m_solicitados);
    }

    public function show($id)
    {
        return m_solicitadoModel::where('id', $id)->get();
    }

    public function m_solicitados_solicitud($solicitud_id){

        $m_solicitados = m_solicitadoModel::where('solicitud_id', $solicitud_id)->get();
        return $m_solicitados;
    }
    
    public function update(Request $request, $id)
    {   
        $m_solicitados = m_solicitadoModel::find($id);
        $m_solicitados->material_id =$request->get('material_id');
        $m_solicitados->solicitud_id = $request->get('solicitud_id');
        $m_solicitados->solicitada =$request->get('solicitada');
        $m_solicitados->cantidad_solicitada =$request->get('cantidad_solicitada');
        $m_solicitados->asignada =$request->get('asignada');
        $m_solicitados->cantidad_asignada =$request->get('cantidad_asignada');

        $m_solicitados->save();

        return response()->json($m_solicitados, 200);
    }

    

    public function destroy($id)
    {
        $m_solicitado = m_solicitadoModel::find($id);
        $m_solicitados->delete();

        return response()->json(null, 204);
    }
}
