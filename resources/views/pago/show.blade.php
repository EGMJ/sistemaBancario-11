@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">

        <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Pago {{ $pago->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/pago') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/pago/' . $pago->id . '/edit') }}" title="Edit Pago"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['pago', $pago->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Pago',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pago->id }}</td>
                                    </tr>
                                    <tr><th> Monto </th><td> {{ $pago->monto }} </td></tr><tr><th> Saldo </th><td> {{ $pago->saldo }} </td></tr><tr><th> FechaPago </th><td> {{ $pago->fechaPago }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
