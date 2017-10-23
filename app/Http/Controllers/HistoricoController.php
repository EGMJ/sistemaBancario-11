<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Historico;
use Illuminate\Http\Request;
use Session;

class HistoricoController extends Controller
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
            $historico = Historico::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_cuenta', 'LIKE', "%$keyword%")
				->orWhere('monto', 'LIKE', "%$keyword%")
				->orWhere('saldo', 'LIKE', "%$keyword%")
				->orWhere('detalle', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $historico = Historico::paginate($perPage);
        }

        return view('historico.index', compact('historico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('historico.create');
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
			'id_cuenta' => 'required',
			'monto' => 'required',
			'saldo' => 'required',
			'detalle' => 'required'
		]);
        $requestData = $request->all();
        
        Historico::create($requestData);

        Session::flash('flash_message', 'Historico added!');

        return redirect('historico');
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
        $historico = Historico::findOrFail($id);

        return view('historico.show', compact('historico'));
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
        $historico = Historico::findOrFail($id);

        return view('historico.edit', compact('historico'));
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
			'id_cuenta' => 'required',
			'monto' => 'required',
			'saldo' => 'required',
			'detalle' => 'required'
		]);
        $requestData = $request->all();
        
        $historico = Historico::findOrFail($id);
        $historico->update($requestData);

        Session::flash('flash_message', 'Historico updated!');

        return redirect('historico');
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
        Historico::destroy($id);

        Session::flash('flash_message', 'Historico deleted!');

        return redirect('historico');
    }
}
