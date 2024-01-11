@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
    @if(Auth::guest())
        <a href="{{ url('login') }}"></a>
        @else
        <div>
            <input type="text" value="{{ Auth::user()->nombre }}">
        </div>
    @endif

    <x-adminlte-small-box title="Notas" text="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum." icon="fas fa-star"/> 

    <x-adminlte-small-box title="Cargando" text="Cargando información..." icon="fas fa-chart-bar"
    theme="info" url="#" url-text="Más.." loading/>

<x-adminlte-small-box title="424" text="Vistas" icon="fas fa-eye text-dark"
    theme="teal" url="#" url-text="Detalles..."/>

<x-adminlte-small-box title="Descargas" text="1205" icon="fas fa-download text-white"
    theme="purple"/>

<x-adminlte-small-box title="528" text="Usuarios" icon="fas fa-user-plus text-teal"
    theme="primary" url="#" url-text="Ver todos los usuarios..."/>
    


@stop

@section('footer')
    <div></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- jQuery -->

@stop
