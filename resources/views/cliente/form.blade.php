<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    {!! Form::label('tipo', 'Tipo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tipo', ['PERSONA'=>'PERSONA', 'EMPRESA'=>'EMPRESA'],null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div><br><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre (Solo para Persona)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nombre ', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('paterno') ? 'has-error' : ''}}">
    {!! Form::label('paterno', 'Paterno', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('paterno', null, ['class' => 'form-control']) !!}
        {!! $errors->first('paterno', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('materno') ? 'has-error' : ''}}">
    {!! Form::label('materno', 'Materno', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('materno', null, ['class' => 'form-control']) !!}
        {!! $errors->first('materno', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    {!! Form::label('ci', 'Ci', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ci', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : ''}}">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    {!! Form::label('genero', 'Genero', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('genero', ['MASCULINO', 'FEMENINO', 'NO DEFINIDO'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
    {!! Form::label('correo', 'Correo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('correo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('correo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    {!! Form::label('telefono', 'Telefono', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('telefono', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>{{--<div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}">
    {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_banco', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
    </div>--}}
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
