<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modulo;
use Illuminate\Http\Request;
use Session;

class ModuloController extends Controller
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
            $modulo = Modulo::where('cod', 'LIKE', "%$keyword%")
				->orWhere('nombre', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $modulo = Modulo::paginate($perPage);
        }

        return view('modulo.index', compact('modulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modulo.create');
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
			'cod' => 'required',
			'nombre' => 'required',
			'descripcion' => 'required'
		]);
        $requestData = $request->all();
        
        Modulo::create($requestData);

        Session::flash('flash_message', 'Modulo added!');

        return redirect('modulo');
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
        $modulo = Modulo::findOrFail($id);

        return view('modulo.show', compact('modulo'));
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
        $modulo = Modulo::findOrFail($id);

        return view('modulo.edit', compact('modulo'));
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
			'cod' => 'required',
			'nombre' => 'required',
			'descripcion' => 'required'
		]);
        $requestData = $request->all();
        
        $modulo = Modulo::findOrFail($id);
        $modulo->update($requestData);

        Session::flash('flash_message', 'Modulo updated!');

        return redirect('modulo');
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
        Modulo::destroy($id);

        Session::flash('flash_message', 'Modulo deleted!');

        return redirect('modulo');
    }
}
