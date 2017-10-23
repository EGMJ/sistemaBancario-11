<?php

namespace App\Http\Controllers;

use App\Caja;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Detalle;
use Illuminate\Http\Request;
use Session;

class DetalleController extends Controller
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
            $detalle = Detalle::where('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_caja', 'LIKE', "%$keyword%")
				->orWhere('monto', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('detalle', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $detalle = Detalle::paginate($perPage);
        }

        return view('detalle.index', compact('detalle'));
    }

    public function historico($id_caja){
        $detalle = Detalle::where('id_caja',$id_caja)->paginate(10);
        $caja=Caja::find($id_caja);
        return view('detalle.index1', compact('detalle','caja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('detalle.create');
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
			'id_caja' => 'required',
			'detalle' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        Detalle::create($requestData);

        Session::flash('flash_message', 'Detalle added!');

        return redirect('detalle');
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
        $detalle = Detalle::findOrFail($id);

        return view('detalle.show', compact('detalle'));
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
        $detalle = Detalle::findOrFail($id);

        return view('detalle.edit', compact('detalle'));
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
			'id_caja' => 'required',
			'detalle' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $detalle = Detalle::findOrFail($id);
        $detalle->update($requestData);

        Session::flash('flash_message', 'Detalle updated!');

        return redirect('detalle');
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
        Detalle::destroy($id);

        Session::flash('flash_message', 'Detalle deleted!');

        return redirect('detalle');
    }
}
