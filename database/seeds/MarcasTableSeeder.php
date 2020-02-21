<?php

use Illuminate\Database\Seeder;
use App\marcaModel;

class MarcasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('marca')->delete();
 
        $marcas = [
             ['id_marca' => '1',
              'nombre' => 'Nissan'
             ],
             ['id_marca' => '2',
              'nombre' => 'Volvo'
             ],
             ['id_marca' => '3',
              'nombre' => 'Scania'
             ]
        ];

        marcaModel::insert($marcas);
    }
}
