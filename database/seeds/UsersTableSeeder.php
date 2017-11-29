<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $usuarios = [
            1 => ['Andres', 'Contreras', 'Ojeda', 'Masculino', 'andresito.2011.4@gmail.com', '$2y$10$i9qoYWmHONygqIhY1TVeLuw0Z72sfhIT0JXpitU4RMMaXySN7jnxe', 'red', 'fuente', 'fontSize', 1, null,'BgRK2CSdZAdzTcfIw0wi5QTW79CLHoA6VN1TQaOSrc66s1BP26RBnOADDvFd', '2017-09-25 04:54:59', '2017-09-25 04:54:59'],
            2 => ['Yimmy', 'Quispe', 'Yujra', 'Masculino', 'jin_maxtor@outlook.com', '$2y$10$1MzKoKXfpJRjOeJfnsubyuyEedfwfZDDYpFxYQEhwjXXoJMeX87ru', 'red', 'fuentes', 'fontSize', 1, null, 'EZeOw6BrVcTIKI5MoikqbOgON4DLS6rhA4ik4l7FQ36QlHQkQkA3tZv6kZ9t', '2017-10-19 22:47:04', '2017-10-19 22:47:04'],
        ];

        foreach ($usuarios as $usuario) {
            DB::table('users')->insert([
                'name' => $usuario[0],
                'paterno' => $usuario[1],
                'materno' => $usuario[2],
                'genero' => $usuario[3],
                'email' => $usuario[4],
                'password' => $usuario[5],
                'color' => $usuario[6],
                'fontFamily' => $usuario[7],
                'fontSize' => $usuario[8],
                'id_banco' => $usuario[9],
                'id_rol' => $usuario[10],
                'remember_token' => $usuario[11],
                'created_at' => $usuario[12],
                'updated_at' => $usuario[13],
            ]);
        }
    }
}
