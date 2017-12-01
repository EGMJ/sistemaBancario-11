@extends('layouts.admin')

@section('contenido')
    @include('alerts.request')
    @include('alerts.success')
    @include('alerts.existfail')
<div class="container">
    <div class="row">


        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Movimiento</div>
                    <div class="panel-body">
                        <a href="{{ url('/movimiento') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/movimiento', 'class' => 'form-horizontal', 'files' => true]) !!}

                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}" readonly="readonly">
                            {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::datetime('fecha', Carbon\Carbon::now()->format('Y-m-d H:i:s'), ['class' => 'form-control', 'required' => 'required','readonly'=>'readonly']) !!}
                                {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('id_caja') ? 'has-error' : ''}}" hidden="hidden">
                            {!! Form::label('id_caja', 'Id Caja', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('id_caja', $id_caja, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('id_caja', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
                            {!! Form::label('monto', 'Monto', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('monto', null, ['class' => 'form-control', 'required' => 'required','step'=>'any']) !!}
                                {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
                            {!! Form::label('tipo', 'Tipo', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('tipo', ['DEPOSITO'=>'DEPOSITO', 'RETIRO'=>'RETIRO'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
                            </div>

                        </div> <div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}" hidden="hidden">
                            {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('id_banco', \Illuminate\Support\Facades\Auth::user()->id_banco, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('id_cuenta') ? 'has-error' : ''}}">
                            {!! Form::label('id_cuenta', 'Numero de Cuenta', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('id_cuenta', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                {!! $errors->first('id_cuenta', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>


                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
