@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Editar usuario</h1>
@stop

@section('content')
    @if (session('info'))
        <x-alertas :message="session('info')" :type="'green-color'" />
    @endif
    <div class="card shadow-none personal-border">
        <div class="card-body">

            {!! Form::model($user, [ 'route' => ['admin.users.update', $user], 'method' => 'put' ]) !!}

                @include('admin.users.partials.form')

                {!! Form::submit('Actualizar', ['class' => 'btn blue-color mt-4 font-weight-bold']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/my-style.css')}}">
@stop