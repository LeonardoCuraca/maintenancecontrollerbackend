<?php

use Illuminate\Database\Seeder;

use App\rolModel;

class RolesTableSeeder extends Seeder
{
    public function run()
    {   
    	DB::table('rol_mantenimiento')->delete();
 
        $roles = [
             ['id' => '1',
              'rol_name' => 'Null',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '2',
              'rol_name' => 'Administrator',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '3',
              'rol_name' => 'Jefe Area',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '4',
              'rol_name' => 'Jefe de Almacen',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '5',
              'rol_name' => 'Supervisor de Patio',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '6',
              'rol_name' => 'Jefe de Mantenimiento',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '7',
              'rol_name' => 'Gerencia',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ]
        ];

        rolModel::insert($roles);

    }
}
