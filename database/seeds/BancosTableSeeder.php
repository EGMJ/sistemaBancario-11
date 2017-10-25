<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancos = [
            1 => ['Banco Nacional de Bolivia', 45625815, null,'2017-09-25 05:01:16', '2017-09-25 05:01:16'],
        ];

        foreach ($bancos as $banco) {
            DB::table('bancos')->insert([
                'razon_social' => $banco[0],
                'nit' => $banco[1],
                'log' => $banco[2],
                'created_at' => $banco[3],
                'updated_at' => $banco[4]
            ]);
        }
    }
}
