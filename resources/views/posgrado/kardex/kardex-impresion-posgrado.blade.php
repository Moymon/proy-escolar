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
        <div class="row">
            <div class="col-md-1">
                <img src="https://picsum.photos/200/300" class="img-fluid" alt="">
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
                        <label>Alumno: </label>
                        <input class="form-control" id="nombreAlumno" type="text" name="" value="Boix Salazar Julio Alberto" disabled>
                    </div>
                    <div class="col-3">
                        <label>Grado</label>
                        <input type="text" class="form-control" id="grado" name="" value="Doctorado en Ingeniería Mecánica" disabled>   
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
                            <div class="col-3">
                                <div class="input-group">
                                    <label class="input-group-text" >Promedio General:</label>
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
                                <form id="formPDFKardexPosgrado" method="POST" action={{route('imprimeKardex')}}>
                                    @csrf
                                    <button id="buttonCrearPdf" class="btn bg-dark" type="submit">Crear PDF</button>
                                </form>   
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
                    <table class="tablaDatosCalificaciones table table-bordered table-striped dataTable dtr-inline">
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
                    <table class="tablaDatosCalificaciones table table-bordered table-striped dataTable dtr-inline">
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
                    <table class="tablaDatosCalificaciones table table-bordered table-striped dataTable dtr-inline">
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

    <script>
        const formPDFKardexPosgrado = document.getElementById("formPDFKardexPosgrado");
        const buttonCrearPdf = document.getElementById("buttonCrearPdf");
        const tablasCalificaciones = document.getElementsByClassName("tablaDatosCalificaciones");

        cargarEventListener();
        function cargarEventListener() {

            //Listener para la dinamica de seleccion de una materia en la tabla de (examenes-materia) 
            buttonCrearPdf.addEventListener("click", muestraPDF);

        }

        function muestraPDF(e) {
            e.preventDefault();

            recogeInformacion();

            const xhr = new XMLHttpRequest();

            xhr.open("POST", '{{ route('imprimeKardex') }}'); 
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.responseType = 'arraybuffer'; // Indica que esperamos una respuesta de tipo arraybuffer

            // Manejar la respuesta de la solicitud
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var blob = new Blob([xhr.response], { type: 'application/pdf' });
                    //console.log(xhr.response);
                    var pdfUrl = URL.createObjectURL(blob);

                    // Abrir la URL del PDF en una nueva pestaña
                    window.open(pdfUrl, '_blank');
                } else {
                    console.error("Error en la solicitud. Código de estado: " + xhr.status);
                }
            };

            // Capturar errores en la solicitud
            xhr.onerror = function() {
                console.error("Error en la solicitud");
            };

            // Obtener los datos del formulario
            const formData = new FormData(formPDFKardexPosgrado);

            // Convertir los datos del formulario en una cadena de consulta URL codificada
            const encodedData = new URLSearchParams(formData).toString();

            // Enviar la solicitud AJAX con los datos del formulario
            xhr.send(encodedData);
        }

        function recogeInformacion(){

            GetDatosAlumno();
            GetDatosCalificaciones();
            
        }

        function GetDatosAlumno(){
            const clave = document.getElementById('cve_unica');
            const nombreAlumno = document.getElementById('nombreAlumno');
            const grado = document.getElementById('grado');
            const opcion = document.getElementById('opcion');
            const estatus = document.getElementById('estatus');

            datosAlumno = {
                clave: clave.value,
                nombre: nombreAlumno.value,
                grado: grado.value,
                opcion: opcion.value,
                //estatus: estatus.value
            };
            
            // Todas las calificaciones son válidas, se asignan los datos al formulario
            const inputDatosAlumno = document.createElement('input');
            inputDatosAlumno.setAttribute('type', 'hidden');
            inputDatosAlumno.setAttribute('name', 'datosAlumno');
            inputDatosAlumno.value = JSON.stringify(datosAlumno);
            formPDFKardexPosgrado.appendChild(inputDatosAlumno);
        }

        function GetDatosCalificaciones(){
            //console.log(tablasCalificaciones);
                // convert to an array using Array.from()
            Array.from(tablasCalificaciones).forEach(function(element) {
                encabezados = element.querySelector('thead').querySelector('.encabezados');
                semestre = element.querySelector('thead').querySelector('tr').querySelector('th');
                materias = element.querySelector('tbody').getElementsByTagName('tr');
                //console.log(materias);
            });
        }

    </script>
@stop