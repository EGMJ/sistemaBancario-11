<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::input('datetime-local', 'fecha', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_cuenta') ? 'has-error' : ''}}">
    {!! Form::label('id_cuenta', 'Id Cuenta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cuenta', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_cuenta', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    {!! Form::label('monto', 'Monto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('monto', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('saldo') ? 'has-error' : ''}}">
    {!! Form::label('saldo', 'Saldo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('saldo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('saldo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
    {!! Form::label('detalle', 'Detalle', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('detalle', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('detalle', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
