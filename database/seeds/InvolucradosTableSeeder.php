<?php

use Illuminate\Database\Seeder;

use App\involucradoModel;

class InvolucradosTableSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('involucrado')->delete();
 
        $involucrados = [
             ['id' => '1',
              'empleado_id' => '1',
              'ot_id' => '2'
             ],
             ['id' => '2',
              'empleado_id' => '2',
              'ot_id' => '3'
             ],
             ['id' => '3',
              'empleado_id' => '1',
              'ot_id' => '4'
             ],
             ['id' => '4',
              'empleado_id' => '2',
              'ot_id' => '5'
             ],
             ['id' => '5',
              'empleado_id' => '3',
              'ot_id' => '8'
             ],
             ['id' => '6',
              'empleado_id' => '4',
              'ot_id' => '9'
             ],
             ['id' => '7',
              'empleado_id' => '3',
              'ot_id' => '10'
             ],
             ['id' => '8',
              'empleado_id' => '4',
              'ot_id' => '11'
             ],
             ['id' => '9',
              'empleado_id' => '5',
              'ot_id' => '14'
             ],
             ['id' => '10',
              'empleado_id' => '6',
              'ot_id' => '15'
             ],
             ['id' => '11',
              'empleado_id' => '5',
              'ot_id' => '16'
             ],
             ['id' => '12',
              'empleado_id' => '6',
              'ot_id' => '17'
             ],
             ['id' => '13',
              'empleado_id' => '7',
              'ot_id' => '20'
             ],
             ['id' => '14',
              'empleado_id' => '8',
              'ot_id' => '21'
             ],
             ['id' => '15',
              'empleado_id' => '7',
              'ot_id' => '22'
             ],
             ['id' => '16',
              'empleado_id' => '8',
              'ot_id' => '23'
             ],
             ['id' => '17',
              'empleado_id' => '9',
              'ot_id' => '26'
             ],
             ['id' => '18',
              'empleado_id' => '10',
              'ot_id' => '27'
             ],
             ['id' => '19',
              'empleado_id' => '9',
              'ot_id' => '28'
             ],
             ['id' => '20',
              'empleado_id' => '10',
              'ot_id' => '29'
             ],
             ['id' => '21',
              'empleado_id' => '11',
              'ot_id' => '32'
             ],
             ['id' => '22',
              'empleado_id' => '12',
              'ot_id' => '33'
             ],
             ['id' => '23',
              'empleado_id' => '11',
              'ot_id' => '34'
             ],
             ['id' => '24',
              'empleado_id' => '12',
              'ot_id' => '35'
             ],
             ['id' => '25',
              'empleado_id' => '13',
              'ot_id' => '38'
             ],
             ['id' => '26',
              'empleado_id' => '14',
              'ot_id' => '39'
             ],
             ['id' => '27',
              'empleado_id' => '13',
              'ot_id' => '40'
             ],
             ['id' => '28',
              'empleado_id' => '14',
              'ot_id' => '41'
             ]
        ];

        involucradoModel::insert($involucrados);
    }
}
