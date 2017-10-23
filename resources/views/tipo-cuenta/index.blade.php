@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class=""col-lg-11 col-md-11 col-sm-11 col-xs-12"">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipocuenta</div>
                    <div class="panel-body">
                        <a href="{{ url('/tipo-cuenta/create') }}" class="btn btn-success btn-sm" title="Add New TipoCuentum">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/tipo-cuenta', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>ID</th><th>Nombre</th><th>Interes</th><th>Id Banco</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tipocuenta as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->interes }}</td><td>{{ $item->id_banco }}</td>
                                        <td>
                                            <a href="{{ url('/tipo-cuenta/' . $item->id) }}" title="View TipoCuentum"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/tipo-cuenta/' . $item->id . '/edit') }}" title="Edit TipoCuentum"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/tipo-cuenta', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete TipoCuentum',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $tipocuenta->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
