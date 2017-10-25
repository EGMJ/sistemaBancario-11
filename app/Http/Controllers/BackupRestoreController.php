<?php

namespace App\Http\Controllers;

use App\Backup;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BackupRestore;
use App\Restore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class BackupRestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *hola chicos Ñv me voy a dormir
     * @return \Illuminate\View\klkjhkhkj sdjfvnspdjfnpsjdfnñksjdn fvklsjdncvlksjdfzvkjlndfvjzdfvzldf
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $backuprestore = BackupRestore::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('ruta', 'LIKE', "%$keyword%")
				->orWhere('fecha', 'LIKE', "%$keyword%")
				->orWhere('id_usuario', 'LIKE', "%$keyword%")
				->orWhere('id_banco', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $backuprestore = BackupRestore::paginate($perPage);
        }

        return view('backup-restore.index', compact('backuprestore'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backup-restore.create');
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
        $nombrebk = $request->nombre;

        $datosBackup = new Backup($nombrebk);
        $datosBackup = $datosBackup->ejecutar();
        $nombre = $datosBackup[1];
        $ruta = $datosBackup[0];

        $backupRestore = new BackupRestore();
        $backupRestore->nombre = $nombre;
        $backupRestore->ruta = $ruta;
        $backupRestore->fecha = date("Y-m-d H:i:s");
        $backupRestore->id_usuario = Auth::user()->id;
        $backupRestore->id_banco = Auth::user()->id_banco;



        $backupRestore->save();



        Session::flash('flash_message', 'BackupRestore added!');

        return redirect('backup-restore');
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
        $backuprestore = DB::table('backup_restores as b')
            ->join('users as u', 'b.id_usuario', 'u.id')
            ->where('b.id', $id)
            ->get();

        $backuprestore = $backuprestore->toArray();
        $backuprestore = $backuprestore[0];

        return view('backup-restore.show', compact('backuprestore'));
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
        $backuprestore = BackupRestore::findOrFail($id);

        return view('backup-restore.edit', compact('backuprestore'));
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


        $backuprestore = BackupRestore::findOrFail($id);

        $nombreDB = env('DB_DATABASE');

        $consulta = DB::select('drop database '.$nombreDB);
        $consulta = DB::select('create database '.$nombreDB);

        $restore = new Restore($backuprestore->ruta, $backuprestore->nombre);
        $restore->ejecutar();

        Session::flash('flash_message', 'BackupRestore updated!');

        return redirect('backup-restore');
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
        $backup = BackupRestore::findOrFail($id);
        $ruta = join(DIRECTORY_SEPARATOR, [public_path(''), $backup->ruta, $backup->nombre]);
        return response()->download($ruta);
    }
}
