<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CasoUso;
use App\Menu;
use Illuminate\Http\Request;
use Session;

class CasoUsoController extends Controller
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
            $casouso = CasoUso::where('cod', 'LIKE', "%$keyword%")
				->orWhere('nombre', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->orWhere('id_menu', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $casouso = CasoUso::paginate($perPage);
        }

        return view('caso-uso.index', compact('casouso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $menus= Menu::all()->pluck('nombre','id');
        return view('caso-uso.create',compact('menus'));
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
        
        CasoUso::create($requestData);

        Session::flash('flash_message', 'CasoUso added!');

        return redirect('caso-uso');
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
        $casouso = CasoUso::findOrFail($id);

        return view('caso-uso.show', compact('casouso'));
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
        $menus= Menu::all()->get()->pluck('nombre','id');
        $casouso = CasoUso::findOrFail($id);

        return view('caso-uso.edit', compact('casouso','menus'));
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
        
        $casouso = CasoUso::findOrFail($id);
        $casouso->update($requestData);

        Session::flash('flash_message', 'CasoUso updated!');

        return redirect('caso-uso');
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
        CasoUso::destroy($id);

        Session::flash('flash_message', 'CasoUso deleted!');

        return redirect('caso-uso');
    }
}
