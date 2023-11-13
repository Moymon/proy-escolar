@extends('adminlte::page')



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
<div class="">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-1">
                        <img src="{{asset('img/perfil.png')}}" alt="">
                    </div>
                    <div class="col-11 form-row">
                        <div class="form-group col-mb-2">
                            <label>Clave UASLP</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="cve_unica" name="cve_unica">
                                <button type="button" class="btn btn-info"><i class="fas fa-search"></i></button>    
                            </div>
                        </div>
                        <div class="form-group col-mb-3">
                            <label>Alumno </label>
                            <input class="form-control" id="nombreAlumno" type="text" name="" value="Boix Salazar Julio Alberto" disabled>
                        </div>
                        <div class="form-group">
                            <label>Posgrado</label>
                            <select id="grado" class="form-control form-select">
                                <option>Posgrado 1</option>
                                <option>Posgrado 2</option>
                            </select> 
                        </div>
                        <div class="form-group col-mb-3">
                            <label>Opción</label>
                            <input type="text" class="form-control" id="opcion" name="" value="Mecatrónica y Sistemas Mecánicos" disabled>    
                        </div>
                        <div class="form-group col-mb-3">
                            <label>Estado</label>
                            <input type="text" class="form-control" id="estatus" name="" value="AI" disabled>   
                        </div>
                    </div>
                </div><!--Fin primera parte-->
            </div>

            <div class="container" align="center">
                <div class="card" >
                    <div class="card-header">
                        <div class="d-flex justify-content-center">
                            <label><h3>Estadísticas</h3></label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-row d-flex justify-content-center">
                                    <div class="col-2 m-1">
                                        <div class="form-group">
                                            <label >Promedio General</label>
                                            <input type="text" class="form-control" id="prom_general" value="8.57" readonly> 
                                        </div>
                                    </div>
                                    <div class="col-3 m-1">
                                        <div class="form-group">
                                            <label >Promedio General Aprobatorio</label>
                                            <input type="text" class="form-control" id="prom_gral_apro" value="8.57" disabled> 
                                        </div>
                                    </div>
                                    <div class="col-2 m-1">
                                        <div class="form-group">
                                            <label>Total Créditos Aprobados</label>
                                            <input type="text" id="total_cre_apro" class="form-control" value="40" disabled>
                                        </div>
                                    </div>
                                    <div class="col-1 m-3">
                                        <form id="formPDFKardexPosgrado" method="POST" action="{{route('imprimeKardex')}}">
                                            @csrf
                                            <button id="buttonCrearPdf" class="btn bg-dark">Crear PDF</button>
                                        </form>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--Segunda card-->
            </div><!---->
            <br>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
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
                        <br>

                        <div class="row">
                            <div class="col-12">
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
                        <br>

                        <div class="row">
                            <div class="col-12">
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
	
	<script>
        //Obtenemos el form en el cual se mnadara la informacion de la pantalla, nombre, calificaiones, etc.
        const formPDFKardexPosgrado = document.getElementById("formPDFKardexPosgrado");
        const buttonCrearPdf = document.getElementById("buttonCrearPdf"); //Seleccionamos el boton que generara el evento de submit
        const tablasCalificaciones = document.getElementsByClassName("tablaDatosCalificaciones"); //Hacemos un getElements de todas las tablas de califiaciones

        cargarEventListener(); //Llamamos a la funcion que va estar escuchando el evento de "click" al boton de submit
        function cargarEventListener() {
            buttonCrearPdf.addEventListener("click", muestraPDF); //Lllamos a la funcion de muestraPDF sesun el evento de click
        }

        function muestraPDF(e) {
            e.preventDefault(); //Prevenimos el evento por default del boton al dar click
            recogeInformacion(); //Obtenemos toda la informacion y la almacenamos en inputs dentro del form
            enviarSolicitudAjax(); //Llamamos a la funcion que se va encargar de hacer la peticion de datos, en este caso de pdf para mostrarlo en otra pantalla
        }

        function recogeInformacion() { //Obtenemos toda la informacion de la pantalla
            const clave = document.getElementById('cve_unica').value;
            const nombreAlumno = document.getElementById('nombreAlumno').value;
            const grado = document.getElementById('grado').value;
            const opcion = document.getElementById('opcion').value;
            const prom_general = document.getElementById('prom_general').value;
            const prom_gral_apro = document.getElementById('prom_gral_apro').value;
            const total_cre_apro = document.getElementById('total_cre_apro').value;

            const datosAlumno = { //Objeto con los datos del alumno dentro de la pantalla
                clave,
                nombre: nombreAlumno,
                grado,
                opcion,
            };

            const datosCalificaciones = { //Objeto con los datos generales de kardex dentro de la pantalla
                'Promedio General': prom_general,
                'Promedio General Aprobatorio': prom_gral_apro,
                'Total Creditos Aprobados': total_cre_apro,
            };

            //Creamos los inputs que mandaremos en el form para la generacion del PDF
            const inputDatosAlumno = crearInput('datosAlumno', JSON.stringify(datosAlumno));
            const inputDatosCalificaciones = crearInput('datosCalificaciones', JSON.stringify(datosCalificaciones));
            const inputDatosSemestre = crearInput('datosSemestre', JSON.stringify(recogeDatosSemestre()));

            //Asignamos cada uno de los hijos al form
            formPDFKardexPosgrado.appendChild(inputDatosAlumno);
            formPDFKardexPosgrado.appendChild(inputDatosCalificaciones);
            formPDFKardexPosgrado.appendChild(inputDatosSemestre);
        }

        //Funcion que recoge la informacion de las tablas de califiaciones por semestre 
        function recogeDatosSemestre() {
            const datosSemestreArray = []; //Objeto que guardara la informacion de cada semestre con las meterias.

            //El siguiente es un ciclo anidado que guarda el semestre junto con la informacion de cada materia
            for (const element of tablasCalificaciones) {
                const semestre = element.querySelector('thead tr th').textContent; //Obtenemos el semestre
                const materias = element.querySelectorAll('tbody tr:not(.promedios)'); //Obtenemos todos los renglones con materias, excepcion de los de promedios
                const materiasArray = []; //Array que guardara la informacion de cada materia

                for (const materia of materias) { //iteracion sobre los renglones de la tabla que contienen materias
                    const tds = materia.querySelectorAll("td"); //Se obetiene cada celda del renglon
                    const materiasInfoTds = []; //Array que guardara el valor de cada celda "td"
                    for (const td of tds) { //Iteracion sobre todos los tds
                        materiasInfoTds.push(td.textContent); //Guardamos cada td
                    }
                    materiasArray.push(materiasInfoTds); //Guardamos el array con la informacion de la materia
                }

                //Objeto con la informacion del semestre y las materias que le corresponden
                datosSemestreArray.push({
                    semestre,
                    materiasArray,
                });

                //console.log(materiasArray);
            }
            return datosSemestreArray;
        }

        //Funcion que permite crear inputs de forma dinamica
        function crearInput(name, value) {
            const input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', name);
            input.value = value;
            return input;
        }

        //Funcion que realiza la peticion AJAX
        function enviarSolicitudAjax() {
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

                    // Eliminar los inputs después de recibir la respuesta
                    eliminarInputs();
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
    
        //Funcion para eliminar inputs
        function eliminarInputs() {
            const inputsToBeRemoved = [ //Objeto con los nombres de los inputs a eliminar
                'datosAlumno',
                'datosCalificaciones',
                'datosSemestre'
            ];

            inputsToBeRemoved.forEach(inputName => { //Iteracion para eliminar los inputs
                const inputElement = formPDFKardexPosgrado.querySelector(`input[name="${inputName}"]`);
                if (inputElement) {
                    inputElement.remove();
                }
            });
        }
    </script>
@stop