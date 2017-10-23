<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Moneda;
use Illuminate\Http\Request;
use Session;

class MonedaController extends Controller
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
            $moneda = Moneda::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->orWhere('abreviatura', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $moneda = Moneda::paginate($perPage);
        }

        return view('moneda.index', compact('moneda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('moneda.create');
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
			'descripcion' => 'required',
			'abreviatura' => 'required'
		]);
        $requestData = $request->all();
        
        Moneda::create($requestData);

        Session::flash('flash_message', 'Moneda added!');

        return redirect('moneda');
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
        $moneda = Moneda::findOrFail($id);

        return view('moneda.show', compact('moneda'));
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
        $moneda = Moneda::findOrFail($id);

        return view('moneda.edit', compact('moneda'));
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
			'descripcion' => 'required',
			'abreviatura' => 'required'
		]);
        $requestData = $request->all();
        
        $moneda = Moneda::findOrFail($id);
        $moneda->update($requestData);

        Session::flash('flash_message', 'Moneda updated!');

        return redirect('moneda');
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
        Moneda::destroy($id);

        Session::flash('flash_message', 'Moneda deleted!');

        return redirect('moneda');
    }
}
