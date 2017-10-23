<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
    {!! Form::label('valor', 'Valor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('valor', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_moneda') ? 'has-error' : ''}}">
    {!! Form::label('id_moneda', 'Id Moneda', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_moneda', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_moneda', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
