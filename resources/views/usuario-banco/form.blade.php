<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    {!! Form::label('color', 'Color', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('color', null, ['class' => 'form-control']) !!}
        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('font_family') ? 'has-error' : ''}}">
    {!! Form::label('font_family', 'Font Family', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('font_family', null, ['class' => 'form-control']) !!}
        {!! $errors->first('font_family', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('font_size') ? 'has-error' : ''}}">
    {!! Form::label('font_size', 'Font Size', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('font_size', null, ['class' => 'form-control']) !!}
        {!! $errors->first('font_size', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_usuario') ? 'has-error' : ''}}">
    {!! Form::label('id_usuario', 'Id Usuario', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_usuario', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}">
    {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('id_banco', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_rol') ? 'has-error' : ''}}">
    {!! Form::label('id_rol', 'Id Rol', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('id_rol', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_rol', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
