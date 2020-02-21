<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->delete(); 
       
        $users = [

             ['id' => '1',
              'email' => 'Null@null.com',
              'password' => Hash::make('1234'),
              'nombre' => 'Null',
              'estado' => '1',
              'rol_id' => '1',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '2',
              'email' => 'admin',
              'password' => Hash::make('1234'),
              'nombre' => 'Administrator',
              'estado' => '1',
              'rol_id' => '2',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '3',
              'email' => 'JefeEstructuras',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '4',
              'email' => 'JefeLubricantes',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '5',
              'email' => 'JefeNeumatico',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '6',
              'email' => 'JefePesado',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '7',
              'email' => 'JefeLiviano',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '8',
              'email' => 'JefeGas',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '9',
              'email' => 'JefeFrios',
              'password' => Hash::make('1234'),
              'nombre' => 'Jose',
              'estado' => '1',
              'rol_id' => '3',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '10',
              'email' => 'JefeAlmacen2020',//usuario
              'password' => Hash::make('1234'),
              'nombre' => 'Juan',
              'estado' => '1',
              'rol_id' => '4',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '11',
              'email' => 'SupervisorPatio',
              'password' => Hash::make('1234'),
              'nombre' => 'Johnson',
              'estado' => '1',
              'rol_id' => '5',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '12',
              'email' => 'JefeMantenimiento',
              'password' => Hash::make('1234'),
              'nombre' => 'Juan',
              'estado' => '1',
              'rol_id' => '6',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ],
             ['id' => '13',
              'email' => 'Gerencia2020',
              'password' => Hash::make('1234'),
              'nombre' => 'Juan',
              'estado' => '1',
              'rol_id' => '7',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s')
             ]
        ];

        User::insert($users);
    }
}
