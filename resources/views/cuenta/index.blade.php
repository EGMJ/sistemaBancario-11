@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class=""col-lg-11 col-md-11 col-sm-11 col-xs-12"">
                <div class="panel panel-default">
                    <div class="panel-heading">Cuenta</div>
                    <div class="panel-body">
                        <a href="{{ url('/cuenta/create') }}" class="btn btn-success btn-sm" title="Add New Cuentum">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/cuenta', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Cliente</th><th>Saldo</th><th>Moneda</th><th>Tipo</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cuenta as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre}} </td>
                                        <td>{{ $item->saldo }}</td>
                                        <td>{{ $item->moneda }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>
                                            <a href="{{ url('/cuenta/' . $item->id) }}" title="View Cuentum"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/cuenta/' . $item->id . '/edit') }}" title="Edit Cuentum"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/cuenta', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Cuentum',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ url('/cuenta/historico/' . $item->id) }}" title="Historico"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Historico</button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $cuenta->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
