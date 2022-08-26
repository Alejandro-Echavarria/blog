@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Crear post</h1>
@stop

@section('content')
    @if (session('info'))
        <x-alertas :message="session('info')" :type="'green-color'" />
    @endif
    <div class="card shadow-none personal-border">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Crear', ['class' => 'btn blue-color font-weight-bold']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/my-style.css')}}">
@stop

@section('js')
    <script src="{{asset('/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="{{asset('/vendor/ckeditor-clasic/build/ckeditor.js')}}"></script>
    <script src="{{asset('/js/functions-post.js')}}"></script>
@stop