@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12"">
                <div class="panel panel-default">
                    <div class="panel-heading">Caja {{ $caja->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/caja') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/caja/' . $caja->id . '/edit') }}" title="Edit Caja"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['caja', $caja->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Caja',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $caja->id }}</td>
                                    </tr>
                                    <tr><th> Tipo </th><td> {{ $caja->tipo }} </td></tr><tr><th> Id Sucursal </th><td> {{ $caja->id_sucursal }} </td></tr><tr><th> Id Banco </th><td> {{ $caja->id_banco }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
