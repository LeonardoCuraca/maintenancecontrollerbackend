<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        //$this->call(TipovehiculosTableSeeder::class);
        //$this->call(MarcasTableSeeder::class);
        //$this->call(EmpresasTableSeeder::class);
        //$this->call(VehiculosTableSeeder::class);
        $this->call(EmpleadoTableSeeder::class);
        //$this->call(OrdentrabajosTableSeeder::class);
        //$this->call(requerimientosTableSeeder::class);
        //$this->call(InvolucradosTableSeeder::class);
        //$this->call(materialesTableSeeder::class);eliminar migracion
        //$this->call(LubricantesTableSeeder::class);
    }

}
