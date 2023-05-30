@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Permisos del sistema</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-info" data-toggle="modal" data-target="#nuevoPermiso"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <table id="permisos" class="table table-bordered table-striped dataTable dtr-inline">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Origen</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{$permiso->id}}</td>
                        <td>{{$permiso->name}}</td>
                        <td>{{$permiso->guard_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-----Modal Nuevo permiso------>
<div class="modal fade" id="nuevoPermiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Permiso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/permisos-create">
                            @csrf
                            <div class="form-group"> 
                                <div class="d-flex justify-content-around row">
                                    <div class="col-12">
                                        <label class="col-form-label">Nombre</label>
                                        <input class="form-control" type="text" name="nombre_permiso">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Crear</button>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop