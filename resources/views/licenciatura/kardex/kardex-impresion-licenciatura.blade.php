@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-6">
            <h1>Kardex</h1>
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

        <div class="row gutters-sm">
            <div class="col-sm-2 mb-3 d-flex align-items-start justify-content-start pr-0">
                <div style="width: 133px;">
                    <div style="height: 133px;">
                        <img src="https://picsum.photos/200/300" class="img-fluid" alt="" style="width: 133px; height: 133px;">
                    </div>
                </div>
            </div>

            <div class="col-sm-10 mb-3 pl-0">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Clave UASLP</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                            <button type="button" class="btn btn-info"><i class="fas fa-search"></i></button>    
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Situación</label>
                        <input type="text" class="form-control" id="cve_unica" name="situacion" disabled> 
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fecha de situación</label>
                        <input type="date" class="form-control" id="cve_unica" name="fecha_situacion" disabled>  
                    </div>
                    <div class="form-group col-md-2">
                        <label>Condición</label>
                        <input type="text" class="form-control" id="cve_unica" name="Condicion" disabled> 
                    </div>
                    <div class="form-group col-md-3">
                        <label>Clave Ingeniería</label>
                        <input type="number" class="form-control" name="ingenieria" disabled> 
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="domiclio" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Asesor</label>
                        <input type="text" class="form-control" name="colonia" disabled> 
                    </div>
                    <div class="form-group col-md-4">
                        <label>Carrera</label>
                        <input type="text" name="cp" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Aprobo 45 Créditos en 1 y 2 Semestres</label>
                <div class="col-2 p-0">
                    <input class="form-control" type="text" name="" disabled>    
                </div>
            </div>
            <div class="form-group col-md-6">
                <label>Aprobo 45 Créditos en 3er Semestre</label>
                <div class="col-2 p-0">
                    <input class="form-control" type="text" name="" disabled>
                </div>
            </div>
        </div>
        <br>

        <div class="row"> <!--Card para las tabs-->
           <div class="col-12 card">
                <div class="card-title">
                    <div class="d-flex justify-content-start">
                        <button class="btn btn-app bg-gradient-secondary"><i class="fas fa-print">Imprimir</i></button>
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
                   </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="">
                        <div class="tab-pane fade show active" id="tab-kardex" role="tabpanel">
                            <div class="d-flex justify-content-end">
                                <button class="btn bg-gradient-primary" data-toggle="modal" data-target="#nuevaMateria"><i class="fas fa-plus"></i></button>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable dtr-inline tablas_impresion" id="materias">
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
                                            <th>Opciones</th>
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
                                            <td class="d-flex justify-content-around"><button class="btn btn-primary btn-sm" data-toggle="modal" data-id="1" data-target="#registroExamen"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
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
                                            <td class="d-flex justify-content-around"><button class="btn btn-primary btn-sm" data-toggle="modal" data-id="1" data-target="#registroExamen"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
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
                                            <td class="d-flex justify-content-around"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
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
                                            <td class="d-flex justify-content-around"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--Tab de kardex-->
                        <div class="tab-pane fade show" id="tab-estadisticas_semestrales" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable dtr-inline tablas_impresion">
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
                                        <table class="table table-bordered table-striped dataTable dtr-inline tablas_impresion">
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
                    </div><!--Tab principal-->
               </div><!--Fin card body de kardex-->
           </div><!--Fin card de kardex--> 
        </div>
    </div><!--fin card body-->    
</div><!--fin card-->

<!--Modal de nueva materia-->
<div class="modal fade" id="nuevaMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Materia Nueva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <form >
                        <div class="form-group"> 
                            <div class="d-flex justify-content-around row">
                                <div class="col-2">
                                    <label class="col-form-label">Clave</label>
                                    <input class="form-control" type="text" name="clave">
                                </div>
                                <div class="col-4">
                                    <label class="col-form-label">Nombre de la materia</label>
                                    <input class="form-control" type="text" name="nombre">
                                </div>
                                <div class="col-2">
                                    <label class="col-form-label">Calificación</label>
                                    <input class="form-control" type="text" name="calificacion">
                                </div>
                            </div>
                            <div class="d-flex justify-content-around row">
                                <div class="col-3">
                                    <label class="col-form-label">Fecha</label>
                                    <input class="form-control" type="date" name="fecha">
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label">Tipo de Examen</label>
                                    <input class="form-control" type="text" name="tipo_examen">
                                </div>
                                <div class="col-2">
                                    <label class="col-form-label">Semestre</label>
                                    <input class="form-control" type="numer" name="semestre">
                                </div>    
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Agregar Materia</button>
            </div>
        </div>
        </div>
    </div>
</div>

<!--Modal para editar materia-->
<div class="modal fade" id="editarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <form >
                        <div class="form-group "> 
                            <div class="d-flex justify-content-around row">
                                <div class="col-2">
                                    <label class="col-form-label">Clave</label>
                                    <input class="form-control update" type="text" name="clave">
                                </div>
                                <div class="col-4">
                                    <label class="col-form-label">Nombre de la materia</label>
                                    <input class="form-control update" type="text" name="nombre" disabled>
                                </div>
                                <div class="col-2">
                                    <label class="col-form-label">Calificación</label>
                                    <input class="form-control update" type="text" name="calificacion">
                                </div>
                            </div>
                            <div class="d-flex justify-content-around row">
                                <div class="col-3">
                                    <label class="col-form-label">Fecha</label>
                                    <input class="form-control update" type="date" name="fecha">
                                </div>
                                <div class="col-3">
                                    <label class="col-form-label">Tipo de Examen</label>
                                    <input class="form-control  update" type="text" name="tipo_examen">
                                </div>
                                <div class="col-2">
                                    <label class="col-form-label">Semestre</label>
                                    <input class="form-control update" type="numer" name="semestre">
                                </div>    
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        </div>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor/ckeditor.js')}}"></script> 
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
            });
        });    
    </script>
@stop