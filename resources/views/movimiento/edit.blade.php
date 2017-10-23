@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">


        <div class=""col-lg-11 col-md-11 col-sm-11 col-xs-12"">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Movimiento #{{ $movimiento->id }}</div>
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

                        {!! Form::model($movimiento, [
                            'method' => 'PATCH',
                            'url' => ['/movimiento', $movimiento->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('movimiento.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
