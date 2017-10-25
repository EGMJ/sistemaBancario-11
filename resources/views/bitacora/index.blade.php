@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bitacora</div>
                    <div class="panel-body">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID banco</th>
                                        <th>Detalle</th>
                                        <th>Ejecutor</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $item)
                                    <tr>
                                        <td>{{ $item['id_banco'] }}</td>
                                        <td>{{ $item['detalle']}} </td>
                                        <td>{{ $item['ejecutor'] }}</td>
                                        <td>{{ $item['fecha'] }}</td>
                                        <td>{{ $item['hora'] }}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
