@extends('layouts.admin')

@section('contenido')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit BackupRestore #{{ $backuprestore->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/backup-restore') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($backuprestore, [
                            'method' => 'PATCH',
                            'url' => ['/backup-restore', $backuprestore->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                            {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
                                {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Restaurar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
