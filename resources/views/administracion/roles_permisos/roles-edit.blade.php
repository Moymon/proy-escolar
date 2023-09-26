@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Permisos para los Roles</h1>
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
                <div class="col-12">
                    <div class="col-3">
                        <label>Rol</label>
                        <input class="form-control" type="text" value="{{$rol->name}}" disabled>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <form method="post" action="/roles/update/{{$rol->id}}">
                        @csrf
                        <label>Selecciona los permisos para el rol</label>
                        <div>
                            @foreach ($permisos as $permiso)
                            @php 
                                $checked = 0;
                            @endphp
                                <div class="col-2">
                                    <label class="form-control">
                                        @if ($rol->permissions->count() > 0)
                                            @foreach ($rol->permissions as $permisosRol)
                                                @if ($permisosRol->name == $permiso->name)
                                                    @php 
                                                        $checked = 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @else
                                             
                                        @endif 
                                        @if ($checked == 1)
                                            <input type="checkbox" name="permisos[]" value="{{$permiso->id}}" checked> {{$permiso->name}}
                                        @else
                                            <input type="checkbox" name="permisos[]" value="{{$permiso->id}}"> {{$permiso->name}}
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop