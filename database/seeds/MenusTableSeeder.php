<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos = [
            1 => [
                ['MEN-011', 'Banco', 'opciones banco'],
                ['MEN-012', 'Crear Cuenta', 'crear cuenta'],
                ['MEN-013', 'Cuenta Administrativa', 'opciones cuenta'],
            ],
            2 => [
                ['MEN-021', 'Sucursal', 'opciones sucursal'],
                ['MEN-022', 'Caja', 'opciones caja'],
                ['MEN-023', 'Historia Caja', 'opciones historia caja'],
            ],
            3 => [
                ['MEN-031', 'Cliente', 'opciones cliente'],
                ['MEN-032', 'Socio', 'opciones socio'],
            ],
            4 => [
                ['MEN-041', 'Cuenta', 'opciones cuente'],
                ['MEN-042', 'Tipo de Cuenta', 'opciones tipo de cuenta'],
                ['MEN-043', 'Movimiento', 'opciones movimiento'],
                ['MEN-044', 'Transacciones', 'opciones de transsaccion'],
            ],
            5 => [

            ],
            6 => [
                ['MEN-061', 'Roles', 'opciones de rol'],
                ['MEN-062', 'Permisos', 'opciones de permisos'],
            ],
            7 => [

            ]
        ];

        foreach ($modulos as $id => $modulo) {
            foreach ($modulo as $menu) {
                DB::table('menus')->insert([
                    'cod' => $menu[0],
                    'nombre' => $menu[1],
                    'descripcion' => $menu[2],
                    'id_modulo' => $id,
                ]);
            }
        }
    }
}
