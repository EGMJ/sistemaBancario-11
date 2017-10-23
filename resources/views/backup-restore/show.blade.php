@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">BackupRestore {{ $backuprestore->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/backup-restore') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/backup-restore/' . $backuprestore->id . '/edit') }}" title="Edit BackupRestore"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['backuprestore', $backuprestore->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete BackupRestore',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $backuprestore->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $backuprestore->nombre }} </td></tr>
                                    <tr><th> Ruta </th><td> {{ $backuprestore->ruta }} </td></tr>
                                    <tr><th> Fecha </th><td> {{ $backuprestore->fecha }} </td></tr>
                                    <tr><th> Creado por </th><td> {{ $backuprestore->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
