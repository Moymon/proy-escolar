@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Configuracion de usuarios del sistema</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <label>Nombre</label>
                    <input class="form-control" type="text" value="{{$usuario->nombre}}" disabled>
                </div>
                <div class="col-6">
                    <label>RPE</label>
                    <input class="form-control" type="numer"  value="{{$usuario->rpe}}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <br>
                    {!! Form::model($usuario, ['route' => ['catalogo.usuarios.update',$usuario], 'method' => 'put']) !!}

                        @foreach ($roles as $rol)
                            <label>
                                {!! Form::checkbox('roles[]',$rol->id,null,null) !!}
                                {{ $rol->name }}
                            </label>
                        @endforeach

                        {!! Form::submit('Actualizar',['class' => 'btn btn-primary mt-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop