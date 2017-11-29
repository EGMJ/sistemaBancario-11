<div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
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
</div><div class="form-group {{ $errors->has('fechaPago') ? 'has-error' : ''}}">
    {!! Form::label('fechaPago', 'Fechapago', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fechaPago', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fechaPago', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('retraso') ? 'has-error' : ''}}">
    {!! Form::label('retraso', 'Retraso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('retraso', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('retraso', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_credito') ? 'has-error' : ''}}">
    {!! Form::label('id_credito', 'Id Credito', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_credito', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_credito', '<p class="help-block">:message</p>') !!}
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
