@extends('adminlte::page')
@extends('modalAlumnos')
@extends('subirFotoPerfil')

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
        <div class="row">
            <div class="col-1">
                <div class="input-group">
                    <img src="{{$url_img_perfil}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-11">
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>Clave UASLP</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                                <button type="button" class="btn btn-info"><i class="fas fa-search"></i></button>    
                            </div>  
                        </div>
                    </div>
                    <div class="col-3">
                        <label>Alumno </label>
                        <input class="form-control" type="text" name="" value="Boix Salazar Julio Alberto" disabled>
                    </div>
                    <div class="col-3">
                        <label>Posgrado</label>
                        <select id="grado" class="form-control form-select">
                            <option>Posgrado 1</option>
                            <option>Posgrado 2</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label class="form-label">Opción</label>
                        <input type="text" class="form-control" id="opcion" name="" value="Mecatrónica y Sistemas Mecánicos" disabled>    
                    </div>
                    <div class="col-2">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estatus" name="" value="AI" disabled>   
                    </div>
                </div>
            </div>
        </div><!--Fin row Primera Seccion-->
        <br>
        <br>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center">
                    <label><h3>Estadisticas</h3></label>
                </div>
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-12">
                        <div class="row d-flex justify-content-end">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="input-group-text" >Promedio General</label>
                                    <input type="text" class="form-control" id="prom_general" value="8.57" readonly> 
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group">
                                    <label class="input-group-text">Promedio General Aprobatorio</label>
                                    <input type="text" class="form-control" id="prom_gral_apro" value="8.57" disabled> 
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="input-group-text">Total Créditos Aprobados</label>
                                    <input type="text" id="total_cre_apro" class="form-control" value="40" disabled>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn bg-dark ">Crear PDF</button>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr align="center"><th colspan="6"  class="table-secondary">Semestre 2016-2017/II</th></tr>
                            <tr>
                                <th>No.</th>
                                <th>Materia</th>
                                <th>Tipo</th>
                                <th>Calificación</th>
                                <th>Fecha</th>
                                <th>Creditos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Metodos de Optimizacion</td>
                                <td>Complementaria</td>
                                <td>7.5</td>
                                <td>22-06-2017</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Procesos de Manufactura Avanzados (CAM)</td>
                                <td>Complementaria</td>
                                <td>7.0</td>
                                <td>22-06-2017</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seminario I</td>
                                <td>Seminario</td>
                                <td>10.0</td>
                                <td>22-06-2017</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-secondary" align="right">Promedio del Periodo:</td>
                                <td>8.17</td>
                                <td class="table-secondary" >Creditos Periodo:</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-dark" align="right">Promedio Aprobatorio del Periodo:</td>
                                <td>8.17</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr align="center"><th colspan="6"  class="table-secondary">Semestre 2016-2017/II</th></tr>
                            <tr>
                                <th>No.</th>
                                <th>Materia</th>
                                <th>Tipo</th>
                                <th>Calificación</th>
                                <th>Fecha</th>
                                <th>Creditos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Metodos de Optimizacion</td>
                                <td>Complementaria</td>
                                <td>7.5</td>
                                <td>22-06-2017</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Procesos de Manufactura Avanzados (CAM)</td>
                                <td>Complementaria</td>
                                <td>7.0</td>
                                <td>22-06-2017</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seminario I</td>
                                <td>Seminario</td>
                                <td>10.0</td>
                                <td>22-06-2017</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-secondary" align="right">Promedio del Periodo:</td>
                                <td>8.17</td>
                                <td class="table-secondary" >Creditos Periodo:</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-dark" align="right">Promedio Aprobatorio del Periodo:</td>
                                <td>8.17</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr align="center"><th colspan="6"  class="table-secondary">Semestre 2016-2017/II</th></tr>
                            <tr>
                                <th>No.</th>
                                <th>Materia</th>
                                <th>Tipo</th>
                                <th>Calificación</th>
                                <th>Fecha</th>
                                <th>Creditos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Metodos de Optimizacion</td>
                                <td>Complementaria</td>
                                <td>7.5</td>
                                <td>22-06-2017</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Procesos de Manufactura Avanzados (CAM)</td>
                                <td>Complementaria</td>
                                <td>7.0</td>
                                <td>22-06-2017</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Seminario I</td>
                                <td>Seminario</td>
                                <td>10.0</td>
                                <td>22-06-2017</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-secondary" align="right">Promedio del Periodo:</td>
                                <td>8.17</td>
                                <td class="table-secondary" >Creditos Periodo:</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="table-dark" align="right">Promedio Aprobatorio del Periodo:</td>
                                <td>8.17</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!--fin card body-->    
</div><!--fin card-->



@stop

@section('css')
    
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor/ckeditor.js')}}"></script> 
    <script>/*
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
        });  */  
    </script>

    <script>
        const $imagen = document.querySelector('#foto'), $imagenPreview = document.querySelector('#imagenPreview');

        $imagen.addEventListener("change",() =>{
            const archivo = $imagen.files;
            /*Si no hay datos del archivo no hacemos nada*/
            if (!archivo || !archivo.length) {
                $imagen.src = "";
                return;
            }else{
                /*Tomamos el primer archivo*/
                const archivo1 = archivo[0];
                const blobObject = URL.createObjectURL(archivo[0]);
                $imagenPreview.src = blobObject;
            }

        });
    </script>
@stop