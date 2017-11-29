<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Historico;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cuentum;
use App\TipoCuentum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cuenta = Cuentum::where('id_cliente', 'LIKE', "%$keyword%")
				->orWhere('saldo', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('id_tipo', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $cuenta = Cuentum::join('clientes as c','c.id','id_cliente')
                ->join('tipo_cuentas as t','t.id','id_tipo')->select(
                    'cuentas.id as id',
                    DB::raw('concat(c.nombre," ",c.paterno," ",c.materno)as nombre'),
                    't.nombre as tipo',
                    'saldo'
                )->paginate($perPage);
        }

        return view('cuenta.index', compact('cuenta'));
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
     *ss
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
