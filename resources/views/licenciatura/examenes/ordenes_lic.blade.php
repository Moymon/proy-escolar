@extends('adminlte::page')

@section('title', 'Ordenes de Pago')

@section('content_header')
    <h1>Generar Archivo para Ordenes de Pago</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Semestre</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label">Periodo</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Tipo de Sinodal</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <!-----
                        <div class="col-6 ">
                            <button type="button" class="btn-sm bg-dark form-control">Listar Fechas</button>
                        </div> ----->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped dataTable dtr-inline tablas_pago">
                                <thead>
                                    <tr>
                                        <th>Fechas de Exámenes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>   
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <!------
                        <div class="col-6">
                            <button type="button" class="btn-sm bg-dark form-control">Listar Exámenes</button>
                        </div>
                        ------>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Fecha de Entrega de Resultados</label>
                            <input class="form-control" type="date" name="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <button type="button" class="btn-sm bg-dark">Generar Archivo SIIA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"> 
                            <label class="form-label">Tipo Sinodal</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                        <div class="col-1"> 
                            <label class="form-label">RPE</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                        <div class="col-4"> 
                            <label class="form-label">Profesor</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label>Clave de Materia</label>
                            <div class="row">
                                <div class="col-8">
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label>Clave de Materia UASLP</label>
                            <div class="row">
                                <div class="col-8">
                                    <input class="form-control" type="text" name="" disabled>   
                                </div>
                            </div>
                        </div>
                        <div class="col-4"> 
                            <label class="">Materia</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-2">
                            <label class="form-label">Clave Única</label>
                            <input class="form-control" type="number" name="" disabled>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Nombre del Alumno</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                        <div class="col-2">
                            <label class="form-label">Tipo de Examen</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                        <div class="col-2">
                            <label class="form-label">Fecha de Examen</label>
                            <input class="form-control" type="date" name="" disabled>
                        </div>
                        <div class="col-2">
                            <label>Fecha de Resultados</label>
                            <input class="form-control" type="date" name="" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                 <div class="card-body">
                                    <label>Número de Recibo</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="" disabled>
                                        <button type="button" class="btn btn-outline-info"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-outline-info"><i class="fas fa-save"></i></button>
                                        <button type="button" class="btn btn-outline-info"><i class="fas fa-window-close"></i></button>   
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-12">
                    <div class="card-body">
                        <table id="tabla_pagos" class="table table-bordered table-striped dataTable dtr-inline ">
                            <thead>
                                <tr>
                                    <th>SUO</th>
                                    <th>RPE</th>
                                    <th>Profesor</th>
                                    <th>Clave de la Materia</th>
                                    <th>Clave de la Materia UASLP</th>
                                    <th>Materia</th>
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
                </div>
            </div>    
        </div>
    </div>
@stop 

@section('css')
@stop

@section('js')
<script type="text/javascript">
        $(document).ready(function (){
        $('#tabla_pagos').DataTable({
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