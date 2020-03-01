<div class="form-group">
    {!! Form::label('name', 'Nombre de Rol') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Url Amigable') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<h3>Permiso Especial</h3>
<div class="form-group">
    <label for="">{!! Form::radio('special', 'all-access') !!} Acceso Total</label>
    <label for="">{!! Form::radio('special', 'no-access') !!} Ningún Acceso</label>
</div>

<h3>Roles</h3>

<div class="form-group">
<ul>
    @foreach ($permissions as $permission)
        <li>
            <label>
                {!! Form::checkbox('permissions[]',$permission->id,null) !!}
                {{$permission->name}}
                <em>({{$permission->description ?: 'N/A'}})</em>
            </label>
        </li>
    @endforeach
</ul>
</div>

<div class="form-group">
    {!! Form::submit('Guardar',  ['class' => 'btn btn-sm btn-primary']) !!}
</div>
