<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dpf;
use Illuminate\Http\Request;
use Session;

class DpfController extends Controller
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
            $dpf = Dpf::where('monto', 'LIKE', "%$keyword%")
				->orWhere('fecha_inicio', 'LIKE', "%$keyword%")
				->orWhere('fecha_final', 'LIKE', "%$keyword%")
				->orWhere('id_cliente', 'LIKE', "%$keyword%")
				->orWhere('id_tipoDpf', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $dpf = Dpf::paginate($perPage);
        }

        return view('dpf.index', compact('dpf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dpf.create');
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
			'monto' => 'required',
			'fecha_inicio' => 'required',
			'fecha_final' => 'required',
			'fecha_final' => 'required',
			'id_cliente' => 'required',
			'id_tipoDpf' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        Dpf::create($requestData);

        Session::flash('flash_message', 'Dpf added!');

        return redirect('dpf');
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
        $dpf = Dpf::findOrFail($id);

        return view('dpf.show', compact('dpf'));
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
        $dpf = Dpf::findOrFail($id);

        return view('dpf.edit', compact('dpf'));
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
			'monto' => 'required',
			'fecha_inicio' => 'required',
			'fecha_final' => 'required',
			'fecha_final' => 'required',
			'id_cliente' => 'required',
			'id_tipoDpf' => 'required',
			'id_banco' => 'required'
		]);
        $requestData = $request->all();
        
        $dpf = Dpf::findOrFail($id);
        $dpf->update($requestData);

        Session::flash('flash_message', 'Dpf updated!');

        return redirect('dpf');
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
        Dpf::destroy($id);

        Session::flash('flash_message', 'Dpf deleted!');

        return redirect('dpf');
    }
}
