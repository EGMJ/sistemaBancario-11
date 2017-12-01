<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            1 => ['ROL-001', 'Administrador', 'Rol con acceso a toda la funcionalidad del sistema.'],
            2 => ['ROL-002', 'Cajero', 'Rol con acceso a las funciones referentes a las cajas.'],
            3 => ['ROL-003', 'Oficial de Crédito', 'Rol con acceso a funciones referentes al credito.'],
            4 => ['ROL-004', 'Gerente', 'Rol con acceso a funciones administrativas imoprtantes.'],
        ];

        foreach ($roles as $role) {
            DB::table('rols')->insert([
                'cod' => $role[0],
                'nombre' => $role[1],
                'descripcion' => $role[2]
            ]);
        }
    }
}
