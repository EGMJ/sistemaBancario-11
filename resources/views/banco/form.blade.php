<div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
    {!! Form::label('razon_social', 'Razon Social', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('razon_social', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('razon_social', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
    {!! Form::label('nit', 'Nit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('nit', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
