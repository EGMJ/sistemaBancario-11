<?php

namespace App\Http\Controllers;

use App\Cuentum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use App\Transaccion;
use Illuminate\Http\Request;
use Session;

class ConsultasWSController extends Controller
{
    //

    public function login($correo)
    {
        $contra = Cliente::_login($correo);
        return json_encode(array("login" => $contra));
    }

    public function datos($correo)
    {
        $datos = Cliente::_datos($correo);
        return json_encode(array("datos" => $datos));
    }
    public function transaccion($idBanco,$fecha,$monto,$cuentaOrigen,$cuentaDestino)
    {
        //$datos = Cliente::_transaccion($fecha,$monto,$cuentaOrigen,$cuentaDestino);
        //return json_encode(array("datos" => $datos));
        Transaccion::create([
            'fecha' => $fecha,
            'monto' => $monto,
            'id_banco' => $idBanco,
            'id_cuenta_destino' => $cuentaDestino,
            'id_cuenta' => $cuentaOrigen
        ]);
    }



    public function historia($correo)
    {
       //return 'hola';
        $datos = Cliente::_transacciones($correo);
        return json_encode(array("historia" => $datos));
    }

    public function saldo($correo)
    {
        $datos = Cliente::_saldo($correo);
        return json_encode(array("saldoactual" => $datos));
    }
    public function mapa($correo)
    {
        $datos = Cliente::_mapa($correo);
        return json_encode(array("mapas" => $datos));
    }

}
