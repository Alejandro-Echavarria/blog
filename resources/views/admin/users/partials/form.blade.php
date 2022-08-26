<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo']) !!}
    
    @error('name')
        <small class="text-danger">{{__($message)}}</small>
    @enderror    
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico']) !!}

    @error('email')
        <small class="text-danger">{{__($message)}}</small>
    @enderror  
</div>

@if (Request::route()->getName() == 'admin.users.create')
    <div class="form-row">
        <div class="form-group col-md-6">

            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
        
            @error('password')
                <small class="text-danger">{{$message}}</small>
            @enderror  
        </div>
        <div class="form-group col-md-6">
            
            {!! Form::label('confirm_password', 'Repite la contraseña') !!}
            {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Repite la contraseña']) !!}
        
            @error('confirm_password')
                <small class="text-danger">{{$message}}</small>
            @enderror  
        </div>
    </div>
@endif

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
            @error('roles')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
