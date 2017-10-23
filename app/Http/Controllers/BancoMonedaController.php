<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BancoMoneda;
use Illuminate\Http\Request;
use Session;

class BancoMonedaController extends Controller
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
            $bancomoneda = BancoMoneda::where('id_moneda', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $bancomoneda = BancoMoneda::paginate($perPage);
        }

        return view('banco-moneda.index', compact('bancomoneda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('banco-moneda.create');
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
			'id_moneda' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        BancoMoneda::create($requestData);

        Session::flash('flash_message', 'BancoMoneda added!');

        return redirect('banco-moneda');
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
        $bancomoneda = BancoMoneda::findOrFail($id);

        return view('banco-moneda.show', compact('bancomoneda'));
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
        $bancomoneda = BancoMoneda::findOrFail($id);

        return view('banco-moneda.edit', compact('bancomoneda'));
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
			'id_moneda' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $bancomoneda = BancoMoneda::findOrFail($id);
        $bancomoneda->update($requestData);

        Session::flash('flash_message', 'BancoMoneda updated!');

        return redirect('banco-moneda');
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
        BancoMoneda::destroy($id);

        Session::flash('flash_message', 'BancoMoneda deleted!');

        return redirect('banco-moneda');
    }
}
