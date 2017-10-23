<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cambio;
use Illuminate\Http\Request;
use Session;

class CambioController extends Controller
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
            $cambio = Cambio::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('valor', 'LIKE', "%$keyword%")
				->orWhere('id_moneda', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $cambio = Cambio::paginate($perPage);
        }

        return view('cambio.index', compact('cambio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cambio.create');
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
			'valor' => 'required',
			'id_moneda' => 'required'
		]);
        $requestData = $request->all();
        
        Cambio::create($requestData);

        Session::flash('flash_message', 'Cambio added!');

        return redirect('cambio');
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
        $cambio = Cambio::findOrFail($id);

        return view('cambio.show', compact('cambio'));
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
        $cambio = Cambio::findOrFail($id);

        return view('cambio.edit', compact('cambio'));
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
			'valor' => 'required',
			'moneda_id' => 'required'
		]);
        $requestData = $request->all();
        
        $cambio = Cambio::findOrFail($id);
        $cambio->update($requestData);

        Session::flash('flash_message', 'Cambio updated!');

        return redirect('cambio');
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
        Cambio::destroy($id);

        Session::flash('flash_message', 'Cambio deleted!');

        return redirect('cambio');
    }
}
