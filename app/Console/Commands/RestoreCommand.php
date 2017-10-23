<?php
/**
 * Created by PhpStorm.
 * User: Yimmy
 * Date: 14/10/2017
 * Time: 21:29
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;

class RestoreCommand extends Command
{
    private $mysql;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "db:restore {nombreBD : Nombre de la base de datos} {ruta : Ruta en la que se encuentra el archivo de volcado} {server=localhost : Nombre del host o servidor de base de datos} {usuario=root : Nombre de usuario} {contrasena='' : Contraseña del usuario}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mysql = $this->validarRuta();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $servidor = $this->argument('server');
        $usuario = $this->argument('usuario');
        $contrasena = $this->argument('contrasena');
        $nombre_bd = $this->argument('nombreBD');
        $ruta = $this->argument('ruta');

        $comando = sprintf('%s -h %s -u %s -p%s %s < %s', $this->mysql, $servidor, $usuario, $contrasena, $nombre_bd, $ruta);

        return exec($comando);
    }

    private function validarRuta() {
        $ruta = join(DIRECTORY_SEPARATOR, [env('DB_MYSQL_PATH'), 'mysql.exe']);
        if (!is_executable($ruta)) {
            throw new Exception('La ruta de la instalación de MySQL es invalida!');
        }
        return $ruta;
    }
}
