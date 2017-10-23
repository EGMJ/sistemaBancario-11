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

class BackupCommand extends Command
{
    /**
     * Variable que contendrá la ruta absoluta de mysql.exe
     *
     * Por ejemplo:
     * "C:\wamp64\bin\mysql\mysql5.7.14\bin\mysqldump.exe"
     *
     * @var
     */
    private $mysqldump;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "db:backup {nombreBD : Nombre de la base de datos} {ruta : Ruta en la que se almacenará el archivo de volcado} {server=localhost : Nombre del host o servidor de base de datos} {usuario=root : Nombre de usuario} {contrasena='' : Contraseña del usuario}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecuta el comando mysqldump, permitiendo generar un escript de respaldo de la Base de Datos';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->mysqldump = $this->validarRuta();
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

        $comando = sprintf('%s -h %s -u %s -p%s %s > %s', $this->mysqldump, $servidor, $usuario, $contrasena, $nombre_bd, $ruta);


        return exec($comando);
    }

    private function validarRuta() {
        $ruta = join(DIRECTORY_SEPARATOR, [env('DB_MYSQL_PATH'), 'mysqldump.exe']);
        if (!is_executable($ruta)) {
            throw new Exception('La ruta de la instalación de MySQL es invalida!');
        }
        return $ruta;
    }
}
