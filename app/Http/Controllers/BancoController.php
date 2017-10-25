<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Banco;
use Illuminate\Http\Request;
use Session;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $banco = Banco::where('razon_social', 'LIKE', "%$keyword%")
				->orWhere('nit', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $banco = Banco::paginate($perPage);
        }

        return view('banco.index', compact('banco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('banco.create');
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
			'razon_social' => 'required',
			'nit' => 'required'
		]);
        $requestData = $request->all();
        
        Banco::create($requestData);

        Session::flash('flash_message', 'Banco added!');

        return redirect('banco');
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
        $banco = Banco::findOrFail($id);

        return view('banco.show', compact('banco'));
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
        $banco = Banco::findOrFail($id);

        return view('banco.edit', compact('banco'));
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
			'razon_social' => 'required',
			'nit' => 'required'
		]);
        $requestData = $request->all();
        
        $banco = Banco::findOrFail($id);
        $banco->update($requestData);

        Session::flash('flash_message', 'Banco updated!');

        return redirect('banco');
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
        Banco::destroy($id);

        Session::flash('flash_message', 'Banco deleted!');

        return redirect('banco');
    }
}
