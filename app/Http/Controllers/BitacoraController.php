<?php

namespace App\Http\Controllers;

use App\Banco;
use Dompdf\Exception;
use Illuminate\Http\Request;
use App\Cuentum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{

    const S = DIRECTORY_SEPARATOR;

    private static function tieneLog($id_banco) {
        $banco = Banco::findOrFail($id_banco);
        return ($banco->log == null) ? false : true;
    }

    private static function crear($id_banco, $descripcion, $ejecutor) {
        $id = uniqid();
        $nombre = $id_banco.'_log_'.$id;
        $ruta = public_path('log');
        if (!is_dir($ruta)) {
            mkdir($ruta, 0755, true);
        }
        $ruta = join(self::S,[$ruta, $nombre]) ;

        $tupla = join(self::S, [$id_banco, $descripcion, $ejecutor, date("Y-m-d"), date("H:i:s")]);
        $tupla = $tupla.self::S."\n";

        $archivo = fopen($ruta, "a");
        fwrite($archivo, $tupla);
        fclose($archivo);
        return $nombre;
    }

    private static function actualizar($nombre, $id_banco, $descripcion, $ejecutor) {
        $ruta = join(self::S, [public_path('log'), $nombre]) ;
        if (!is_file($ruta)) {
            throw new Exception('El archivo no existe');
        }

        $tupla = join(self::S, [$id_banco, $descripcion, $ejecutor, date("Y-m-d"), date("H:i:s")]);
        $tupla = $tupla.self::S."\n";

        $archivo = fopen($ruta, "a");
        fwrite($archivo, $tupla);
        fclose($archivo);
    }

    public static function guardar($descripcion, $nombre_accion, $id_banco) {

        $banco = Banco::findOrFail($id_banco);
        if (self::tieneLog($id_banco)) {
            // tiene log -> añade un nuevo registro
            $nombre = $banco->log;
            self::actualizar($nombre, $id_banco, $descripcion, $nombre_accion);
        } else {
            // no tiene log -> crea log y añade nuevo registro
            $nombre = self::crear($id_banco, $descripcion, $nombre_accion);
            $banco->log = $nombre;
            $banco->save();
        }
    }

    private static function cargarLogs($nombre_log) {
        $ruta = join(self::S, [public_path('log'), $nombre_log]);
        if (!is_file($ruta)) {
            throw new Exception('El archivo no existe');
        }

        $resultado = [
            /*
            0 => elementos1,
            1 => elementos2,
            .
            .
            .
            n => elementosn
            */
        ];





        $archivo = fopen($ruta, "r");
        $i = 0;
        while (!feof($archivo)) {
            $fila = fgets($archivo);
            if ($fila == false) {
                break;
            }
            $index = 0;
            $n = iconv_strlen($fila);
            $elementos = [
                'id_banco' => null,
                'detalle' => null,
                'ejecutor' => null,
                'fecha' => null,
                'hora' => null,
            ];
            foreach ($elementos as $clave => $item) {
                $pos = strpos($fila, self::S, $index);
                $cant = $pos - $index;
                $item = substr($fila, $index, $cant);
                $elementos[$clave] = $item;
                $index = $pos + 1;

            }


            $resultado[$i] = $elementos;
            $i++;

            if (feof($archivo)) {
                break;
            }

            /*
            while ($index < $n) {
                $pos = strpos($fila, self::S, $index);
                $cant = $pos - $index;
                $id_banco = substr($fila, $index, $cant);
                $index = $pos + 1;

                $pos = strpos($fila, self::S, $index);
                $cant = $pos - $index;
                $detalle = substr($fila, $index, $cant);
                $index = $pos + 1;

                $pos = strpos($fila, self::S, $index);
                $cant = $pos - $index;
                $ejecutor = substr($fila, $index, $cant);
                $index = $pos + 1;

                $pos = strpos($fila, self::S, $index);
                $cant = $pos - $index;
                $fecha = substr($fila, $index, $cant);
                $index = $pos + 1;
            }
            */
            //echo $fila.'<br/>';
        }
        fclose($archivo);


        return $resultado;
    }

    public static function abrir($id_banco) {

        $banco = Banco::findOrFail($id_banco);
        $nombre_log = $banco->log;
        $logs = [];
        if ($nombre_log != null) {
            //$logs = $this->cargarLogs($banco->log);
            $logs = self::cargarLogs($banco->log);
        }
        return $logs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $logs = $this->abrir(Auth::user()->id_banco);


        //dd('listo');

        //$this->guardar('Cuenta->Nueva_Cuenta', Auth::user()->name, Auth::user()->id_banco);
        //dd('listo');


        return view('bitacora.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $id_banco=1;
        $cliente= Cliente::_getClientesBanco($id_banco)->get()->pluck('nombre','id');

        $tipocuenta= TipoCuentum::_getTipoCuentas($id_banco)->get()->pluck('nombre','id');

        return view('cuenta.create',compact('cliente','tipocuenta'));
    }

    public function historico($id_cuenta)
    {
        $historico = Historico::where('id_cuenta',$id_cuenta)->orderBy('fecha','desc')->paginate(10);
        return view('historico.index', compact('historico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_cliente' => 'required',
            'saldo' => 'required',
            'moneda' => 'required',
            'id_banco' => 'required'
        ]);



        $requestData = $request->all();

        Cuentum::create($requestData);

        Session::flash('flash_message', 'Cuentum added!');

        return redirect('cuenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cuentum = Cuentum::findOrFail($id);

        return view('cuenta.show', compact('cuentum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cuentum = Cuentum::findOrFail($id);
        $id_banco=1;
        $cliente= Cliente::_getClientesBanco($id_banco)->get()->pluck('nombre','id');
        $tipocuenta= TipoCuentum::_getTipoCuentas($id_banco)->get()->pluck('nombre','id');
        return view('cuenta.edit', compact('cuentum','cliente','tipocuenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'id_cliente' => 'required',
            'saldo' => 'required',
            'moneda' => 'required',
            'id_banco' => 'required',
            'id_tipo' => 'required'
        ]);
        $requestData = $request->all();

        $cuentum = Cuentum::findOrFail($id);
        $cuentum->update($requestData);

        Session::flash('flash_message', 'Cuentum updated!');

        return redirect('cuenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cuentum::destroy($id);

        Session::flash('flash_message', 'Cuentum deleted!');

        return redirect('cuenta');
    }
}
