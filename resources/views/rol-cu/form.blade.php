<div class="form-group {{ $errors->has('id_rol') ? 'has-error' : ''}}">
    {!! Form::label('id_rol', 'Seleccione un Rol', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @foreach($roles as $rol)
            @php($opciones[$rol->rid] = $rol->rn)
        @endforeach
        {!! Form::select('id_rol', $opciones, null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_rol', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_casouso') ? 'has-error' : ''}}">
    {!! Form::label('id_menu', 'Seleccione una funcionalidad', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @foreach($menus as $menu)
            @php($opciones[$menu->mid] = $menu->mn)
        @endforeach
        {!! Form::select('id_menu', $opciones, null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('id_menu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
