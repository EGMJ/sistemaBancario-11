<div class="form-group {{ $errors->has('id_rol') ? 'has-error' : ''}}">
    {!! Form::label('id_rol', 'Id Rol', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_rol', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_rol', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_casouso') ? 'has-error' : ''}}">
    {!! Form::label('id_casouso', 'Id Casouso', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_casouso', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_casouso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
