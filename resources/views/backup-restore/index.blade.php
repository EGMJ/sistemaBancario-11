@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Backuprestore</div>
                    <div class="panel-body">
                        <a href="{{ url('/backup-restore/create') }}" class="btn btn-success btn-sm" title="Add New BackupRestore">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/backup-restore', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Nombre</th><th>Fecha</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($backuprestore as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        <td>
                                            <a href="{{ url('/backup-restore/' . $item->id) }}" title="View BackupRestore"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> detalle</button></a>
                                            <a href="{{ url('/backup-restore/' . $item->id . '/edit') }}" title="Edit BackupRestore"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Restaurar</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/backup-restore', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-download" aria-hidden="true"></i> Descargar', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-default btn-xs',
                                                        'title' => 'Descargar Backup'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $backuprestore->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
