@extends('adminlte::page')
@section('plugins.Datatables',true)
@section('title', 'Menu Principal')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Menu Principal</h1>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" data-toggle="modal" data-target="#buscarAlumno">Buscar Alumno</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row gutters-sm">
                <div class="col-sm-1 mb-3 d-flex align-items-start justify-content-start">
                    <div style="width: 133px;">
                        <div style="height: 156px;">
                            <img src="https://picsum.photos/200/300" class="img-fluid" alt="" style="width: 133px; height: 156px;" />
                        </div>
                    </div>
                </div>

                <div class="col-sm-11 mb-3 pl-3">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Clave UASLP</label>
                            <div class="input-group">
                                <input type="text" class="form-control" />
                                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Ingeniería</label>
                            <input type="number" class="form-control" name="ingenieria" disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="nombre" disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Carrera</label>
                            <input type="text" class="form-control" name="domiclio" disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Asesor</label>
                            <input class="form-control" type="text" name="asesor" disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Domicilio</label>
                            <input type="text" class="form-control" name="domiclio" disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Colonia</label>
                            <input type="text" class="form-control" name="colonia" disabled />
                        </div>
                        <div class="form-group col-md-1">
                            <label>Código Postal</label>
                            <input type="text" name="cp" class="form-control" disabled />
                        </div>
                        <div class="form-group col-md-3">
                            <label>Ciudad</label>
                            <input type="text" class="form-control" name="Ciudad" disabled />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Teléfono</label>
                            <input type="number" class="form-control" name="telefono" disabled />
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="archivo" class="table table-bordered table-striped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" aria-sort="ascending" aria-label="Rendering engine: active to sort column descending" tabindex="0" rowspan="1" colspan="1">
                                Cre
                            </th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Clv</th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Materia</th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Cal</th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Fecha</th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Ex</th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1">Sem</th>
                            <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                        </tr>
                        <tr>
                            <td>Arem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                            <td>Lorem</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Cre</th>
                            <th rowspan="1" colspan="1">Clv</th>
                            <th rowspan="1" colspan="1">Materia</th>
                            <th rowspan="1" colspan="1">Cal</th>
                            <th rowspan="1" colspan="1">Fecha</th>
                            <th rowspan="1" colspan="1">Ex</th>
                            <th rowspan="1" colspan="1">Sem</th>
                            <th rowspan="1" colspan="1"></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-primary mt-3" type="button" tabindex="0">Generar Archivo</button>
                </div>
            </div>
        </div>
    </div>

    @include('modalAlumnos')

</div>
@stop

@section('footer')
    <div></div>
@stop

@section('css')
<!--
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
-->
@stop

@section('js')
    <script type="text/javascript">
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