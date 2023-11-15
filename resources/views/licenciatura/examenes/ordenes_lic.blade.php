@extends('adminlte::page')

@section('title', 'Ordenes de Pago')

@section('content_header')
    <h1>Generar Archivo para Ordenes de Pago</h1>
@stop

@section('content')
<div class="container-xxl">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label>Semestre</label>
                                <select class="form-control form-select">
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Periodo</label>
                                <select class="form-control form-select">
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tipo de Sinodal</label>
                                <select class="form-control form-select">
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div>
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
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-row d-flex flex-column align-items-center justify-content-center">
                            <div class="form-group col-md-8">
                                <label>Fecha de Entrega de Resultados</label>
                                <input class="form-control" type="date" name="">
                            </div>
                            <div class="form-group col-md-8">
                                <button type="button" class="w-100 btn btn-primary">Generar Archivo SIIA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>Tipo Sinodal</label>
                                    <input class="form-control" type="text" name="" disabled> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label>RPE</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Profesor</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Clave de Materia</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
        
                                <div class="form-group col-md-3">
                                    <label>Clave de Materia UASLP</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="">Materia</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Clave Única</label>
                                    <input class="form-control" type="number" name="" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nombre del Alumno</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Tipo de Examen</label>
                                    <input class="form-control" type="text" name="" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Fecha de Examen</label>
                                    <input class="form-control" type="date" name="" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Fecha de Resultados</label>
                                    <input class="form-control" type="date" name="" disabled>   
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3 border shadow-sm p-3">
                                <label>Número de Recibo</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="" disabled>
                                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-save"></i></button>
                                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-window-close"></i></button>   
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>

                <div class="card mb-3">
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
</div>
@stop 

@section('footer')
    <div></div>
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