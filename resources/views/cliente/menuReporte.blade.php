@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu de Reporte Cliente</div>
                    <div class="panel-body">
                        <a href="{{ url('/cliente') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/excel/') }}" title="Back"><button class="btn btn-blue btn-xs"><i class="fa-file-excel-o" aria-hidden="true"></i> Excel</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="panel-body">
                            {!! Form::open(['route' => 'cliente1','method' => 'POST']) !!}
                            <table class="table table-borderless">
                                <tr>
                                    <th>{!! Form::checkbox('nombre', true, true) !!} Nombre</th>
                                    <th>{!! Form::checkbox('paterno', true, true) !!} Paterno</th>
                                    <th>{!! Form::checkbox('materno', true, true) !!} Materno</th>
                                    <th>{!! Form::checkbox('ci', true, true) !!} CI</th>
                                    <th>{!! Form::checkbox('fecha_nacimiento', true, true) !!} Fecha de Nacimiento</th>
                                    <th>{!! Form::checkbox('genero', true, true) !!} Genero</th>
                                    <th>{!! Form::checkbox('telefono',true, true) !!} Telefono</th>
                                    <th>{!! Form::checkbox('correo', true, true) !!} Correo</th>
                                    <th>{!! Form::checkbox('banco', true, true) !!} Banco</th>

                                </tr>

                            </table>

                        </div><div class="form-group ">
                            {!! Form::label('Banco', 'Banco', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('selecBanco',$bancos, null, ['class' => 'form-control','placeholder'=>'TODOS...']) !!}

                            </div>
                        </div><div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
                            {!! Form::label('genero', 'Genero', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('selectGenero', ['MASCULINO', 'FEMENINO', 'NO DEFINIDO','TODOS...'], 3, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('selectGenero', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group" align="center">
                                {!! Form::submit('Visualzar' , ['class'=>'btn btn-primary btn-lg btn-block']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
