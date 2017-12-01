<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos = [
            1 => ['MOD-001', 'Basico', 'Contiene las funciones de banco, moneda y control de cuentas'],
            2 => ['MOD-002', 'Parámetros Administrativos', 'Contiene las funciones de sucursal y caja'],
            3 => ['MOD-003', 'Persona', 'Contiene las funciones de cliente y socio'],
            4 => ['MOD-004', 'Administrar Cuenta', 'Contiene las funciones de cuenta, movimientos y transacciones'],
            5 => ['MOD-005', 'Copia y Restauración', 'Permite el respaldo y restauración de los datos del banco'],
            6 => ['MOD-006', 'Roles y Permisos', 'Contiene las funciones de roles de usuario y sus permisos respectivos'],
            7 => ['MOD-007', 'Bitacora', 'Funcionalidad de log, historial de operaciones importantes que se han realizado'],
        ];

        foreach ($modulos as $modulo) {
            DB::table('modulos')->insert([
                'cod' => $modulo[0],
                'nombre' => $modulo[1],
                'descripcion' => $modulo[2]
            ]);
        }
    }
}
