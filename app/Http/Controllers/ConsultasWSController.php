<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cuentum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use App\Transaccion;
use Carbon\Carbon;
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

    public function transaccion($idBanco, $fecha, $monto, $cuentaOrigen, $cuentaDestino)
    {
        //$datos = Cliente::_transaccion($fecha,$monto,$cuentaOrigen,$cuentaDestino);
        //return json_encode(array("datos" => $datos));
        $saldo = Cuentum::where('id', $cuentaOrigen)->get()->first()->saldo;


        if ($saldo >= $monto) {
            Transaccion::create([
                'fecha' => $fecha,
                'monto' => $monto,
                'id_banco' => $idBanco,
                'id_cuenta_destino' => $cuentaDestino,
                'id_cuenta' => $cuentaOrigen
            ]);
            $request=['fecha'=>$fecha,'monto'=>$monto,'id_cuenta'=>$cuentaOrigen,'id_cuenta_destino'=>$cuentaDestino];
            $cliente= Cliente::join('cuentas as c','c.id_cliente','clientes.id')
                ->where('c.id',$cuentaOrigen)->first();
            $cliente1= Cliente::join('cuentas as c','c.id_cliente','clientes.id')
                ->where('c.id',$cuentaDestino)->first();
            $pdf = \PDF::loadview('transaccion.pdfTransaccion',compact('cliente','cliente1','request'));
            return $pdf->stream('movimiento '.Carbon::now().'.pdf');
           // return json_encode(array("resultado" => 0));
        } else {
            return json_encode(array("resultado" => $saldo));
        }


    }


    public function historia($correo)
    {
        //return 'hola';
        $datos = Cliente::_transacciones($correo);
        return json_encode(array("historia" => $datos));
    }

    public function mapa($correo)
    {
        $datos = Cliente::_mapa($correo);
        return json_encode(array("mapas" => $datos));
    }

    public function saldo($correo)
    {
        $datos = Cliente::_saldo($correo);
        return json_encode(array("saldoactual" => $datos));
    }

    public function bancos()
    {
        $datos1 = Banco::all();
        return json_encode(array("bancos" => $datos1));
    }


}
