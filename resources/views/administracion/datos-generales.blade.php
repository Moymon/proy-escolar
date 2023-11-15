@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Credenciales del sistema</h1>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="/administracion-update/{$botton}">
            @csrf

            @if ($boton == 'edit')
                @csrf
                <div class="row">
                    <div class="d-flex justify-content-end col-12">
                        <a href="administracion-edit/{{$boton}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                    </div>
                </div>
                <br>
            @endif

            <div class="row">
                <div class="col-3">
                    <label>Institucion</label>
                    <input class="form-control" type="text" name="institucion" value="{{$datosG->institucion}}" <?= $boton == 'edit' ? "disabled" : "" ?>  />
                </div>
                <div class="col-3">
                    <label>URL del Sitio</label>
                    <input class="form-control" type="text" name="url" value="{{$datosG->url}}" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Version de git</label>
                    <input class="form-control" type="text" name="version_git" value="{{$datosG->version_git}}" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Nombre de git</label>
                    <input class="form-control" type="text" name="nombre_version" value="{{$datosG->nombre_version}}" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <label>Correo</label>
                    <input class="form-control" type="email" name="correo" value="{{$datosG->correo}}" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Telefono</label>
                    <input class="form-control" type="number" name="telefono" value="{{$datosG->telefono}}" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>ext</label>
                    <input class="form-control" type="number"  name="ext" value="{{$datosG->ext}}" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
                <div class="col-3">
                    <label>Clave Maestra</label>
                    <input class="form-control" type="password" name="master" value="soyunacontrasena" <?= $boton == 'edit' ? "disabled" : "" ?>>
                </div>
            </div>
            <br>

                @if ($boton == 'update')
                <div class="row d-flex justify-content-end">
                    <div class="col-12">
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                
            @endif
        </form>
    </div>
</div>
@stop

@section('footer')
    <div></div>
@stop

@section('css')
@stop

@section('js')
@stop