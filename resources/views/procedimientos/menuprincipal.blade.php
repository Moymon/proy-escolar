@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Menu Principal')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Menu Principal</h1>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end">
                <button class="btn btn-block bg-gradient-primary form-control col-3" data-toggle="modal" data-target="#buscarAlumno" name=""> Buscar Alumno </button>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
            <img src="https://picsum.photos/200/300" class="img-fluid" alt="">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Clave UASLP</label>
                        <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                    </div>
                    <div class="form-group">
                        <label>Ingeniería</label>
                        <input type="number" class="form-control" name="ingenieria">
                    </div>                        
                </div>
                <div class="col-md-6">  
                    <button class="btn bg-gradient-secondary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" name="nombre" disabled>
            </div>
            <div class="form-group">
                <label>Asesor</label>
                <input class="form-control" type="text" name="asesor" disabled>
            </div>
            <div class="form-group">
                <label>Carrera</label>
                <input class="form-control" type="text" name="nombre" disabled>
            </div>
        </div>
     </div>

     <div class="row">
         <div class="col-md-6">
            <div class="form-group">
                <label>Domicilio</label>
                <input type="text" class="form-control" name="domiclio" disabled>
            </div>
            <div class="form-group">
                <label>Colonia</label>
                <input type="text" class="form-control" name="colonia" disabled>
            </div>
            <div class="form-group">
                <label>Código Postal</label>
                <input type="text" name="cp" class="form-control" disabled>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
                <label>Teléfono</label>
                <input type="number" class="form-control" name="telefono" disabled>
            </div>
            <div class="form-group">
                <label>Ciudad</label>
                <input type="text" class="form-control" name="Ciudad" disabled>
            </div>
         </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table id="archivo" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" aria-sort="ascending" aria-label="Rendering engine: active to sort column descending" tabindex="0" rowspan="1" colspan="1" >
                            Cre
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Clv
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Materia
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Cal
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Fecha
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Ex
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >Sem
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" rowspan="1" colspan="1" >
                        </th>
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
                <button class="btn btn-outline-primary" type="button" tabindex="0">Generar Archivo</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!--
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
-->
@stop

@section('js')
    
    <script> console.log('Hi!'); </script>
    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.responsive.min.js"></script>

    <script>
    $(function () {
    $("#archivo").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }) });
    </script>


@stop