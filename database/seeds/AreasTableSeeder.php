<?php

use Illuminate\Database\Seeder;

use App\areaModel;

class AreasTableSeeder extends Seeder
{
    public function run()
    {   
    	DB::table('area_mantenimiento')->delete();
 
        $areas = [
             ['id' => '1',
              'nombre' => 'Estructura',
              'encargado_id' => '3'
             ],
             ['id' => '2',
              'nombre' => 'Lubricantes',
              'encargado_id' => '4'
             ],
             ['id' => '3',
              'nombre' => 'Neumaticos',
              'encargado_id' => '5'
             ],
             ['id' => '4',
              'nombre' => 'Pesada',
              'encargado_id' => '6'
             ],
             ['id' => '5',
              'nombre' => 'Liviana',
              'encargado_id' => '7'
             ],
             ['id' => '6',
              'nombre' => 'Gas',
              'encargado_id' => '8'
             ],
             ['id' => '7',
              'nombre' => 'Frios',
              'encargado_id' => '9'
             ]
        ];

        areaModel::insert($areas);

    }
}
