@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Lista de categorías</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-header color-primario">
            <div class="d-flex flex-row justify-content-around align-items-center">
                <div class="flex-grow-1 mr-1">
                    <input type="text" class="form-control text-gray" placeholder="Buscar..." id="txtBuscar" name="txtBuscar">
                </div>
                <div class="form-inline">
                    <select class="form-control custom-select mx-1 text-gray" id="selectEntries">
                        <option value="10" class="text-gray">10</option>
                        <option value="25" class="text-gray">25</option>
                        <option value="50" class="text-gray">50</option>
                        <option value="100" class="text-gray">100</option>
                    </select>
                </div>
                <div>
                    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> <span class="hidden-letters"> Agregar</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table style="width: 100%;" class="table table-hover table-sm table-borderless">
                <thead>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 70%">Name</th>
                        <th style="width: 20%">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="px-2">
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-sm btn-success mr-1" href="{{route('admin.categories.edit', $category)}}"><i class="fas fa-pen"></i></a>
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="m-3 border-top text-sm">
            <div class="float-left mt-2">
                <p class="text-muted" id="numbers_numbers"></p>
            </div>
            <div class="float-right mt-2">
                <p class="text-muted" id="pagination_pagination"></p>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/my-style.css')}}">
@stop