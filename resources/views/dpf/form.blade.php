<div class="form-group {{ $errors->has('monto') ? 'has-error' : ''}}">
    {!! Form::label('monto', 'Monto', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('monto', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('monto', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
    {!! Form::label('fecha_inicio', 'Fecha Inicio', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_final') ? 'has-error' : ''}}">
    {!! Form::label('fecha_final', 'Fecha Final', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha_final', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('fecha_final', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_cliente') ? 'has-error' : ''}}">
    {!! Form::label('id_cliente', 'Id Cliente', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_cliente', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_cliente', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_tipoDpf') ? 'has-error' : ''}}">
    {!! Form::label('id_tipoDpf', 'Id Tipodpf', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_tipoDpf', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_tipoDpf', '<p class="help-block">:message</p>') !!}
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
