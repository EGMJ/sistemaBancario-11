<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelCntroller extends Controller
{
    public function excel(){



        Excel ::create('Laravel Excel', function($excel) {

            $excel->sheet('Excel sheet', function($sheet) {

                $cliente=Cliente::all();
                $sheet->fromArray($cliente);

            });

        })->export('xls');
    }
}
