<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sucursal;
use Illuminate\Http\Request;
use Session;

class SucursalController extends Controller
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
            $sucursal = Sucursal::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('departamento', 'LIKE', "%$keyword%")
				->orWhere('telefono', 'LIKE', "%$keyword%")
				->orWhere('direccion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $sucursal = Sucursal::paginate($perPage);
        }

        return view('sucursal.index', compact('sucursal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sucursal.create');
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
			'id_banco' => 'required',
			'departamento' => 'required',
			'telefono' => 'required',
			'direccion' => 'required'
		]);
        $requestData = $request->all();
        
        Sucursal::create($requestData);

        Session::flash('flash_message', 'Sucursal added!');

        return redirect('sucursal');
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
        $sucursal = Sucursal::findOrFail($id);

        return view('sucursal.show', compact('sucursal'));
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
        $sucursal = Sucursal::findOrFail($id);

        return view('sucursal.edit', compact('sucursal'));
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
			'id_banco' => 'required',
			'departamento' => 'required',
			'telefono' => 'required',
			'direccion' => 'required'
		]);
        $requestData = $request->all();
        
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($requestData);

        Session::flash('flash_message', 'Sucursal updated!');

        return redirect('sucursal');
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
        Sucursal::destroy($id);

        Session::flash('flash_message', 'Sucursal deleted!');

        return redirect('sucursal');
    }
}
