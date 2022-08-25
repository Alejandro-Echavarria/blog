<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo']) !!}
    
    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror    
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror  
</div>

<div class="form-row">
    <div class="form-group col-md-6">

        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
    
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror  
    </div>
    <div class="form-group col-md-6">
        
        {!! Form::label('password', 'Repite la contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Repite la contraseña']) !!}
    
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror  
    </div>
</div>

<div class="form-group">
    <p class="font-weight-bold">Listado de roles</p>
    <div class="row">
        <div class="col-12">
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach
        </div>
        @error('name')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
