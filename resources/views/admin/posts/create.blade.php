@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Crear post</h1>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del post']) !!}

                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control bg-transparent', 'placeholder' => 'Slug del post', 'readonly']) !!}

                @error('slug')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoría') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                @error('category_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                <div class="d-inline-flex">
                    <label class="text-gray label-check d-flex">
                        {!! Form::checkbox('tags[]', $tag->id, null, ['class' => 'checkbox input-check']) !!}
                        <span class="checkbox mr-2"></span>
                        {{$tag->name}}
                    </label>
                </div>
                @endforeach
                <div class="d-flex">
                    @error('tags')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <hr>
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label class="mr-2 text-gray">
                    {!! Form::radio('status', 2, true) !!}
                    Borrador
                </label>

                <label class="mr-2 text-gray">
                    {!! Form::radio('status', 1, false) !!}
                    Publicado
                </label>
                
                <div class="d-flex">
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <hr>
            </div>

            <div class="row my-4">
                <div class="col-sm-6 mb-3">
                    <div class="img-post">
                        <img id="img-post" src="{{asset('img/img-ask.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="custom-file">

                        {!! Form::label('file', 'Selecciona imagen del post', ['class' => 'custom-file-label', 'id' => 'fileLabel']) !!}
                        {!! Form::file('file', ['class' => 'custom-file-input','aria-describedby' => 'file', 'accept' => 'image/*']) !!}
                    </div>

                    @error('file')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                    <div class="mt-3">
                        <h6 class="text-gray">Indicaciones</h6>
                        <ul class="text-gray">
                            <li>Las imagenes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('extract', 'Extracto') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                
                @error('extract')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Cuerpo del post') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                @error('body')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            {!! Form::submit('Crear', ['class' => 'btn btn-primary font-weight-bold']) !!}

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