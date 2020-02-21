<?php

use Illuminate\Database\Seeder;

use App\empleadoModel;

class EmpleadoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('empleado_mantenimiento')->delete();

        $empleados = [
             ['id' => '1',
              'nombres' => 'Julio Eduardo',
              'apellidos' => 'Roque Paredes',
              'area_id' => '1'
             ],
             ['id' => '2',
              'nombres' => 'Johatan',
              'apellidos' => 'Vega Corales',
              'area_id' => '1'
             ],
             ['id' => '3',
              'nombres' => 'Julio',
              'apellidos' => 'Sanchez Vera',
              'area_id' => '2'
             ],
             ['id' => '4',
              'nombres' => 'Mauro Emilio',
              'apellidos' => 'Vilchez Soto',
              'area_id' => '2'
             ],
             ['id' => '5',
              'nombres' => 'Pedro Perez',
              'apellidos' => 'Villa Corales',
              'area_id' => '3'
             ],
             ['id' => '6',
              'nombres' => 'Mario Broos',
              'apellidos' => 'Rompe Paredes',
              'area_id' => '3'
             ],
             ['id' => '7',
              'nombres' => 'Luigi Grande',
              'apellidos' => 'Campos Soto',
              'area_id' => '4'
             ],
             ['id' => '8',
              'nombres' => 'Marcos',
              'apellidos' => 'Salvador Paredes',
              'area_id' => '4'
             ],
             ['id' => '9',
              'nombres' => 'Luis',
              'apellidos' => 'Yauri Corales',
              'area_id' => '5'
             ],
             ['id' => '10',
              'nombres' => 'Jhair',
              'apellidos' => 'Taipe Moreno',
              'area_id' => '5'
             ],
             ['id' => '11',
              'nombres' => 'Camilo',
              'apellidos' => 'Vilchez Tadeo',
              'area_id' => '6'
             ],
             ['id' => '12',
              'nombres' => 'Adrian',
              'apellidos' => 'velasquez',
              'area_id' => '6'
             ],
             ['id' => '13',
              'nombres' => 'Mauricio',
              'apellidos' => 'Galileo',
              'area_id' => '7'
             ],
             ['id' => '14',
              'nombres' => 'Elmer',
              'apellidos' => 'Curio',
              'area_id' => '7'
             ]
        ];

        empleadoModel::insert($empleados);
    }
}
