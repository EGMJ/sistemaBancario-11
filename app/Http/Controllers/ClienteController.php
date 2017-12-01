<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class ClienteController extends Controller
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
            $cliente = Cliente::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('paterno', 'LIKE', "%$keyword%")
				->orWhere('materno', 'LIKE', "%$keyword%")
				->orWhere('ci', 'LIKE', "%$keyword%")
				->orWhere('fecha_nacimiento', 'LIKE', "%$keyword%")
				->orWhere('genero', 'LIKE', "%$keyword%")
				->orWhere('correo', 'LIKE', "%$keyword%")
				->orWhere('telefono', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $cliente = Cliente::paginate($perPage);
        }

        return view('cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cliente.create');
    }
    public function reporteCreate()
    {
        $bancos = Banco::all()->pluck('razon_social','id');
        return view('cliente.menuReporte',compact('bancos'));
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
            'tipo' => 'required',
            'nombre' => 'required',
			'ci' => 'required',
			'fecha_nacimiento' => 'required',
			'genero' => 'required',
			'correo' => 'required',
			'telefono' => 'required'
		]);


        Cliente::create([
            'tipo' => $request['tipo'],
            'nombre' => $request['nombre'],
            'paterno' => $request['paterno'],
            'materno' => $request['materno'],
            'ci' => $request['ci'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'genero' => $request['genero'],
            'correo' => $request['correo'],
            'telefono' => $request['telefono'],
            'id_banco' => Auth::user()->id_banco
        ]);

        Session::flash('flash_message', 'Cliente adicionado!');

        BitacoraController::guardar('Cliente->Cliente guardado', Auth::user()->name, Auth::user()->id_banco);

        return redirect('cliente');
    }
    public function reporteStore(Request $request){


        //return$request->all();
        $clientes='sjdhfkajshvkjs';
        if ($request->selecBanco==null and $request->selectGenero==3){
            $clientes=Cliente::join('bancos as b','b.id','id_banco')->get();
        }elseif ($request->selecBanco!=null and $request->selectGenero==3){
            $clientes=Cliente::join('bancos as b','b.id','id_banco')->where('id_banco',$request->selecBanco)->get();
        }elseif ($request->selecBanco==null and $request->selectGenero!=3){
            $clientes=Cliente::join('bancos as b','b.id','id_banco')->where('genero',$request->selectGenero)->get();
        }
        elseif ($request->selecBanco!=null and $request->selectGenero!=3){
            $clientes=Cliente::join('bancos as b','b.id','id_banco')->where('id_banco',$request->selecBanco)->where('genero',$request->selectGenero)->get();
        }
        $tipo=$request->tipo;
        $nombre=$request->nombre;
        $paterno=$request->paterno;
        $materno=$request->materno;
        $ci=$request->ci;
        $fecha_nacimiento=$request->fecha_nacimiento;
        $genero=$request->genero;
        $telefono=$request->telefono;
        $correo=$request->correo;
        $banco=$request->banco;
        $pdf = \PDF::loadview('cliente.pdfCliente',compact('clientes','nombre','paterno','materno','ci','fecha_nacimiento','genero','telefono','correo','banco'));
        return $pdf->stream('cliente '.Carbon::now().'.pdf');

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
        $cliente = Cliente::findOrFail($id);

        return view('cliente.show', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);

        return view('cliente.edit', compact('cliente'));
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
			'nombre' => 'required',
			'ci' => 'required',
			'fecha_nacimiento' => 'required',
			'correo' => 'required',
			'telefono' => 'required',

		]);
        $requestData = $request->all();
        
        $cliente = Cliente::findOrFail($id);
        $cliente->update($requestData);

        Session::flash('flash_message', 'Cliente updated!');

        return redirect('cliente');
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
        Cliente::destroy($id);

        Session::flash('flash_message', 'Cliente deleted!');

        return redirect('cliente');
    }
}
