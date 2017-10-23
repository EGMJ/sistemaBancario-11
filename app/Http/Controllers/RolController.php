<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rol;
use Illuminate\Http\Request;
use Session;

class RolController extends Controller
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
            $rol = Rol::where('cod', 'LIKE', "%$keyword%")
				->orWhere('nombre', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $rol = Rol::paginate($perPage);
        }

        return view('rol.index', compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rol.create');
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
        
        Rol::create($requestData);

        Session::flash('flash_message', 'Rol added!');

        return redirect('rol');
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
        $rol = Rol::findOrFail($id);

        return view('rol.show', compact('rol'));
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
        $rol = Rol::findOrFail($id);

        return view('rol.edit', compact('rol'));
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
        
        $rol = Rol::findOrFail($id);
        $rol->update($requestData);

        Session::flash('flash_message', 'Rol updated!');

        return redirect('rol');
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
        Rol::destroy($id);

        Session::flash('flash_message', 'Rol deleted!');

        return redirect('rol');
    }
}
