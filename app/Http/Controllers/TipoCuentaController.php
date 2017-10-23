<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoCuentum;
use Illuminate\Http\Request;
use Session;

class TipoCuentaController extends Controller
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
            $tipocuenta = TipoCuentum::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('interes', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $tipocuenta = TipoCuentum::paginate($perPage);
        }

        return view('tipo-cuenta.index', compact('tipocuenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-cuenta.create');
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
			'nombre' => 'required',
			'interes' => 'required'
		]);
        $requestData = $request->all();
        
        TipoCuentum::create($requestData);

        Session::flash('flash_message', 'TipoCuentum added!');

        return redirect('tipo-cuenta');
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
        $tipocuentum = TipoCuentum::findOrFail($id);

        return view('tipo-cuenta.show', compact('tipocuentum'));
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
        $tipocuentum = TipoCuentum::findOrFail($id);

        return view('tipo-cuenta.edit', compact('tipocuentum'));
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
			'nombre' => 'required',
			'interes' => 'required'
		]);
        $requestData = $request->all();
        
        $tipocuentum = TipoCuentum::findOrFail($id);
        $tipocuentum->update($requestData);

        Session::flash('flash_message', 'TipoCuentum updated!');

        return redirect('tipo-cuenta');
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
        TipoCuentum::destroy($id);

        Session::flash('flash_message', 'TipoCuentum deleted!');

        return redirect('tipo-cuenta');
    }
}
