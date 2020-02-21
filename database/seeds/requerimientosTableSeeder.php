<?php

use Illuminate\Database\Seeder;

use App\requerimientoModel;

class requerimientosTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('requerimiento')->delete();
        
        $requerimientos = [
        	        [
                    'id' => '1',
                    'descripcion' => 'Puerta trasera dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '2'
        	        ],
        	        [
                    'id' => '2',
                    'descripcion' => 'Lubricar torno',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '8'
        	        ],
        	        [
                    'id' => '3',
                    'descripcion' => 'Neumatico trasero dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '14'
        	        ],
        	        [
                    'id' => '4',
                    'descripcion' => 'Zapata dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '20'
        	        ],
        	        [
                    'id' => '5',
                    'descripcion' => 'Muelle dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '26'
        	        ],
        	        [
                    'id' => '6',
                    'descripcion' => 'Fuga de gas',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '32'
        	        ],
        	        [
                    'id' => '7',
                    'descripcion' => 'Termoking dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '38'
        	        ],
        	        [
                    'id' => '8',
                    'descripcion' => 'Puerta trasera dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '3'
        	        ],
        	        [
                    'id' => '9',
                    'descripcion' => 'Lubricar torno',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '9'
        	        ],
        	        [
                    'id' => '10',
                    'descripcion' => 'Neumatico trasero dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '15'
        	        ],
        	        [
                    'id' => '11',
                    'descripcion' => 'Zapata dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '21'
        	        ],
        	        [
                    'id' => '12',
                    'descripcion' => 'Muelle dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '27'
        	        ],
        	        [
                    'id' => '13',
                    'descripcion' => 'Fuga de gas',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '33'
        	        ],
        	        [
                    'id' => '14',
                    'descripcion' => 'Termoking dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '39'
        	        ],
        	        [
                    'id' => '15',
                    'descripcion' => 'Puerta trasera dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '4'
        	        ],
        	        [
                    'id' => '16',
                    'descripcion' => 'Lubricar torno',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '10'
        	        ],
        	        [
                    'id' => '17',
                    'descripcion' => 'Neumatico trasero dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '16'
        	        ],
        	        [
                    'id' => '18',
                    'descripcion' => 'Zapata dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '22'
        	        ],
        	        [
                    'id' => '19',
                    'descripcion' => 'Muelle dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '28'
        	        ],
        	        [
                    'id' => '20',
                    'descripcion' => 'Fuga de gas',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '34'
        	        ],
        	        [
                    'id' => '21',
                    'descripcion' => 'Termoking dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '40'
        	        ],
        	        [
                    'id' => '22',
                    'descripcion' => 'Puerta trasera dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '5'
        	        ],
        	        [
                    'id' => '23',
                    'descripcion' => 'Lubricar torno',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '11'
        	        ],
        	        [
                    'id' => '24',
                    'descripcion' => 'Neumatico trasero dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '17'
        	        ],
        	        [
                    'id' => '25',
                    'descripcion' => 'Zapata dañada',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '23'
        	        ],
        	        [
                    'id' => '26',
                    'descripcion' => 'Muelle dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '29'
        	        ],
        	        [
                    'id' => '27',
                    'descripcion' => 'Fuga de gas',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '35'
        	        ],
        	        [
                    'id' => '28',
                    'descripcion' => 'Termoking dañado',
                    'conformidad' => '0',
                    'observaciones' => 'Ninguna',
                    'ot_id' => '41'
        	        ]
        ];
                    requerimientoModel::insert($requerimientos);
    }
}
