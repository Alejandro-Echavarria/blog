@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Editar post</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body">
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'files' => true, 'method' => 'put']) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Actualizar', ['class' => 'btn blue-color font-weight-bold']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/my-style.css')}}">
@stop

@section('js')
    <script src="{{asset('/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="{{asset('/vendor/ckeditor-clasic/ckeditor-clasic.js')}}"></script>
    <script src="{{asset('/js/functions-post.js')}}"></script>
@stop