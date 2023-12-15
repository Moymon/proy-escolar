@extends('adminlte::page')
@section('title', 'Kardex')
@section('plugins.Datatables',true)

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h1>Kardex</h1>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buscarAlumno" name="">Buscar Alumno</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-1">
                            <img src="{{asset('img/perfil.png')}}" alt="">
                        </div>
                        <div class="col-11 form-row">
                            <div class="form-group col-md-2">
                                <label>Clave UASLP</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>    
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Alumno </label>
                                <input class="form-control" id="nombreAlumno" type="text" name="" value="Boix Salazar Julio Alberto" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Posgrado</label>
                                <select id="grado" class="form-control form-select">
                                    <option>Posgrado 1</option>
                                    <option>Posgrado 2</option>
                                </select> 
                            </div>
                            <div class="form-group col-md-2">
                                <label>Opción</label>
                                <input type="text" class="form-control" id="opcion" name="" value="Mecatrónica y Sistemas Mecánicos" disabled>    
                            </div>
                            <div class="form-group col-md-3">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="estatus" name="" value="AI" disabled>   
                            </div>
                        </div>
                    </div><!--Fin primera parte-->
                </div>

                <div class="container" align="center">
                    <div class="card" >
                        <div class="card-header">
                            <label><h3 class="text-center m-0">Estadísticas</h3></label>
                        </div>
                        <div class="card-body">
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-3">
                                    <label >Promedio General</label>
                                    <input type="text" class="form-control" id="prom_general" value="8.57" readonly> 
                                </div>
                                <div class="form-group col-md-3">
                                    <label >Promedio General Aprobatorio</label>
                                    <input type="text" class="form-control" id="prom_gral_apro" value="8.57" disabled> 
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Total Créditos Aprobados</label>
                                    <input type="text" id="total_cre_apro" class="form-control" value="40" disabled>
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <form id="formPDFKardexPosgrado" method="POST" action="{{route('imprimeKardex')}}">
                                        @csrf
                                        <button type="button" id="buttonCrearPdf" class="w-100 btn btn-primary">Crear PDF</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!--Segunda card-->
                </div><!---->
                <br>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 tablaDatosCalificaciones table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr align="center"><th colspan="6"  class="table-secondary">Semestre 2016-2017/II</th></tr>
                                <tr class="encabezados">
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
                                <tr class="promedios">
                                    <td></td>
                                    <td></td>
                                    <td class="table-secondary" align="right">Promedio del Periodo:</td>
                                    <td>8.17</td>
                                    <td class="table-secondary" >Creditos Periodo:</td>
                                    <td>17</td>
                                </tr>
                                <tr class="promedios">
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
                        <table class="w-100 tablaDatosCalificaciones table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr align="center"><th colspan="6"  class="table-secondary">Semestre 2017-2018/I</th></tr>
                                <tr class="encabezados">
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
                                <tr class="promedios">
                                    <td></td>
                                    <td></td>
                                    <td class="table-secondary" align="right">Promedio del Periodo:</td>
                                    <td>8.17</td>
                                    <td class="table-secondary" >Creditos Periodo:</td>
                                    <td>17</td>
                                </tr>
                                <tr class="promedios">
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
                        <table class="w-100 tablaDatosCalificaciones table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr align="center"><th colspan="6"  class="table-secondary">Semestre 2017-2018/II</th></tr>
                                <tr class="encabezados">
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
                                <tr class="promedios">
                                    <td></td>
                                    <td></td>
                                    <td class="table-secondary" align="right">Promedio del Periodo:</td>
                                    <td>8.17</td>
                                    <td class="table-secondary" >Creditos Periodo:</td>
                                    <td>17</td>
                                </tr>
                                <tr class="promedios">
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
        </div>
    </div>

    @include('modalAlumnos')
    @include('subirFotoPerfil')
@stop

@section('footer')
    <div></div>
@stop

@section('css')
    
@stop


@push('js')
    <script src="{{asset('js/Administracion/PDFs/kardex-impresion-posgrado.js')}}"></script>
    <script>
        const imprimeKardex = '{{ route('imprimeKardex') }}';
    </script>
@endpush

@section('js')
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