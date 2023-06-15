@extends('adminlte::page')

@section('title', 'Ordenes de Pago')

@section('content_header')
    <h1>Generar Archivo para Ordenes de Pago</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-3">
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
                        <div class="col-6 ">
                            <button type="button" class="btn-sm bg-dark form-control">Listar Fechas</button>
                        </div>
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
                        <div class="col-6">
                            <button type="button" class="btn-sm bg-dark form-control">Listar Exámenes</button>
                        </div>
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

        <div class="col-9">
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
                            <div class="row">
                                <div class="col-12">
                                   <label class="form-label">Clave de <br> Materia</label> 
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" name="" disabled>  
                                </div>
                            </div>
                        </div>
                        <div class="col-2"> 
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Clave de <br>Materia UASLP</label>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input class="form-control" type="text" name="" disabled>    
                                </div>
                            </div>
                        </div>
                        <div class="col-4"> 
                            <label class="form-label"><br>Materia</label>
                            <input class="form-control" type="text" name="" disabled>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                 <div class="card-body">
                                    <div class="input-group">
                                        
                                    </div>
                                    <label>Número de Recibo</label>
                                    <input type="text" name="">
                                 </div>
                            </div>
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