@extends('adminlte::page')

@section('title', 'Smaet')

@section('content_header')
    <h1 class="font-weight-bold text-gray-dark">Lista de posts</h1>
@stop

@section('content')
    @if (session('info'))
        <x-alertas :message="session('info')" :type="'green-color'" />
    @endif
    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/my-style.css')}}">
@stop

{{-- @section('js')
    <script> console.log('Hi!'); </script>
@stop --}}