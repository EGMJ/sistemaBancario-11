@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12"">
                <div class="panel panel-default">
                    <div class="panel-heading">Caja</div>
                    <div class="panel-body">
                        <a href="{{ url('/caja/create') }}" class="btn btn-success btn-sm" title="Add New Caja">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/caja', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Tipo</th><th>Total</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($caja as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tipo }}</td><td>{{ $item->total }}</td>
                                        <td>
                                            <a href="{{ url('/caja/' . $item->id) }}" title="View Caja"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/caja/' . $item->id . '/edit') }}" title="Edit Caja"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/caja', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Caja',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ url('/movimiento/caja/' . $item->id) }}" title="Registrar Movimiento"><button class="btn btn-info btn-xs"><i class="fa fa-dollar" aria-hidden="true"></i> Movimiento</button></a>
                                            <a href="{{ url('/transaccion/create/') }}" title="Ver Historico"><button class="btn btn-alert btn-xs"><i class="fa fa-money" aria-hidden="true"></i> Transacciones</button></a>
                                            <a href="{{ url('/caja/detalle/' . $item->id) }}" title="Ver Historico"><button class="btn btn-info btn-xs"><i class="fa fa-clone" aria-hidden="true"></i> Ver Historico</button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $caja->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
