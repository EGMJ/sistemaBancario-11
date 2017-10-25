<div class="form-group {{ $errors->has('id_cliente') ? 'has-error' : ''}}">
    {!! Form::label('id_cliente', 'Id Cliente', ['class' => 'col-md-4 control-label']) !!}


    <!-------------------------------------------------------------------------------------------------------------------------------------->

    <div class="col-md-6">
        {!! Form::select('id_cliente',$cliente, null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'selecione un cliente']) !!}
        {!! $errors->first('id_cliente', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('saldo') ? 'has-error' : ''}}">
    {!! Form::label('saldo', 'Saldo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('saldo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('saldo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('moneda') ? 'has-error' : ''}}">
    {!! Form::label('moneda', 'Moneda', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('moneda', ['Bs'=>'Bs', 'USD'=>'USD', 'Euro'=>'Euro'], null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('moneda', '<p class="help-block">:message</p>') !!}
    </div>

</div>  <div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}">
    {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_banco', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_tipo') ? 'has-error' : ''}}">
    {!! Form::label('id_tipo', 'Id Tipo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_tipo',$tipocuenta, null, ['class' => 'form-control','required'=>'required','placeholder'=>'selecione un tipo de cuenta']) !!}
        {!! $errors->first('id_tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
