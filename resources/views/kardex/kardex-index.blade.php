@extends('adminlte::page')
@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Kardex</h1>
        </div>
        <div class="col-6 ">
            <div class="d-flex justify-content-end">
                <input class="" type="number" name="" placeholder="Clave Única">
                <a class="btn btn-light"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-1">
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
                            <label>Situación</label>
                            <input type="text" class="form-control" id="cve_unica" name="situacion">
                        </div>
                        <div class="form-group">
                            <label>Fecha de situación</label>
                            <input type="date" class="form-control" id="cve_unica" name="fecha_situacion">
                        </div>
                        <div class="form-group">
                            <label>Condición</label>
                            <input type="text" class="form-control" id="cve_unica" name="Condicion">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label>Aprobo 45 Créditos en 1 y 2 Semestres</label>
                                </div>
                                <div class="col-4">
                                   <input class="form-control" width="50%" type="text" name="" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <br> 
                        <button class="btn btn-light"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Ingeniería</label>
                    <input type="number" class="form-control" name="ingenieria" disabled>
                </div> 
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="domiclio" disabled>
                </div>
                <div class="form-group">
                    <label>Asesor</label>
                    <input type="text" class="form-control" name="colonia" disabled>
                </div>
                <div class="form-group">
                    <label>Carrera</label>
                    <input type="text" name="cp" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label>Aprobo 45 Créditos en 3er Semestre</label>
                        </div>
                        <div class="col-4">
                           <input class="form-control" width="50%" type="text" name="" disabled> 
                        </div>
                    </div>
                </div>
            </div><!--Fin col segunda columna-->
        </div><!--Fin row Primera Seccion-->
    </div><!--fin card body-->    
</div><!--fin card-->


@stop

@section('css')
@stop

@section('js')

@stop