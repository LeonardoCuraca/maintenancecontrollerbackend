<?php

use Illuminate\Database\Seeder;

use App\vehiculoModel;

class VehiculosTableSeeder extends Seeder
{
    public function run()
    {   
    	DB::table('vehiculo')->delete();//esta deshabilitado
 
        $vehiculos = [
             [
              'id_vehiculo' => '1',
              'placa' => 'AAA-AAA',
              'prefijo' => 'OK',
              'fk_id_tipovehiculo' => '1',
              'fk_id_carroceria' => '123',
              'fk_id_marca' => '3',
              'fk_id_modelo' => '123',
              'fk_id_categoria' => '123',
              'fk_id_empresa' => '1',
              'fk_id_status' => '123',
              'serie_chasis' => 'texto',
              'serie_motor' => 'texto',
              'fecha' => '2020-02-10',
              'ejes' => '8',
              'carga_util' => '40000',
              'carga_neta' => '60000',
              'carga_bruta' =>'80000',
              'alto' => '2.5',
              'ancho' => '2',
              'largo' => '8',
              'observacion' => 'texto'
             ],
             ['id_vehiculo' => '2',
              'placa' => 'ABC-DEF',
              'prefijo' => 'OK',
              'fk_id_tipovehiculo' => '2',
              'fk_id_carroceria' => '123',
              'fk_id_marca' => '1  ',
              'fk_id_modelo' => '123',
              'fk_id_categoria' => '123',
              'fk_id_empresa' => '2',
              'fk_id_status' => '123',
              'serie_chasis' => 'texto',
              'serie_motor' => 'texto',
              'fecha' => '2020-02-10',
              'ejes' => '8',
              'carga_util' => '40000',
              'carga_neta' => '60000',
              'carga_bruta' =>'80000',
              'alto' => '2.5',
              'ancho' => '2',
              'largo' => '8',
              'observacion' => 'texto'
             ],
             ['id_vehiculo' => '3',
              'placa' => 'BBB-BBB',
              'prefijo' => 'OK',
              'fk_id_tipovehiculo' => '3',
              'fk_id_carroceria' => '123',
              'fk_id_marca' => '1',
              'fk_id_modelo' => '123',
              'fk_id_categoria' => '123',
              'fk_id_empresa' => '3',
              'fk_id_status' => '123',
              'serie_chasis' => 'texto',
              'serie_motor' => 'texto',
              'fecha' => '2020-02-10',
              'ejes' => '8',
              'carga_util' => '40000',
              'carga_neta' => '60000',
              'carga_bruta' => '80000',
              'alto' => '2.5',
              'ancho' => '2',
              'largo' => '8',
              'observacion' => 'texto'
             ],
             ['id_vehiculo' => '4',
              'placa' => 'RBC-ARR',
              'prefijo' => 'OK',
              'fk_id_tipovehiculo' => '4',
              'fk_id_carroceria' => '123',
              'fk_id_marca' => '3',
              'fk_id_modelo' => '123',
              'fk_id_categoria' => '123',
              'fk_id_empresa' => '1',
              'fk_id_status' => '123',
              'serie_chasis' => 'texto',
              'serie_motor' => 'texto',
              'fecha' => '2020-02-10',
              'ejes' => '8',
              'carga_util' => '40000',
              'carga_neta' => '60000',
              'carga_bruta' =>'80000',
              'alto' => '2.5',
              'ancho' => '2',
              'largo' => '8',
              'observacion' => 'texto'
             ],
             ['id_vehiculo' => '5',
              'placa' => 'CCC-CCC',
              'prefijo' => 'OK',
              'fk_id_tipovehiculo' => '5',
              'fk_id_carroceria' => '111',
              'fk_id_marca' => '2',
              'fk_id_modelo' => '111',
              'fk_id_categoria' => '111',
              'fk_id_empresa' => '2',
              'fk_id_status' => '111',
              'serie_chasis' => 'texto',
              'serie_motor' => 'texto',
              'fecha' => '2020-02-10',
              'ejes' => '8',
              'carga_util' => '40000',
              'carga_neta' => '60000',
              'carga_bruta' =>'80000',
              'alto' => '2.5',
              'ancho' => '2',
              'largo' => '8',
              'observacion' => 'texto'
             ]
        ];

        vehiculoModel::insert($vehiculos);

    }
}
