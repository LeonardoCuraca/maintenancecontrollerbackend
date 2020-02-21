<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use App\User;
use App\areaModel;

class usuarioController extends Controller
{
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>User::all()], 200);
    }

    public function show($id)
    {
        return User::where('id', $id)->get();
    }

    public function nombre()
    {
        $Datos = DB::select('select id, nombre from users');
        return $Datos;//mejorar por la Injection
    }

    public function crear_user_general(Request $request){
       $id_area = $request->get('area_id');

       $usuario = new User;
       $usuario->nombre = $request->get('nombre');
       $usuario->email = $request->get('email');
       $clave = $request->get('password');
       $encripdada = Hash::make($clave);
       $usuario->password = $encripdada;
       $usuario->rol_id = $request->get('rol_id');
       $usuario->estado = "1";
       if($usuario->rol_id == 3){//usuarios tipo jefe area
            //Si es un jefe de area debe pasar un area a asignar
            $dataArea= areaModel::where('id', $id_area)->get();
            $id_encargado = $dataArea[0]->encargado_id;
            if($id_encargado == null){//si esta disponible el area
                $usuario->save();
                $area = areaModel::find($id_area);
                $area->encargado_id = $usuario-> id;//asignamos
                $area->save();
                return 'Jefe de Area creado correctamente e asignado a su respectiva Area.';
            }else{
                $usuario->save();    
                return 'Jefe de Area creado correctamente, por favor inhabilite el anterior.';
            }
       }else{//cualquier usuario ya sea jefe almacen
            $usuario->save();
            return "Usuario creado correctamente.";       
       }
    }

    /*public function inhabilitar($id){
        $usuario = User::where('id', $id)->get();
        $id_rol= $usuario[0]->rol_id;
        if($id_rol==3){
           
        }else{
           $usuario 
        }
    }*/

    public function find_JefeAreas(){
        //listado para asignar un especialista a una area
        $JefesdeArea = User::where('rol_id', 3)->get();
        return $JefesdeArea;
    }
    
    public function update(Request $request, $id)
    {   
        
        $usuario = User::find($id);
        $usuario->nombre = $request->get('nombre');
        $usuario->email = $request->get('email');
        $usuario->password = $request->get('password');
        $usuario->estado = $request->get('estado');
        $usuario->rol_id = $request->get('rol_id');

        $usuario->save();

        return response()->json($usuario, 200);
    }

    

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
