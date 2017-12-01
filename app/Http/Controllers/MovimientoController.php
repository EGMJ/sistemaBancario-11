<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cuentum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Client;

class MovimientoController extends Controller
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
            $movimiento = Movimiento::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_caja', 'LIKE', "%$keyword%")
				->orWhere('monto', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('id_cuenta', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $movimiento = Movimiento::paginate($perPage);
        }

        return view('movimiento.index', compact('movimiento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movimiento.create');
    }
    public function caja($id_caja)
    {
        $clientes=Cliente::where('id_banco',Auth::user()->id_banco)
            ->select(
                DB::raw('concat(nombre," ",paterno," ",materno)as nombre'),
                'id'
            )->get()->pluck('nombre','id');
        return view('movimiento.create1',compact('id_caja','clientes'));
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
			'id_caja' => 'required',
			'id_cuenta' => 'required',
			'id_banco' => 'required'
		]);

        $saldo=Cuentum::where('id',$request['id_cuenta'])->get()->first()->saldo;


        if(($request['tipo']=="RETIRO" AND $saldo>=$request['monto'] )or($request['tipo']=="DEPOSITO") ){
            $requestData = $request->all();
            Movimiento::create($requestData);

            $cliente= Cliente::join('cuentas as c','c.id_cliente','clientes.id')
                ->where('c.id',$request['id_cuenta'])->first();
            $pdf = \PDF::loadview('movimiento.pdfMovimiento',compact('cliente','request'));
            return $pdf->stream('movimiento '.Carbon::now().'.pdf');
            Session::flash('message', 'Movimiento realizado exitosamente!');
        }else{
            Session::flash('error', 'Movimiento Abortado: Saldo insuficiente!');
            return back();
        }



        BitacoraController::guardar('Movimiento->Movimiento guardado', Auth::user()->name, Auth::user()->id_banco);


        return redirect('movimiento');
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
        $movimiento = Movimiento::findOrFail($id);

        return view('movimiento.show', compact('movimiento'));
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
        $movimiento = Movimiento::findOrFail($id);

        return view('movimiento.edit', compact('movimiento'));
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
			'id_caja' => 'required',
			'id_cuenta' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->update($requestData);

        Session::flash('flash_message', 'Movimiento updated!');

        return redirect('movimiento');
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
        Movimiento::destroy($id);

        Session::flash('flash_message', 'Movimiento deleted!');

        return redirect('movimiento');
    }
}
