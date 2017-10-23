@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class=""col-lg-11 col-md-11 col-sm-11 col-xs-12"">
                <div class="panel panel-default">
                    <div class="panel-heading">Movimiento {{ $movimiento->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/movimiento') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/movimiento/' . $movimiento->id . '/edit') }}" title="Edit Movimiento"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['movimiento', $movimiento->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Movimiento',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $movimiento->id }}</td>
                                    </tr>
                                    <tr><th> Fecha </th><td> {{ $movimiento->fecha }} </td></tr><tr><th> Id Caja </th><td> {{ $movimiento->id_caja }} </td></tr><tr><th> Monto </th><td> {{ $movimiento->monto }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
