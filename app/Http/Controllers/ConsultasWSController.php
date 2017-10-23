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

    public function historia($correo)
    {
        $datos = Cliente::_transacciones($correo);
        return json_encode(array("historia" => $datos));
    }




}
