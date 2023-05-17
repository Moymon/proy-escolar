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
                            <div class="row d-flex justify-content-end">
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
                    <div class="row d-flex justify-content-end">
                        <div class="col-6 ">
                            <label>Aprobo 45 Créditos en 3er Semestre</label>
                        </div>
                        <div class="col-4">
                           <input class="form-control" type="text" name="" disabled> 
                        </div>
                    </div>
                </div>
            </div><!--Fin col segunda columna-->
        </div><!--Fin row Primera Seccion-->
        <div class="row">
           <div class="col-12 card">
                <div class="card-title">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-app"><i class="fas fa-print">Imprimir</i></button>
                    </div>
                </div>
                <div class="card-header p-0 pt-1 ">
                   <ul class="nav nav-tabs" id="tabs-kardex" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" role="tab"  href="#tab-kardex">Kardex</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" role="tab"  href="#tab-estadisticas_semestrales">Estadísticas Semestrales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" role="tab"  href="#tab-estadisticas_generales">Estadísticas Generales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" role="tab"  href="#tab-observaciones_academicas">Observaciones Académicas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" role="tab"  href="#tab-cambios">Cambios</a>
                        </li>
                   </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="">
                        <div class="tab-pane fade show active" id="tab-kardex" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>NUM</th>
                                            <th>Clave</th>
                                            <th>Creditos</th>
                                            <th>Nivel</th>
                                            <th>Materia</th>
                                            <th>Calificacion</th>
                                            <th>Fecha</th>
                                            <th>Examen</th>
                                            <th>Semestre</th>
                                            <th>% de Avance</th>
                                            <th>Creditos aprobados</th>
                                            <th>Observaciones</th>
                                            <th>Cpm</th>
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
                                            <td></td>
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
                                            <td></td>
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
                                            <td></td>
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
                                            <td></td>
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
                        </div><!--Tab de kardex-->
                        <div class="tab-pane fade show" id="tab-estadisticas_semestrales" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Semestre</th>
                                            <th>Materias Aprobadas</th>
                                            <th>Creditos Aprobados</th>
                                            <th>Promedio Aprobatorio</th>
                                            <th>Materias Reprobadas</th>
                                            <th>Regus Presentados</th>
                                            <th>Promedio General</th>
                                            <th>Rendimiento Semestral</th>
                                            <th>Creditos Acumulados</th>
                                            <th>Avance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
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
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--Tab estadisticas semestrales-->
                        <div class="tab-pane fade show" id="tab-estadisticas_generales">
                            <div class="row">
                                <div class="col-4">
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Créditos por cursar</label>
                                    </div>
                                    <div class="col-3">
                                       <input class="form-control" type="text" name="" disabled> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Créditos Aprobados</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Créditos por Semestre</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Porcentaje de Avance</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Semestres Cursados</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Semestres Disponibles</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Semestres Aprobados</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Proximo Semestre por cursar</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Semestres Necesarios</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Promedio General</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Rendimiento General</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Promedio Aprobatorio DFM</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Promedio Aprobatorio Comunes</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Promedio Aprobatorio Carrera</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Promedio Aprobatorio Acumulado</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Materias Aprobadas</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Materias Reprobadas</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Regularización Presentados</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                      <label class="col-form-label d-flex justify-content-end">Regularización Disponibles</label>
                                    </div>
                                    <div class="col-3">
                                        <input class="form-control" type="text" name="" disabled>
                                    </div>
                                </div>
                                </div> 
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12">
                                             <label class="d-flex justify-content-center">Materias Aprobadas</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">RV</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">EO</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">IO</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">IO</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">UO</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">ER</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="col-form-label d-flex justify-content-end">AP</label>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" type="text" name="" disabled>
                                            </div>
                                        </div>
                                        </div><!--Fin primera columna-->
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">EU</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">EE</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">IE</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">UE</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                        </div><!--Fin Segunda Columna-->
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">EA</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">ET</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">IT</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <label class="col-form-label d-flex justify-content-end">UT</label>
                                                </div>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" name="" disabled>
                                                </div>
                                            </div>
                                        </div><!--Fin tercera columna-->
                                  </div>
                              </div>
                            </div> 
                        </div><!--Tab Estadisticas generales-->
                        <div class="tab-pane fade show" id="tab-observaciones_academicas" role="tabpanel">
                            <div class="row">
                                <div class="col-6">
                                <form>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Notas del Kardex</h3>
                                        </div>
                                        <div class="card-body">
                                            <textarea class="ckeditor" name="editor" id="editor"></textarea>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-6">
                                                            <button class="btn btn-light form-control">Agregar</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="btn btn-light form-control" disabled>Modificar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-6">
                                                            <button class="btn btn-light form-control" disabled>Guardar</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button class="btn btn-light form-control" disabled>Deshacer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <button class="btn btn-light form-control" disabled>Eliminar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>       
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Notas sobre los articulos 111 y 112</h3>
                                        </div>
                                        <div class="card-body">
                                            <textarea class="form-control" rows="8" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped dataTable dtr-inline">
                                            <thead>
                                                <tr>
                                                    <th>Fecha EGEL</th>
                                                    <th>Testimonio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tbody>   
                                        </table>
                                    </div>
                                </div>    
                            </div>
                        </div><!--Tab Observaciones Academicas-->
                        <div class="tab-pane fade show" id="tab-cambios" role="tabpanel">
                            <form >
                                <div class="form-group"> 
                                    <div class="d-flex justify-content-around row">
                                        <div class="col-1">
                                            <label class="col-form-label">Clave</label>
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-3">
                                            <label class="col-form-label">Nombre de la materia</label>
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-1">
                                            <label class="col-form-label">Calificación</label>
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-2">
                                            <label class="col-form-label">Fecha</label>
                                            <input class="form-control" type="date" name="">
                                        </div>
                                        <div class="col-2">
                                            <label class="col-form-label">Tipo de Examen</label>
                                            <input class="form-control" type="text" name="">
                                        </div>
                                        <div class="col-1">
                                            <label class="col-form-label">Examen</label>
                                            <input class="form-control" type="numer" name="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end row">
                                        <div class="col-1">
                                            <button class="btn btn-light form-control">Agregar</button>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-light form-control">Eliminar</button>
                                        </div>
                                        <div class="col-1">
                                            <button class="btn btn-light form-control">Modificar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--Tab Cambios-->
                    </div><!--Tab principal-->
               </div><!--Fin card body de kardex-->
           </div><!--Fin card de kardex--> 
        </div>
    </div><!--fin card body-->
    <div class="card-footer">
        <div class="row d-flex justify-content-end">
            <div class="col-1">
                <button class="btn btn-light form-control">Imprimir</button>
            </div>
        </div>
    </div><!--Fin card footer-->    
</div><!--fin card-->


@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor/ckeditor.js')}}"></script>
@stop