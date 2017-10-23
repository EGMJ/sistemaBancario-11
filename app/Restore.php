<?php
/**
 * Created by PhpStorm.
 * User: Yimmy
 * Date: 14/10/2017
 * Time: 19:35
 */

namespace App;


use Exception;
use Illuminate\Support\Facades\Artisan;

class Restore
{
    const  SEPARADOR = DIRECTORY_SEPARATOR;
    private $servidor; // Nombre del servidor o host
    private $usuario; // Nombre del usuario del servidor de base de datos
    private $contrasena; // Contraseña del servidor de base de datos
    private $nombre_bd; // Nombre de la base de datos
    private $ruta; // Ruta o direcctorio donde se almacenará el archivo de volcado

    function __construct($ruta, $nombre_bk)
    {
        $this->ruta = $this->validarRuta($ruta, $nombre_bk);

        $this->servidor = env('DB_HOST').':'.env('DB_PORT');
        $this->usuario = env('DB_USERNAME');
        $this->contrasena = env('DB_PASSWORD');
        $this->nombre_bd = env('DB_DATABASE');

    }

    public function ejecutar() {
        $resultado = Artisan::call('db:restore', [
            'usuario' => $this->usuario,
            'contrasena' => $this->contrasena,
            'nombreBD' => $this->nombre_bd,
            'ruta' => $this->ruta
        ]);

        return $resultado;
    }

    private function validarRuta($ruta, $backup) {
        $verificar = join(self::SEPARADOR, [$ruta, $backup]);
        if (!is_file($verificar)) {
            throw new Exception('La ruta del backup es invalida!');
        }
        return $verificar;
    }
}