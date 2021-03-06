<div class="form-group {{ $errors->has('cod') ? 'has-error' : ''}}">
    {!! Form::label('cod', 'Cod', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cod', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cod', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    {!! Form::label('descripcion', 'Descripcion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('descripcion', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
