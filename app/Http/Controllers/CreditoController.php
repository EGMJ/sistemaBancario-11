<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Credito;
use Illuminate\Http\Request;
use Session;

class CreditoController extends Controller
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
            $credito = Credito::where('monto', 'LIKE', "%$keyword%")
				->orWhere('plaso', 'LIKE', "%$keyword%")
				->orWhere('interes', 'LIKE', "%$keyword%")
				->orWhere('monto_pagado', 'LIKE', "%$keyword%")
				->orWhere('saldo', 'LIKE', "%$keyword%")
				->orWhere('id_cuenta', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $credito = Credito::paginate($perPage);
        }

        return view('credito.index', compact('credito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('credito.create');
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
			'plaso' => 'required',
			'interes' => 'required',
			'monto_pagado' => 'required',
			'saldo' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        Credito::create($requestData);

        Session::flash('flash_message', 'Credito added!');

        return redirect('credito');
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
        $credito = Credito::findOrFail($id);

        return view('credito.show', compact('credito'));
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
        $credito = Credito::findOrFail($id);

        return view('credito.edit', compact('credito'));
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
			'plaso' => 'required',
			'interes' => 'required',
			'monto_pagado' => 'required',
			'saldo' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $credito = Credito::findOrFail($id);
        $credito->update($requestData);

        Session::flash('flash_message', 'Credito updated!');

        return redirect('credito');
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
        Credito::destroy($id);

        Session::flash('flash_message', 'Credito deleted!');

        return redirect('credito');
    }
}
