<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pago;
use Illuminate\Http\Request;
use Session;

class PagoController extends Controller
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
            $pago = Pago::where('monto', 'LIKE', "%$keyword%")
				->orWhere('saldo', 'LIKE', "%$keyword%")
				->orWhere('fechaPago', 'LIKE', "%$keyword%")
				->orWhere('retraso', 'LIKE', "%$keyword%")
				->orWhere('id_credito', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $pago = Pago::paginate($perPage);
        }

        return view('pago.index', compact('pago'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pago.create');
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
			'monto' => 'required',
			'saldo' => 'required',
			'retraso' => 'required',
			'id_credito' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        Pago::create($requestData);

        Session::flash('flash_message', 'Pago added!');

        return redirect('pago');
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
        $pago = Pago::findOrFail($id);

        return view('pago.show', compact('pago'));
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
        $pago = Pago::findOrFail($id);

        return view('pago.edit', compact('pago'));
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
			'monto' => 'required',
			'saldo' => 'required',
			'retraso' => 'required',
			'id_credito' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $pago = Pago::findOrFail($id);
        $pago->update($requestData);

        Session::flash('flash_message', 'Pago updated!');

        return redirect('pago');
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
        Pago::destroy($id);

        Session::flash('flash_message', 'Pago deleted!');

        return redirect('pago');
    }
}
