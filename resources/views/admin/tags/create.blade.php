@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Crear etiqueta</h1>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}

                @include('admin.tags.partials.form')
                
                {!! Form::submit('Crear', ['class' => 'btn btn-primary font-weight-bold']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="{{asset('/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop