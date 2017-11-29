<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoDpf;
use Illuminate\Http\Request;
use Session;

class TipoDpfController extends Controller
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
            $tipodpf = TipoDpf::where('interes', 'LIKE', "%$keyword%")
				->orWhere('tiempo', 'LIKE', "%$keyword%")
				->orWhere('id_dpf', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $tipodpf = TipoDpf::paginate($perPage);
        }

        return view('tipo-dpf.index', compact('tipodpf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-dpf.create');
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
			'interes' => 'required',
			'tiempo' => 'required',
			'id_dpf' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        TipoDpf::create($requestData);

        Session::flash('flash_message', 'TipoDpf added!');

        return redirect('tipo-dpf');
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
        $tipodpf = TipoDpf::findOrFail($id);

        return view('tipo-dpf.show', compact('tipodpf'));
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
        $tipodpf = TipoDpf::findOrFail($id);

        return view('tipo-dpf.edit', compact('tipodpf'));
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
			'interes' => 'required',
			'tiempo' => 'required',
			'id_dpf' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $tipodpf = TipoDpf::findOrFail($id);
        $tipodpf->update($requestData);

        Session::flash('flash_message', 'TipoDpf updated!');

        return redirect('tipo-dpf');
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
        TipoDpf::destroy($id);

        Session::flash('flash_message', 'TipoDpf deleted!');

        return redirect('tipo-dpf');
    }
}
