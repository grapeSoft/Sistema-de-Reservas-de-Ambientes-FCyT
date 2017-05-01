<?php

use Illuminate\Database\Seeder;
use App\Model\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre' => 'Alexander',
            'apellido_paterno' => 'Reinaga',
            'apellido_materno' => 'Lopez',
            'email' => 'alexsof9@gmail.com',
            'username' => 'alexsof',
            'password' => '123456',
            'tipo' => 'administrador',
        ]);

        Usuario::create([
            'nombre' => 'Carlos',
            'apellido_paterno' => 'Romero',
            'apellido_materno' => 'Vargas',
            'email' => 'crv@gmail.com',
            'username' => 'carlos7',
            'password' => '123456',
            'tipo' => 'autorizado',
        ]);

        Usuario::create([
            'nombre' => 'Valentina',
            'apellido_paterno' => 'Caceres',
            'apellido_materno' => 'Villanueva',
            'email' => 'vcv@gmail.com',
            'username' => 'vale89',
            'password' => '123456',
            'tipo' => 'autorizado',
        ]);

        Usuario::create([
            'nombre' => 'Marcelo',
            'apellido_paterno' => 'Lopez',
            'apellido_materno' => 'chavez',
            'email' => 'mlc9@gmail.com',
            'username' => 'marce09',
            'password' => '123456',
            'tipo' => 'autorizado',
        ]);

        Usuario::create([
            'nombre' => 'Juan Pablo',
            'apellido_paterno' => 'Mendoza',
            'apellido_materno' => 'Acha',
            'email' => 'jpm@gmail.com',
            'username' => 'juanp',
            'password' => '123456',
            'tipo' => 'autorizado',
        ]);

        Usuario::create([
            'nombre' => 'Martina',
            'apellido_paterno' => 'Carrasco',
            'apellido_materno' => 'Verduguez',
            'email' => 'martiv@gmail.com',
            'username' => 'marti78',
            'password' => '123456',
            'tipo' => 'autorizado',
        ]);
         Usuario::create([
            'nombre' => 'Boris',
            'apellido_paterno' => 'calancha',
            'apellido_materno' => 'navia',
            'email' => 'boris@gmail.com',
            'username' => 'boris',
            'password' => '123456',
            'tipo' => 'docente',
        ]);
    }
}
