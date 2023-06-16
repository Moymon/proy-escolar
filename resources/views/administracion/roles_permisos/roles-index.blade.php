@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Roles del sistema</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-info" data-toggle="modal" data-target="#nuevoRol" ><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <br>
        <table id="tabla_roles" class="table table-bordered table-striped dataTable dtr-inline">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Origen</th>
                    <th>Lista de Permisos</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($roles as $rol)
                    <tr>
                        <td>{{$rol->id}}</td>
                        <td>{{$rol->name}}</td>
                        <td>{{$rol->guard_name}}</td>
                        <td>
                            @foreach ($rol->permissions as $permission)
                                <div class="badge badge-secondary"><h6>{{$permission->name}}</h6></div>
                            @endforeach
                        </td>
                        <td width="10px">Ver...<a href="/roles-edit/{{$rol->id}}"><i class="fas fa-list"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-----Modal Nuevo Rol------>
<div class="modal fade" id="nuevoRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="/roles-create">
                            @csrf
                            <div class="form-group"> 
                                <div class="d-flex justify-content-around row">
                                    <div class="col-12">
                                        <label class="col-form-label">Nombre</label>
                                        <input class="form-control" type="text" name="nombre_rol">
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
<script>
 $(document).ready(function (){
        $('.table').DataTable({
            language:{
                "emptyTable" : "No hay información",
                "info"       : "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "lengthMenu" : "Mostrar _MENU_ resultados",
                "search"     : "Buscar",
                "zeroRecords": "Resultados no encontrados",
                "paginate":{
                    "first"  :"Primero",
                    "last"   :"Ultimo",
                    "next"   :"Siguiente",
                    "previous":"Anterior"
                }
            },
            "autoWidth":false,
        });
    });    
</script>
@stop