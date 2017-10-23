@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Usuario #{{ $usuario->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/usuario') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($usuario, [
                            'method' => 'PATCH',
                            'url' => ['/usuario', $usuario->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('usuario.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
