<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del rol']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror

    <p class="font-weight-bold mt-4">Listado de roles</p>

    <div class="row">
        <div class="col-12">
            @foreach ($permissions as $permission)
            
                <label class="mr-3">
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{$permission->description}}
                </label>
                
            @endforeach
        </div>
    </div>
</div>