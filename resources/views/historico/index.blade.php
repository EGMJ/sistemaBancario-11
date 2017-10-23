@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Historico</div>
                    <div class="panel-body">
                        <a href="{{ url('/historico/create') }}" class="btn btn-success btn-sm" title="Add New Historico">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/historico', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                       <th>Fecha</th> <th>Tipo</th><th>Monto</th><th>Saldo</th><th>Detalle</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($historico as $item)
                                    <tr>
                                        <td>{{ $item->fecha }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ $item->monto }}</td>
                                        <td>{{ $item->saldo }}</td>
                                        <td>{{ $item->detalle }}</td>
                                        <td>
                                            <a href="{{ url('/historico/' . $item->id) }}" title="View Historico"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $historico->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
