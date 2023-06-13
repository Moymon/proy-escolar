@extends('adminlte::page')

@section('title', 'Verificacion')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Impresión de Verificación de Kardex</h1>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-1">
            <label class="m-0">Ciclo Escolar: </label>
        </div>
        <div class="col-2">
            <select class="m-0 form-control form-select">
                <option></option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
            </select>
        </div>
        <div class="col-2">
            <button class="btn-sm bg-dark">Buscar</button>
        </div>
    </div>

    <br><br><br>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-impresion" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Kardex para impresión</button>
          <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-correciones" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Correciones en el Kardex</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-consultas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Consultas en la Verificación</button>
          <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-estadisticas" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Estadísticas de la Verificación</button>
        </div>
    </nav>

    <!--tabs-->
    <div class="tab-content">
        <!--impresion-->
        <div class="p-3 tab-pane fade show active" id="nav-impresion" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered table-striped dataTable dtr-inline tablas_kardex">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cve. UASLP</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Correcta</th>
                        <th>Asesor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div> 

        <!--correcciones-->
        <div class="p-3 tab-pane fade show" id="nav-correciones" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered table-striped dataTable dtr-inline tablas_kardex"> 
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cve. UASLP</th>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th>Correcta</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Detalle del Alumno:</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div>
                <div class="col-2">
                    <label class="form-label">Kardex Corregido:</label>
                    <select class="form-control form-select">
                        <option></option>
                        <option></option>
                    </select>
                </div>
                <div class="col-2">
                    <label class="form-label">Estatus de la corrección:</label>
                    <select class="form-control form-select">
                        <option></option>
                        <option></option>
                    </select>
                </div>
                <div class="col-3">
                    <label class="form-label">Aclaración:</label>
                    <textarea class="form-control" rows="5"></textarea> 
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
        $('.tablas_kardex').DataTable({
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
        });
    });    
</script>
@stop