<?php

namespace App\Http\Controllers;

use App\Cuentum;
use Illuminate\Http\Request;
use App\Detalle;
use PDF;

class PDFController extends Controller
{
    public function pdf(){
        $detalle = Detalle::all();
        $pdf = PDF::loadview('pdf', ['detalles'=>$detalle]);
        return $pdf->download('Detalle.pdf');
    }
    public function pdf1(){
        $cuenta = Cuentum::all();
        $pdf = PDF::loadview('pdf1', ['cuenta'=>$cuenta]);
        return $pdf->download('Cuenta.pdf1');
    }
}
