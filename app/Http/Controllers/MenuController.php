<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;
use Session;

class MenuController extends Controller
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
            $menu = Menu::where('cod', 'LIKE', "%$keyword%")
				->orWhere('nombre', 'LIKE', "%$keyword%")
				->orWhere('descripcion', 'LIKE', "%$keyword%")
				->orWhere('id_modulo', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $menu = Menu::paginate($perPage);
        }

        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('menu.create');
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
			'id_modulo' => 'required'
		]);
        $requestData = $request->all();
        
        Menu::create($requestData);

        Session::flash('flash_message', 'Menu added!');

        return redirect('menu');
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
        $menu = Menu::findOrFail($id);

        return view('menu.show', compact('menu'));
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
        $menu = Menu::findOrFail($id);

        return view('menu.edit', compact('menu'));
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
			'id_modulo' => 'required'
		]);
        $requestData = $request->all();
        
        $menu = Menu::findOrFail($id);
        $menu->update($requestData);

        Session::flash('flash_message', 'Menu updated!');

        return redirect('menu');
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
        Menu::destroy($id);

        Session::flash('flash_message', 'Menu deleted!');

        return redirect('menu');
    }
}
