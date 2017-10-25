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
            1 => ['Andres Contreras ojeda', 'andresito.2011.4@gmail.com', '$2y$10$i9qoYWmHONygqIhY1TVeLuw0Z72sfhIT0JXpitU4RMMaXySN7jnxe', 1, null,'BgRK2CSdZAdzTcfIw0wi5QTW79CLHoA6VN1TQaOSrc66s1BP26RBnOADDvFd', '2017-09-25 04:54:59', '2017-09-25 04:54:59'],
            2 => ['Yimmy Quispe Yujra', 'jin_maxtor@outlook.com', '$2y$10$1MzKoKXfpJRjOeJfnsubyuyEedfwfZDDYpFxYQEhwjXXoJMeX87ru', 1, null, 'EZeOw6BrVcTIKI5MoikqbOgON4DLS6rhA4ik4l7FQ36QlHQkQkA3tZv6kZ9t', '2017-10-19 22:47:04', '2017-10-19 22:47:04'],
        ];

        foreach ($usuarios as $usuario) {
            DB::table('users')->insert([
                'name' => $usuario[0],
                'email' => $usuario[1],
                'password' => $usuario[2],
                'id_banco' => $usuario[3],
                'id_rol' => $usuario[4],
                'remember_token' => $usuario[5],
                'created_at' => $usuario[6],
                'updated_at' => $usuario[7],
            ]);
        }

    }
}
