<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use Illuminate\Http\Request;
use Session;

class UsuarioController extends Controller
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
            $usuario = Usuario::where('ci', 'LIKE', "%$keyword%")
				->orWhere('nombre', 'LIKE', "%$keyword%")
				->orWhere('paterno', 'LIKE', "%$keyword%")
				->orWhere('materno', 'LIKE', "%$keyword%")
				->orWhere('genero', 'LIKE', "%$keyword%")
				->orWhere('nick', 'LIKE', "%$keyword%")
				->orWhere('correo', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $usuario = Usuario::paginate($perPage);
        }

        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('usuario.create');
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
			'ci' => 'required',
			'nombre' => 'required',
			'paterno' => 'required',
			'materno' => 'required',
			'genero' => 'required',
			'nick' => 'required',
			'correo' => 'required',
			'password' => 'required'
		]);
        $requestData = $request->all();
        
        Usuario::create($requestData);

        Session::flash('flash_message', 'Usuario added!');

        return redirect('usuario');
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
        $usuario = Usuario::findOrFail($id);

        return view('usuario.show', compact('usuario'));
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
        $usuario = Usuario::findOrFail($id);

        return view('usuario.edit', compact('usuario'));
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
			'ci' => 'required',
			'nombre' => 'required',
			'paterno' => 'required',
			'materno' => 'required',
			'genero' => 'required',
			'nick' => 'required',
			'correo' => 'required',
			'password' => 'required'
		]);
        $requestData = $request->all();
        
        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);

        Session::flash('flash_message', 'Usuario updated!');

        return redirect('usuario');
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
        Usuario::destroy($id);

        Session::flash('flash_message', 'Usuario deleted!');

        return redirect('usuario');
    }
}
