@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Transaccion #{{ $transaccion->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/transaccion') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($transaccion, [
                            'method' => 'PATCH',
                            'url' => ['/transaccion', $transaccion->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('transaccion.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
