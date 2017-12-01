<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cliente;
use App\Cuentum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Transaccion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class TransaccionController extends Controller
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
            $transaccion = Transaccion::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('monto', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('id_cuenta', 'LIKE', "%$keyword%")
				->orWhere('id_cuenta_destino', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $transaccion = Transaccion::paginate($perPage);
        }

        return view('transaccion.index', compact('transaccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $bancos = Banco::all()->pluck('razon_social','id');
        return view('transaccion.create',compact('bancos'));
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
			'fecha' => 'required',
			'monto' => 'required',
			'id_cuenta_destino' => 'required',
			'id_cuenta' => 'required'
		]);

        $saldo=Cuentum::where('id',$request['id_cuenta'])->get()->first()->saldo;


        if($saldo>=$request['monto'] ){
            $requestData = $request->all();

            Transaccion::create($requestData);
            $cliente= Cliente::join('cuentas as c','c.id_cliente','clientes.id')
                ->where('c.id',$request['id_cuenta'])->first();
            $cliente1= Cliente::join('cuentas as c','c.id_cliente','clientes.id')
                ->where('c.id',$request['id_cuenta_destino'])->first();
            $pdf = \PDF::loadview('transaccion.pdfTransaccion',compact('cliente','cliente1','request'));
            return $pdf->stream('movimiento '.Carbon::now().'.pdf');

            Session::flash('message', 'Movimiento realizado exitosamente!');
        }else{
            Session::flash('error', 'Movimiento Abortado: Saldo insuficiente!');
            return back();
        }


        return redirect('transaccion');
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
        $transaccion = Transaccion::findOrFail($id);

        return view('transaccion.show', compact('transaccion'));
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
        $transaccion = Transaccion::findOrFail($id);

        return view('transaccion.edit', compact('transaccion'));
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
			'fecha' => 'required',
			'monto' => 'required',
			'id_cuenta_destino' => 'required',
			'id_cuenta' => 'required'
		]);
        $requestData = $request->all();
        
        $transaccion = Transaccion::findOrFail($id);
        $transaccion->update($requestData);

        Session::flash('flash_message', 'Transaccion updated!');

        return redirect('transaccion');
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
        Transaccion::destroy($id);

        Session::flash('flash_message', 'Transaccion deleted!');

        return redirect('transaccion');
    }
}
