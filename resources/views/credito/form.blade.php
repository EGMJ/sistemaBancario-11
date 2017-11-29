<div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    {!! Form::label('monto', 'Monto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('monto', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('plaso') ? 'has-error' : ''}}">
    {!! Form::label('plaso', 'Plaso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('plaso', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('plaso', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('interes') ? 'has-error' : ''}}">
    {!! Form::label('interes', 'Interes', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('interes', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('interes', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('monto_pagado') ? 'has-error' : ''}}">
    {!! Form::label('monto_pagado', 'Monto Pagado', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('monto_pagado', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('monto_pagado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('saldo') ? 'has-error' : ''}}">
    {!! Form::label('saldo', 'Saldo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('saldo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('saldo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_cuenta') ? 'has-error' : ''}}">
    {!! Form::label('id_cuenta', 'Id Cuenta', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cuenta', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_cuenta', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}">
    {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_banco', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
