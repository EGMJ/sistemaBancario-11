<div class="form-group {{ $errors->has('Ubicacion') ? 'has-error' : ''}}">
    {!! Form::label('ubicacion', 'Ubicacion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ubicacion', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ubicacion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('x') ? 'has-error' : ''}}">
    {!! Form::label('x', 'X', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('x', null, ['class' => 'form-control', 'required' => 'required','step'=>'any']) !!}
        {!! $errors->first('x', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('y') ? 'has-error' : ''}}">
    {!! Form::label('y', 'Y', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('y', null, ['class' => 'form-control', 'required' => 'required','step'=>'any']) !!}
        {!! $errors->first('y', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_banco') ? 'has-error' : ''}}">
    {!! Form::label('id_banco', 'Id Banco', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_banco', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_banco', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
