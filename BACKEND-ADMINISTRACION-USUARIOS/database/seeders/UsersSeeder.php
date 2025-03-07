<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        db::table('users')->insert([
            [
                'usuario' => 'nmartinez',
                'email' => 'nmartinez@gmail.com',
                'primerNombre' => 'Nicole',
                'segundoNombre' => 'Karina',
                'primerApellido' => 'Martínez',
                'segundoApellido' => 'Ochoa',
                'idDepartamento' => 1,
                'idCargo' => 1
            ],
            [
                'usuario' => 'mlopez',
                'email' => 'mlopez@gmail.com',
                'primerNombre' => 'Mario',
                'segundoNombre' => 'Fernando',
                'primerApellido' => 'Lopéz',
                'segundoApellido' => 'Yánez',
                'idDepartamento' => 1,
                'idCargo' => 2
            ],
            [
                'usuario' => 'phidalgo',
                'email' => 'phidalgo@gmail.com',
                'primerNombre' => 'Pedro',
                'segundoNombre' => 'Luis',
                'primerApellido' => 'Hidalgo',
                'segundoApellido' => 'Suarez',
                'idDepartamento' => 1,
                'idCargo' => 3
            ],
            [
                'usuario' => 'carteaga',
                'email' => 'carteaga@gmail.com',
                'primerNombre' => 'Carlos',
                'segundoNombre' => 'José',
                'primerApellido' => 'Arteaga',
                'segundoApellido' => 'Varas',
                'idDepartamento' => 1,
                'idCargo' => 4
            ],
            [
                'usuario' => 'jsantana',
                'email' => 'jsantana@gmail.com',
                'primerNombre' => 'Jorge',
                'segundoNombre' => 'Bruno',
                'primerApellido' => 'Santana',
                'segundoApellido' => 'Morán',
                'idDepartamento' => 2,
                'idCargo' => 5
            ],
            [
                'usuario' => 'nmuñoz',
                'email' => 'nmunoz@gmail.com',
                'primerNombre' => 'Sofía',
                'segundoNombre' => 'Martha',
                'primerApellido' => 'Muñoz',
                'segundoApellido' => 'Rodríguez',
                'idDepartamento' => 3,
                'idCargo' => 6
            ],
            [
                'usuario' => 'vcrespo',
                'email' => 'vcrespo@gamil.com',
                'primerNombre' => 'Victor',
                'segundoNombre' => 'Maximiliano',
                'primerApellido' => 'Crespo',
                'segundoApellido' => 'Aguirre',
                'idDepartamento' => 4,
                'idCargo' => 1
            ],
            [
                'usuario' => 'jlorenzo',
                'email' => 'jlorenzo@gamil.com',
                'primerNombre' => 'Julio',
                'segundoNombre' => 'Jaramillo',
                'primerApellido' => 'Lorenzo',
                'segundoApellido' => 'Nobilla',
                'idDepartamento' => 1,
                'idCargo' => 2
            ],
            [
                'usuario' => 'sdiaz',
                'email' => 'sdiaz@gmail.com',
                'primerNombre' => 'Susana',
                'segundoNombre' => 'Jeniffer',
                'primerApellido' => 'Díaz',
                'segundoApellido' => 'Bonin',
                'idDepartamento' => 2,
                'idCargo' => 5
            ],
            [
                'usuario' => 'gmoreira',
                'email' => 'gmoreira@gmail.com',
                'primerNombre' => 'Guillermo',
                'segundoNombre' => 'Felipe',
                'primerApellido' => 'Moreira',
                'segundoApellido' => 'Beltrán',
                'idDepartamento' => 1,
                'idCargo' => 4
            ],
            [
                'usuario' => 'wramirez',
                'email' => 'wramirez@gmail.com',
                'primerNombre' => 'William',
                'segundoNombre' => 'James',
                'primerApellido' => 'Ramírez',
                'segundoApellido' => 'Fajardo',
                'idDepartamento' => 1,
                'idCargo' => 3
            ]
        ]);
    }
}
