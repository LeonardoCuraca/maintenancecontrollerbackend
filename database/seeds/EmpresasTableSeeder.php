<?php

use Illuminate\Database\Seeder;
use App\empresaModel;

class EmpresasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('empresa')->delete();
 
        $empresas = [
             ['id_empresa' => '1',
              'razon_social' => 'Vacio',
              'ruc' => '10025056741',
              'dom_fiscal' => 'Miraflores',
              'telefono' => '986764321',
              'per_contacto' => 'Maderas Villa SAC',
              'per_telefono' => '987512378',
              'fk_id_tipo_relacion' => '1234',
              'estado' => '0012'
             ],
             ['id_empresa' => '2',
              'razon_social' => 'Vacio',
              'ruc' => '10025056741',
              'dom_fiscal' => 'Chosica',
              'telefono' => '986764321',
              'per_contacto' => 'Juan Roble SAC',
              'per_telefono' => '987512378',
              'fk_id_tipo_relacion' => '1234',
              'estado' => '0012'
             ],
             ['id_empresa' => '3',
              'razon_social' => 'Vacio',
              'ruc' => '10025056741',
              'dom_fiscal' => 'Santa Anita',
              'telefono' => '986764321',
              'per_contacto' => 'Molitalia SAC',
              'per_telefono' => '987512378',
              'fk_id_tipo_relacion' => '1234',
              'estado' => '0012'
             ]
        ];

        empresaModel::insert($empresas);
    }
}
