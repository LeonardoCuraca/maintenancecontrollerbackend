<?php

use Illuminate\Database\Seeder;
use App\tipovehiculoModel;

class TipovehiculosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipovehiculo')->delete();
 
        $tipovehiculos = [
             ['id_tipovehiculo' => '1',
              'nombre' => 'Furgon'
             ],
             ['id_tipovehiculo' => '2',
              'nombre' => 'Volvo'
             ],
             ['id_tipovehiculo' => '3',
              'nombre' => 'Cisterna'
             ],
             ['id_tipovehiculo' => '4',
              'nombre' => 'Ballena'
             ],
             ['id_tipovehiculo' => '5',
              'nombre' => 'Doble Nivel'
             ]
        ];

        tipovehiculoModel::insert($tipovehiculos);
    }
}
