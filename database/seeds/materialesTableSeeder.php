<?php

use Illuminate\Database\Seeder;

use App\materialModel;

class materialesTableSeeder extends Seeder
{
    public function run()
    {   
    	DB::table('material')->delete();//inhabilitado
 
        $materiales = [
             ['codigo' => 'L011101001',
              'descripcion' => '',
              'UM' => ''
             ],
             ['codigo' => 'L011101002',
              'descripcion' => '',
              'UM' => ''
             ]
        ];

        materialModel::insert($materiales);

    }
}
