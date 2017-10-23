<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BancoModulo;
use Illuminate\Http\Request;
use Session;

class BancoModuloController extends Controller
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
            $bancomodulo = BancoModulo::where('id_banco', 'LIKE', "%$keyword%")
				->orWhere('id_modulo', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $bancomodulo = BancoModulo::paginate($perPage);
        }

        return view('banco-modulo.index', compact('bancomodulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('banco-modulo.create');
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
        
        $requestData = $request->all();
        
        BancoModulo::create($requestData);

        Session::flash('flash_message', 'BancoModulo added!');

        return redirect('banco-modulo');
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
        $bancomodulo = BancoModulo::findOrFail($id);

        return view('banco-modulo.show', compact('bancomodulo'));
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
        $bancomodulo = BancoModulo::findOrFail($id);

        return view('banco-modulo.edit', compact('bancomodulo'));
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
        
        $requestData = $request->all();
        
        $bancomodulo = BancoModulo::findOrFail($id);
        $bancomodulo->update($requestData);

        Session::flash('flash_message', 'BancoModulo updated!');

        return redirect('banco-modulo');
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
        BancoModulo::destroy($id);

        Session::flash('flash_message', 'BancoModulo deleted!');

        return redirect('banco-modulo');
    }
}
