<?php

use Illuminate\Database\Seeder;

use App\lubricanteModel;

class LubricantesTableSeeder extends Seeder
{
    public function run()
    {   
    	DB::table('lubricante')->delete();
 
        $lubricantes = [
             ['id' => '1',
              'descripcion' => 'Mobile AFT 220',
              'costo' => '60'
             ],
             ['id' => '2',
              'descripcion' => 'Xtreme',
              'costo' => '70'
             ]
        ];

        lubricanteModel::insert($lubricantes);

    }
}
