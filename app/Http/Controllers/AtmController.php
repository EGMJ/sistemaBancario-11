<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Atm;
use Illuminate\Http\Request;
use Session;

class AtmController extends Controller
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
            $atm = Atm::where('ubicacion', 'LIKE', "%$keyword%")
				->orWhere('x', 'LIKE', "%$keyword%")
				->orWhere('y', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $atm = Atm::paginate($perPage);
        }

        return view('atm.index', compact('atm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('atm.create');
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
			'ubicacion' => 'required',
			'x' => 'required',
			'y' => 'required'
		]);
        $requestData = $request->all();
        
        Atm::create($requestData);

        Session::flash('flash_message', 'Atm added!');

        return redirect('atm');
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
        $atm = Atm::findOrFail($id);

        return view('atm.show', compact('atm'));
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
        $atm = Atm::findOrFail($id);

        return view('atm.edit', compact('atm'));
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
			'ubicacion' => 'required',
			'x' => 'required',
			'y' => 'required'
		]);
        $requestData = $request->all();
        
        $atm = Atm::findOrFail($id);
        $atm->update($requestData);

        Session::flash('flash_message', 'Atm updated!');

        return redirect('atm');
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
        Atm::destroy($id);

        Session::flash('flash_message', 'Atm deleted!');

        return redirect('atm');
    }
}
