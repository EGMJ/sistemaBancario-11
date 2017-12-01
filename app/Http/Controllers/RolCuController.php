<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RolCu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RolCuController extends Controller
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
            $rolcu = DB::table('rol_menu as rm')
                ->join('rols as r', 'rm.id_rol', 'r.id')
                ->join('menus as m', 'rm.id_menu', 'm.id')
                ->where('r.nombre', 'LIKE', "%$keyword%")
                ->orWhere('m.nombre', 'LIKE', "%$keyword%")
                ->select('rm.id as id', 'r.nombre as rol', 'm.nombre as menu')
                ->paginate($perPage);

        } else {
            $rolcu = DB::table('rol_menu as rm')
                ->join('rols as r', 'rm.id_rol', 'r.id')
                ->join('menus as m', 'rm.id_menu', 'm.id')
                ->select('rm.id as id', 'r.nombre as rol', 'm.nombre as menu')
                ->paginate($perPage);
        }

        return view('rol-cu.index', compact('rolcu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = DB::table('rols as r')
            ->select('r.id as rid', 'r.nombre as rn')
            ->get();

        $menus = DB::table('menus as m')
            ->select('m.id as mid', 'm.nombre as mn')
            ->get();
        return view('rol-cu.create')->with('roles', $roles)->with('menus', $menus);
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
			'id_rol' => 'required',
			'id_menu' => 'required'
		]);
        $requestData = $request->all();
        
        RolCu::create($requestData);

        Session::flash('flash_message', 'RolCu added!');

        return redirect('rol-cu');
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
        $rolcu = RolCu::findOrFail($id);

        return view('rol-cu.show', compact('rolcu'));
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
        $rolcu = RolCu::findOrFail($id);

        return view('rol-cu.edit', compact('rolcu'));
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
			'id_rol' => 'required',
			'id_menu' => 'required'
		]);
        $requestData = $request->all();
        
        $rolcu = RolCu::findOrFail($id);
        $rolcu->update($requestData);

        Session::flash('flash_message', 'RolCu updated!');

        return redirect('rol-cu');
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
        RolCu::destroy($id);

        Session::flash('flash_message', 'RolCu deleted!');

        return redirect('rol-cu');
    }
}
