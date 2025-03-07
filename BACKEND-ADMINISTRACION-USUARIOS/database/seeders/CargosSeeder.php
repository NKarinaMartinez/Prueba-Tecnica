<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('cargos')->insert([
            [
                'codigo' => '449',
                'nombre' => 'Administrador',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ],
            [
                'codigo' => '825',
                'nombre' => 'Líder Frontend',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ],
            [
                'codigo' => '341',
                'nombre' => 'Líder Backend',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ],
            [
                'codigo' => '276',
                'nombre' => 'Desarrollador Fronted',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ],
            [
                'codigo' => '113',
                'nombre' => 'Abogado',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ],
            [
                'codigo' => '645',
                'nombre' => 'Guardia',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ]
        ]);
    }
}
