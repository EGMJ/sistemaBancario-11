@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Historico {{ $historico->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/historico') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/historico/' . $historico->id . '/edit') }}" title="Edit Historico"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['historico', $historico->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Historico',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $historico->id }}</td>
                                    </tr>
                                    <tr><th> Fecha </th><td> {{ $historico->fecha }} </td></tr><tr><th> Id Cuenta </th><td> {{ $historico->id_cuenta }} </td></tr><tr><th> Monto </th><td> {{ $historico->monto }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
