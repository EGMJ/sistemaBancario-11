<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Caja;
use Illuminate\Http\Request;
use Session;

class CajaController extends Controller
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
            $caja = Caja::where('tipo', 'LIKE', "%$keyword%")
				->orWhere('id_sucursal', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('total', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $caja = Caja::paginate($perPage);
        }

        return view('caja.index', compact('caja'));
    }

    public function cajas($id_sucursal)
    {
        $caja = Caja::where('id_sucursal',$id_sucursal)->paginate(10);
        return view('caja.index', compact('caja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('caja.create');
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
			'tipo' => 'required',
			'id_sucursal' => 'required',
			'total' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        Caja::create($requestData);

        Session::flash('flash_message', 'Caja added!');

        return redirect('caja');
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
        $caja = Caja::findOrFail($id);

        return view('caja.show', compact('caja'));
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
        $caja = Caja::findOrFail($id);

        return view('caja.edit', compact('caja'));
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
			'tipo' => 'required',
			'id_sucursal' => 'required',
			'total' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $caja = Caja::findOrFail($id);
        $caja->update($requestData);

        Session::flash('flash_message', 'Caja updated!');

        return redirect('caja');
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
        Caja::destroy($id);

        Session::flash('flash_message', 'Caja deleted!');

        return redirect('caja');
    }
}
