<?php
/**
 * Created by PhpStorm.
 * User: Yimmy
 * Date: 14/10/2017
 * Time: 8:29
 */

namespace App;
use Illuminate\Support\Facades\Artisan;

class Backup
{
    //la rama yimmy
    const  SEPARADOR = DIRECTORY_SEPARATOR;
    private $servidor; // Nombre del servidor o host
    private $usuario; // Nombre del usuario del servidor de base de datos
    private $contrasena; // Contraseña del servidor de base de datos
    private $nombre_bd; // Nombre de la base de datos
    private $ruta; // Ruta o direcctorio donde se almacenará el archivo de volcado
    private $rutain; // Ruta o direcctorio donde se almacenará el archivo de volcado
    private $nombre_bk; // Nombre que tendrá el archivo de volcado
    private $rutaRelativa;

    function __construct($nombre)
    {
        $this->servidor = env('DB_HOST').':'.env('DB_PORT');
        $this->usuario = env('DB_USERNAME');
        $this->contrasena = env('DB_PASSWORD');
        $this->nombre_bd = env('DB_DATABASE');
        $this->nombre_bk = date("Y-m-d").'_'.date("H-i-s").'_'.$nombre.'_backup.sql';
        $this->rutain = join(self::SEPARADOR, [public_path('backups'), date('Y'), date('m')]);
        $this->rutaRelativa = join(self::SEPARADOR, ['backups', date('Y'), date('m')]);

        if (!is_dir($this->rutain)) {
            mkdir($this->rutain, 0755, true);
        }

        $this->ruta = join(self::SEPARADOR, [$this->rutain, $this->nombre_bk]);

    }

    public function ejecutar() {
        $resultado = Artisan::call('db:backup', [
            'usuario' => $this->usuario,
            'contrasena' => $this->contrasena,
            'nombreBD' => $this->nombre_bd,
            'ruta' => $this->ruta
        ]);


        $datos = [$this->rutaRelativa, $this->nombre_bk ];

        return $datos;
    }
}