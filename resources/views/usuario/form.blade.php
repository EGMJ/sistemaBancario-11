<div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    {!! Form::label('ci', 'Ci', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ci', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('paterno') ? 'has-error' : ''}}">
    {!! Form::label('paterno', 'Paterno', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('paterno', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('paterno', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('materno') ? 'has-error' : ''}}">
    {!! Form::label('materno', 'Materno', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('materno', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('materno', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    {!! Form::label('genero', 'Genero', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('genero', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nick') ? 'has-error' : ''}}">
    {!! Form::label('nick', 'Nick', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nick', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('nick', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
    {!! Form::label('correo', 'Correo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('correo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('correo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
