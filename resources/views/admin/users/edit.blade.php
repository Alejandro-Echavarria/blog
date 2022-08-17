@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Asignar un rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body">
            <p class="font-weight-bold">Nombre:</p>
            <p class="form-control mb-4">{{$user->name}}</p>

            <p class="font-weight-bold">Listado de roles</p>
            {!! Form::model($user, [ 'route' => ['admin.users.update', $user], 'method' => 'put' ]) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Actualizar', ['class' => 'btn blue-color mt-4 font-weight-bold']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/my-style.css')}}">
@stop