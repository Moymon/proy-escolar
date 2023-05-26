@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Catalogo de usuarios del sistema</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    @livewire('administracionuserindex')
@stop

@section('css')
@stop

@section('js')
@stop