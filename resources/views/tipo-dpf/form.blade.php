<div class="form-group {{ $errors->has('interes') ? 'has-error' : ''}}">
    {!! Form::label('interes', 'Interes', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('interes', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('interes', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tiempo') ? 'has-error' : ''}}">
    {!! Form::label('tiempo', 'Tiempo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('tiempo', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('tiempo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_dpf') ? 'has-error' : ''}}">
    {!! Form::label('id_dpf', 'Id Dpf', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_dpf', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_dpf', '<p class="help-block">:message</p>') !!}
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
