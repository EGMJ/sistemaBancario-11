<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UsuarioBanco;
use Illuminate\Http\Request;
use Session;

class UsuarioBancoController extends Controller
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
            $usuariobanco = UsuarioBanco::where('color', 'LIKE', "%$keyword%")
				->orWhere('font_family', 'LIKE', "%$keyword%")
				->orWhere('font_size', 'LIKE', "%$keyword%")
				->orWhere('id_usuario', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->orWhere('id_rol', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $usuariobanco = UsuarioBanco::paginate($perPage);
        }

        return view('usuario-banco.index', compact('usuariobanco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('usuario-banco.create');
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
			'descripcion' => 'required',
			'id_menu' => 'required'
		]);
        $requestData = $request->all();
        
        UsuarioBanco::create($requestData);

        Session::flash('flash_message', 'UsuarioBanco added!');

        return redirect('usuario-banco');
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
        $usuariobanco = UsuarioBanco::findOrFail($id);

        return view('usuario-banco.show', compact('usuariobanco'));
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
        $usuariobanco = UsuarioBanco::findOrFail($id);

        return view('usuario-banco.edit', compact('usuariobanco'));
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
			'descripcion' => 'required',
			'id_menu' => 'required'
		]);
        $requestData = $request->all();
        
        $usuariobanco = UsuarioBanco::findOrFail($id);
        $usuariobanco->update($requestData);

        Session::flash('flash_message', 'UsuarioBanco updated!');

        return redirect('usuario-banco');
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
        UsuarioBanco::destroy($id);

        Session::flash('flash_message', 'UsuarioBanco deleted!');

        return redirect('usuario-banco');
    }
}
