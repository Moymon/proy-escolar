@extends('adminlte::page')
@section('title', 'Panel de Administracion')

@section('content_header')
    <h1>Panel de Administracion</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Hola mundo</h1>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>


<form action="/insertAlumno" method="POST">
    @csrf 
        <div  class="card text-center">
                <input type="text" name="id_alumno">
        </div>
        <div class="card-footer">
                <button class="btn btn-outline-primary" type="submit">Guardar</button>
        </div>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

