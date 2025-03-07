<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            [
                'codigo' => '1081',
                'nombre' => 'Tecnologías de la información',
                'activo' => 1,
                'idUsuarioCreacion' => 1
            ],
            [
                'codigo' => '2054',
                'nombre' => 'Legal',
                'activo' => 1,
                'idUsuarioCreacion' => 1   
            ],
            [
                'codigo' => '1978',
                'nombre' => 'Seguridad',
                'activo' => 1,
                'idUsuarioCreacion' => 1  
            ],
            [
                'codigo' => '5476',
                'nombre' => 'Eventos y Buffets',
                'activo' => 1,
                'idUsuarioCreacion' => 1 
            ]
        ]);
    }
}
