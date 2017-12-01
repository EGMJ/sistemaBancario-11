<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}" readonly="readonly">
    {!! Form::label('fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::datetime('fecha', Carbon\Carbon::now()->format('Y-m-d H:i:s'), ['class' => 'form-control', 'required' => 'required','readonly'=>'readonly']) !!}
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    {!! Form::label('monto', 'Monto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('monto', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}">
    {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_banco', $bancos,null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_cuenta') ? 'has-error' : ''}}">
    {!! Form::label('id_cuenta', 'Nro. Cuenta Origen', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cuenta', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_cuenta', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_cuenta_destino') ? 'has-error' : ''}}">
    {!! Form::label('id_cuenta_destino', 'Nro. Cuenta Destino', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cuenta_destino', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_cuenta_destino', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
