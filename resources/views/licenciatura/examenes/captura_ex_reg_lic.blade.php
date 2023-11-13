@extends('adminlte::page')

@section('title', 'Listado de Exámenes')

@section('content_header')
    <h1>Captura de exámenes a regularización</h1>
@stop

@section('content')
<div class="container-xxl">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form id="formFiltroFechas" method="POST" action="{{route('getFechas')}}" class="m-0 p-0">
                            @csrf
        
                            <div class="mb-3">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ciclo_escolar">Ciclo escolar</label>
                                        <select name="ciclo_escolar" id="ciclo_escolar" class="form-select form-control">
                                            <option value="" selected>Ciclo Escolar</option>
                                            <option value="2018 - 2019/1">2018 - 2019/I</option>
                                            <option value="2018 - 2019/2">2018 - 2019/II</option>
                                            <option value="2019 - 2020/1">2019 - 2020/I</option>
                                            <option value="2019 - 2020/2">2019 - 2020/II</option>
                                            <option value="2020 - 2021/1">2020 - 2021/I</option>
                                            <option value="2020 - 2021/2">2020 - 2021/II</option>
                                            <option value="2021 - 2022/1">2021 - 2022/I</option>
                                            <option value="2021 - 2022/2">2021 - 2022/II</option>
                                            <option value="2022 - 2023/1">2022 - 2023/I</option>
                                            <option value="2022 - 2023/2">2022 - 2023/II</option>
                                            <option value="2023 - 2024/1">2023 - 2024/I</option>
                                            <option value="2023 - 2024/2">2023 - 2024/II</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label for="periodo">Periodo</label>
                                        <select name="periodo" id="periodo" class="form-select form-control">
                                            <option value="" selected>Periodo</option>
                                            <option value="EXAMENES A TITULO">EXAMENES A TITULO</option>
                                            <option value="EXAMENES A REGULARIZACION">EXAMENES A REGULARIZACION</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <div>
                                <table class="table table-bordered table-striped dataTable dtr-inline tablas_pago" id="tablaFechas">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">Fechas de Exámenes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaFechasTbody">
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
        
                            <div id="erroresDeTablaFechas" style="display: none;"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="POST" action="{{route('getExamenes')}}" id="formSelectFechaForExam" style="display: none;">
                            @csrf
                            <input type="hidden" name="fechaForExam" class="inputFechaForExam" />
                            <input type="hidden" name="periodoForExam" class="inputPeriodoForExam" />
                        </form>
                        <table id="tablaExamen" class="table table-bordered table-striped dataTable dtr-inline">
                            <thead>
                                <tr>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Salón</th>
                                    <th scope="col">Ex</th>
                                    <th scope="col">Sinodal titular</th>
                                    <th scope="col">Sinodal secretario</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTablaExamen">
                                <tr>
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
                                </tr>
                                <tr>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="camposMateriaInfo" method="POST" action="{{route('getCalificaciones')}}">
                            @csrf
                            <input readonly name="claveCampo" id="claveCampo" type="hidden" class="form-control" />
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="materiaCampo">Materia</label>
                                    <input readonly name="materiaCampo" id="materiaCampo" type="text" class="form-control" /> 
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tipoCampo">Tipo de examen</label>
                                    <input readonly name="tipoCampo" id="tipoCampo" type="text" class="form-control" />
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="salonCampo">Salón</label>
                                    <input readonly name="salonCampo" id="salonCampo" type="text" class="form-control" />
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="nombreCampo">Sinodal titular</label>
                                    <input readonly name="nombreCampo" id="nombreCampo" type="text" class="form-control" />
                                </div>
        
                                <div class="form-group col-md-5">
                                    <label for="nombreCampo2">Sinodal secretario</label>
                                    <input readonly name="nombreCampo2" id="nombreCampo2" type="text" class="form-control" />
                                </div>
                                <div class="form-group col-md-2 d-flex align-items-end">
                                    <button type="submit" id="calificacionesbutton" class="w-100 btn btn-primary">Calificaciones</button>
                                </div>
                            </div>
                        </form>
        
                        <form method="POST" action="{{route('updateCalificaciones')}}" id="formCalificaciones">
                            @csrf
                            <input type="hidden" name="materiaCampo" id="materiaCampoModal" />
                            <input type="hidden" name="claveCampo" id="claveCampooModal" />
        
                            <div>
                                <table id="tablaCalificaciones" class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">UASLP</th>
                                            <th scope="col">Nombre de Alumno</th>
                                            <th scope="col">Calificación</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodyCapturaCalificaciones">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
        
                            <div id="erroresDeTablaCalificaciones" style="display: none;"></div>
        
                            <div class="d-flex align-items-center justify-content-end w-100">
                                <button id="guardarCalificaciones" type="submit" class="px-5 btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<style>
    label{
        font-weight: 500!important;
    }
    .materiaCampo{
      cursor: pointer;
      transition: all ease-in 0.3s;
    }
    .materiaCampo:hover{
        color: blue;
        text-decoration:underline ;
    }

  
    #bodyTablaExamen tr{
        cursor: pointer;
        transition: all ease-in 0.3s;
    }

    #bodyTablaExamen tr:hover{
        background-color: rgb(230, 230, 230);
    }


    #tablaFechasTbody tr{
        cursor: pointer;
        transition: all ease-in 0.3s;
    }

    #tablaFechasTbody tr:hover{
        background-color: rgb(230, 230, 230);
        color: blue;
        text-decoration: underline;
    }

    #tablaFechasTbody td{
        display: flex;
        align-items: center;
        justify-content: center;
    }


    #tablaCalificaciones{
        border-top: none!important;
        border-bottom: none!important;
    }
    .sin-borde {
        border: none!important;
        background-color: white!important; 
        width: 15px!important;
    }

    tr, td{
        white-space: nowrap;
    }
</style>

@stop

@section('js')
<!--
<script src="resources/js/es_es.json"></script>
-->

<script>
    //Constantes para cada form de Consulta
	/* Tres form en total:
		formFechasFiltro: para los campos de ciclo-escolar y periodo, este form hace la consulta para la tabla de Fechas y Examenes-Materia
		formMateriaConsulta: cundo se selecciona una de las materias, este form se encarga de recibir la informacion y con ella hacer la consulta para la tabla calificaciones.
		formCalificaciones: Este form recibe la informacion de materia y realiza el update de calificaciones.
	*/
    const formFechasFiltro = document.getElementById("formFiltroFechas");
    const formExamenesFiltro = document.getElementById("formSelectFechaForExam");
    const formMateriaConsulta = document.getElementById("camposMateriaInfo");
    const formCalificaciones = document.getElementById("formCalificaciones");
    const formSelectFechaForExam = document.getElementById("formSelectFechaForExam");
  
    //Constantes para identificar cada tbody de las tablas de la pantalla
	//Estos tobody ayudaran a identificar, donde se colocaran las consultas de base de datos
    const tablaFechasTbody = document.querySelector("#tablaFechas tbody");
    const tablaExamenesTbody = document.querySelector("#tablaExamen tbody");
    const tablaCalificacionesTbody = document.querySelector("#tablaCalificaciones tbody");

    const tablaExamenes = document.querySelector("#tablaExamen");

    //Constantes para algunos botones de la pantalla
	//Estos botones, ademas de hacer el submit en sus respectivos form, se encargan de realizar otra accion
	//por ello son declarados para manejar estos eventos.
    //const botonFechas = document.querySelector("#fechasbutton");
    //const botonExamenes = document.querySelector("#examenesbutton");
    const botonGuardar = document.querySelector('#guardarCalificaciones');
    const botonCalificaciones = document.querySelector('#calificacionesbutton');

    const inputFormFiltroFecha = formFechasFiltro.querySelector('#ciclo_escolar');
    const inputFormFiltroPeriodo = formFechasFiltro.querySelector('#periodo');

    var PERIODO;


    //Constant para un input dentro del form de fechas(Ciclo-escolar, periodo)
	//este input sirvira para identificar la consulta que se hara, 
	//es decir para la tabla de fechas o la tabla examenes-materia
    //const tipoConsulta = document.querySelector("#tipoConsulta");
  
    //Esta funcion permite englobar cada uno de los listener que se usuaran para la dinamica de la pagina
    cargarEventListener();
    function cargarEventListener() {
        // Estos listener cambian el valor del input escondido en el form (ciclo-escolar, periodo) para la el tipo de consulta que se hara
        /*
        botonFechas.addEventListener("click", () => {
            tipoConsulta.value = "fecha";
        });
        botonExamenes.addEventListener("click", () => {
            tipoConsulta.value = "examen";
        });
        */
  
        //Estos listener se les asigna un evento y la funcion que se ejecutara cuando suceda el evento
		
		//Listener para el evento de submit de cada form cuando se hace la consulta a base de datos
        //formFechasFiltro.addEventListener("submit", consultaFechas);
        //formExamenesFiltro.addEventListener("submit", consultaExamenes);
        formMateriaConsulta.addEventListener("submit", consultaCalificaciones);
        formCalificaciones.addEventListener("submit", updateCalificaciones);

        //Listener para la dinamica de seleccion de una materia en la tabla de (examenes-materia) 
        tablaExamenesTbody.addEventListener("click", seleccionarExamen);
        tablaFechasTbody.addEventListener("click", seleccionarFecha);


        inputFormFiltroFecha.addEventListener("change", revisaCampos);
        inputFormFiltroPeriodo.addEventListener("change", revisaCampos);
        //ES IMPORTNATE RECALCAR QUE SE DEBE MANTENER O MANEJAR LAS CLASES ESTABLECIDAS EN EL HTML
        //DE NO SER ASI NO SE PODRAN IDENTIFICAR LOS ELEMENTOS PARA MANEJARLOS, SI SE CAMBIAN ESTAS CLASE
        //DEBERA CAMBIAR LOS CAMPOS CON LOS QUE SE LLAMAN EN ESTAS FUNCIONES
    }


    /********************************************************************************/
    /* Funciones: Peticiones Asincronas con Fetch y .then, estas funciones permiten */
    /* esperar la consulta a base de datos medinate la route() de los form          */
    /* Para entender el funcionamiento de fecth y .then revisar la funcion          */
    /* consultarFechas()                                                            */
    /********************************************************************************/
                /***********************************************************/
                /*CAMBIO EN LARAVEL CON ESTRUCTURA OFICIAL DE DATOS 
                En estas funciones se recibe la informacion en un formato json,
                de este se filtra el $data que es un array o lista con la 
                informacion correspondiente a cada consulta. 
                
                Para manejar la estructura oficial,se debe ajustar esta 
                seccion si es que los datos no estan englobados en una 
                variable como $data.
                Si se quiere mantener esta estructura englobar los datos
                recibidos desde el controlador en una variable $data.

                Por ultimo solo basta con modificar el nombre asignado 
                para cada campo recibido, por ejemplo: en esta estructura se 
                recibe el campo element.fecha esta dentro de un forEach de $data, 
                en otra estructura se puede llamar fechaCalificacion, solo
                se debe cambiar esto por element.fechaCalifiacion.*/
                /***********************************************************/

    function revisaCampos(e){
        e.preventDefault();

        //console.log(inputFormFiltroFecha.value);
        //console.log(inputFormFiltroPeriodo.value);
        if(inputFormFiltroFecha.value != "" && inputFormFiltroPeriodo.value != ""){
            const inputPeriodoForExam = formSelectFechaForExam.querySelector('.inputPeriodoForExam');
            inputPeriodoForExam.value = inputFormFiltroPeriodo.value;
            peticionAjaxFechas();
        }
    }

    //Esta funcion recibe el evento formFechasFiltro "submit" esto sucede cuando se presiona el boton type="submit"
    function consultaFechas(e) {
        e.preventDefault(); //evita que el botón recargue la página

        const formData = new FormData(this); //se recibe el form del cual se está haciendo el listener
            
        //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
        // TRUE: para deshabilitar los botones
        // FALSE: para habilitar los botones
        deshabilitarBotones(true);

        fetch(this.getAttribute("action"), {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json()) // "promesa" donde se espera la respuesta json desde el controlador de Laravel
        .then((response) => {
            if(response.error){
                displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
                deshabilitarBotones(false);
            }else{
                cargarLimpiezaDeTabla(tablaFechasTbody, "tablaFechas" ,"erroresDeTablaFechas");

                // después de recibir el valor de la respuesta json desde el controlador, se trabaja con los datos recibidos
                const data = response.data; // se obtiene el elemento data que contiene la información de las fechas

                const diasSemana = ["domingo","lunes","martes","miércoles","jueves","viernes","sábado",];
                const meses = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre",];

                data.forEach((element) => {
                    const fechaOriginal = new Date(element.fecha);
                    const diaSemana = diasSemana[fechaOriginal.getDay()];
                    const dia = fechaOriginal.getDate();
                    const mes = meses[fechaOriginal.getMonth()];
                    const anio = fechaOriginal.getFullYear();

                    const fechaFormateada = `${diaSemana} ${dia} de ${mes} del ${anio}`;
                    const row = document.createElement("tr");
                    const td = createTableCell(fechaFormateada, "fechaCampo");

                    const inputFechaElement = document.createElement('input');
                    inputFechaElement.type="hidden";
                    inputFechaElement.value = element.fecha;
                    inputFechaElement.setAttribute('style', 'display:none;');
                    inputFechaElement.className = "inputFechaElement";

                    const inputPeriodoElement = document.createElement('input');
                    inputPeriodoElement.type="hidden";
                    inputPeriodoElement.value = response.periodo;
                    inputPeriodoElement.setAttribute('style', 'display:none;');
                    inputPeriodoElement.className = "inputPeriodoElement";

                    td.appendChild(inputFechaElement);
                    td.appendChild(inputPeriodoElement);

                    row.appendChild(td);

                    tablaFechasTbody.appendChild(row);
                });

                // Inicialización de DataTables
                edicionDeTablas('tablaFechas', '', false, false, false, false, 5, [[5, 10, 15], [5, 10, 15]]);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                deshabilitarBotones(false); 
            }
        })
        .catch((error) => {
            //console.error("Error:", error);
            displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            deshabilitarBotones(false);
        }); 
    }


    function consultaExamenes(e){
        e.preventDefault(); //evita que el botón recargue la página

        const formData = new FormData(this); //se recibe el form del cual se está haciendo el listener

        //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
        // TRUE: para deshabilitar los botones
        // FALSE: para habilitar los botones
        deshabilitarBotones(true);

        fetch(this.getAttribute("action"), {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.error){
                displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
                deshabilitarBotones(false);
            }else{
                cargarLimpiezaDeTabla(tablaExamenesTbody, "tablaExamen" ,"erroresDeTablaExamenes");
                const data = response.data;
                
                data.forEach((element) => {
                    const row = document.createElement("tr");

                    const fieldOrder = {
                        tdCveMateria: createTableCell(element.cve_materia, "claveCampo"),
                        tdNombre_ing: createTableCell(element.nombre_ing, "materiaCampo"),
                        tdHora: createTableCell(element.hora, "horaCampo"),
                        tdSalon: createTableCell(element.salon, "salonCampo"),
                        tdTipo: createTableCell(element.tipo, "tipoCampo"),
                        tdNombre: createTableCell(element.nombre, "nombreCampo"),
                        tdNombre2: createTableCell(element.nombre, "nombreCampo2"),
                    };

                    const fieldKeys = Object.keys(fieldOrder);

                    fieldKeys.forEach((key) => {
                        const field = fieldOrder[key];
                        row.appendChild(field);
                    });

                    tablaExamenesTbody.appendChild(row);

                    //cargaFiltros(data);
                });

                // Inicialización de DataTables con paginación, scroll y buscador
                edicionDeTablas('tablaExamen', '200px', true, true, true, false, 5, [[5, 10, 15], [5, 10, 15]]);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                deshabilitarBotones(false);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            deshabilitarBotones(false);
        });
    }

    // Funcion para consulta de calificaciones, esta se ejecuta cunado se consulta las calificaiciones de una materia que se selecciona por primera vez
    // Llama a la funcion promesaDatosFormTablaCalificacinoes()
    function consultaCalificaciones(e){
      e.preventDefault();
      const formData = new FormData(this);
      promesaDatosFormTablaCalificacinoes(this.getAttribute("action"), formData); //this.getAttribute("action") representa la accion definida por route() en el form
    }

    // Funcion para la actualizacion de calificaciones esta se ejecuta cuando se captura o editan las califiaciones de una materia
    // esta funcion a diferencia de consultaCalificaiciones(), llama la funcion de validacion antes de pasar a la actualizacion de
    // estas califcaciones
    // Llama a la funcion promesaDatosFormTablaCalificacinoes()
    function updateCalificaciones(e){
        e.preventDefault();
        var validacion;

        validacion = validarCalificaciones(e);
        if(!validacion){
            //console.log("no paso la prueba");
            return;
        }
        const formData = new FormData(this);
        promesaDatosFormTablaCalificacinoes(this.getAttribute("action"), formData); //this.getAttribute("action") representa la accion definida por route() en el form
    }

    //Esta funcion solo define el fetch y .then para la recepcion y manejo de estos datos
    function promesaDatosFormTablaCalificacinoes(action, formData){
        //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
        // TRUE: para deshabilitar los botones
        // FALSE: para habilitar los botones
        deshabilitarBotones(true);

        fetch(action, {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((response) => {
            if(response.error){
                displayError("Datos de alumno erróneos", true, "erroresDeTablaCalificaciones");
                deshabilitarBotones(false);
            }else{
                cargarLimpiezaDeTabla(tablaCalificacionesTbody, "tablaCalificaciones" ,"erroresDeTablaCalificaciones");

                const data = response.data; //Se recogen los datos de response en $data
                //console.log(data);

                //Se recogen los datos recibidos en response de los campos definidos en el controlador
                const claveCampo_materia = response.claveCampo_materia;
                const nombreCampo_materia = response.nombreCampo_materia;

                //Los siguientes son campos escondidos en la tabla de captura de calificaciones
                //En estos campos se define el value recibido por respons

                //LARAVEL CON ESTRUCUTRA ORIGINAL
                //estos campos sirven para establecer unsa relacion entre los datos de la tabla de calificacion y para registrarlos 
                //es necesario actualizar estos datos y hacer la relacion en los controladores segun la estructura original
                const materiaCampoModal = document.getElementById("materiaCampoModal");
                const claveCampoModal = document.getElementById("claveCampooModal");
                materiaCampoModal.value = nombreCampo_materia;
                claveCampoModal.value = claveCampo_materia;

                //console.log(data);
                data.forEach((element) => { //Se manejan los datos recibidos
                    const row = document.createElement("tr");

                    //La siguiente constante es un booleano que evalua si todas las calificaciones de la consulta, ninguna es vacia
                    //En caso de ser vacia alguna significa que es la primera captura de calificaciones
                    //En caso de no ser vacia significa que ya se registraron calificaciones anteriormente
                    const todasLasCalificacionesNoNulas = data.every((element) => element.calificacion !== null && element.calificacion !== "");

                    //Se crea un objeto con la informacion de cada campo recibido y se registra en cada una de las celdas que se usaran
                    const fieldOrder = {
                        tdCveUnica: createTableCell(element.cve_unica, "cve_unicaModal"),
                        tdnombre: createTableCell(element.nombre + " " + element.paterno + " " + element.materno, "nombreModal"),
                        tdCalificacion: createTableCellCalificacion(element.calificacion, "calificacionModal", todasLasCalificacionesNoNulas),
                    };

                    //Se obtiene cada una de las keys(nombres) de los campos en el objeto
                    const fieldKeys = Object.keys(fieldOrder);

                    //Se itera sobre el array de keys del objeto y de esta manera ir registrando cada celda en su fila
                    fieldKeys.forEach(key => {
                        const field = fieldOrder[key];
                        row.className="fila-calificacion"; //Se asignan clases que ayudaran a identificar el row de la tabla de calificaciones
                        row.appendChild(field);
                    });
                    //row.appendChild(tdButton);

                    tablaCalificacionesTbody.appendChild(row);
                });

                // Inicialización de DataTables con paginación, scroll y buscador
                edicionDeTablas('tablaCalificaciones', '200px', true, false, true, false, null, []);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                deshabilitarBotones(false);
            }
        })
        .catch((error) => {
            //console.error("Error:", error);
            displayError("Error en la consulta de calificaciones", true, "erroresDeTablaCalificaciones");
            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            deshabilitarBotones(false);
        });
    }

    /********************************************************************************/
    /* Funciones: para la creacion de celdas 'td' en las tablas de la pantalla      */
    /* estas funciones son llamadas cuando se hace una cosulta nueva y se asignan   */
    /* nuevos datos a las tablas   
        Parametros:
            - content: es el contenido de los datos recibidos por controlador
            - className: es la clase con la que se identificara cada celda
    */
    /********************************************************************************/
    
    function createTableCell(content, className) {
        const td = document.createElement("td");
        td.className = className;
        td.textContent = content;
        //td.data-original-value="10"
    
        return td;
    }

    /* Parametros:
            - content: es el contenido de los datos recibidos por controlador, es la informacion que contendra la celda de la tabla
            - className: es la clase con la que se identificara cada celda
            - todasLasCalificacionesNoNulas: booleano con la evaluacion de si las calificaciones en alguna no existe el registro
                si en alguna no hay registro se considera como captura por primera vez, si no hay registro se considera como 
                editable
    */
    function createTableCellCalificacion(content, className, todasLasCalificacionesNoNulas){
        const td = document.createElement("td");
            td.className = className;
            td.textContent = content;
                if (todasLasCalificacionesNoNulas) { //Si no son nulas se agrega el boton para edicion en la celda de la calificacion
                    // Todos los elementos de calificacion no son nulos o vacíos

                    const inputCal = document.createElement("input");
                    const divIcon = document.createElement("div");
                    const buttonCaptura = document.createElement("button");

                    buttonCaptura.setAttribute("class", "w-100 h-100 btn btn-primary p-0");
                    buttonCaptura.disabled = false;
                    buttonCaptura.setAttribute("onclick", "transformarEnEditable(this)");
                    buttonCaptura.innerHTML = `
                    <i class='fas fa-edit'></i>
                    `;
                    divIcon.appendChild(buttonCaptura);

                    divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
                    divIcon.setAttribute("class", "position-absolute");

                    td.setAttribute("class", "d-flex align-items-center justify-content-center position-relative " + className);
                    td.appendChild(divIcon);
                } else { //Si no es editable se agrega el boton de captura de save, pero no es funcional solo es adorno para la celda, siginifica que es la primera captura
                    // Al menos uno de los elementos de calificacion es nulo o vacío
                    const inputCal = document.createElement("input");
                    const divIcon = document.createElement("div");
                    const buttonCaptura = document.createElement("button");

                    buttonCaptura.setAttribute("class", "w-100 h-100 btn p-0");
                    buttonCaptura.disabled = true;
                    buttonCaptura.innerHTML = `
                    <i class='fas fa-save' style='color:#b4b4b4'></i>
                    `;
                    divIcon.appendChild(buttonCaptura);

                    divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
                    divIcon.setAttribute("class", "position-absolute");

                    inputCal.setAttribute("class", "w-25 text-center");
                    inputCal.setAttribute("type", "text");
                    inputCal.setAttribute("style", "cursor: pointer!important;border-top:none!important;border-right:none!important;border-left:none!important;background-color:transparent!important;");

                    td.setAttribute("class", "d-flex align-items-center justify-content-center position-relative " + className);
                    td.appendChild(inputCal);
                    td.appendChild(divIcon);

                }

        return td;
    }


    /********************************************************************************/
    /* Peticiones con AJAX                                                          */
    /********************************************************************************/
 
    function peticionAjaxFechas(){
        // Crear objeto XMLHttpRequest
        const xhr = new XMLHttpRequest();

        // Configurar la solicitud AJAX
        xhr.open("POST", '{{ route('getFechas') }}'); // Especifica la ruta del script
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Manejar la respuesta de la solicitud
        xhr.onload = function() {
            if (xhr.status === 200) {
                cargarLimpiezaDeTabla(tablaFechasTbody, "tablaFechas" ,"erroresDeTablaFechas");

                //console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                //console.log(response);
                const data = response.data; // se obtiene el elemento data que contiene la información de las fechas

                const diasSemana = ["domingo","lunes","martes","miércoles","jueves","viernes","sábado"];
                const meses = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre",];

                data.forEach((element) => {
                    const fechaOriginal = new Date(element.fecha);
                    const diaSemana = diasSemana[fechaOriginal.getDay()];
                    const dia = fechaOriginal.getDate();
                    const mes = meses[fechaOriginal.getMonth()];
                    const anio = fechaOriginal.getFullYear();

                    const fechaFormateada = `${diaSemana} ${dia} de ${mes} del ${anio}`;
                    const row = document.createElement("tr");
                    const td = createTableCell(fechaFormateada, "fechaCampo");

                    const inputFechaElement = document.createElement('input');
                    inputFechaElement.type="hidden";
                    inputFechaElement.value = element.fecha;
                    
                    inputFechaElement.setAttribute('style', 'display:none;');
                    inputFechaElement.className = "inputFechaElement";

                    //const inputPeriodoElement = document.createElement('input');
                    //inputPeriodoElement.type="hidden";
                    //inputPeriodoElement.value = response.periodo;
                    //inputPeriodoElement.setAttribute('style', 'display:none;');
                    //inputPeriodoElement.className = "inputPeriodoElement";

                    td.appendChild(inputFechaElement);
                    //td.appendChild(inputPeriodoElement);

                    row.appendChild(td);

                    tablaFechasTbody.appendChild(row);
                });

                // Inicialización de DataTables con paginación, scroll y buscador
                edicionDeTablas('tablaFechas', '', false, false, false, false, 5, [[5, 10, 15], [5, 10, 15]]);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                //deshabilitarBotones(false);
            } else {
                //console.error("Error en la solicitud. Código de estado: " + xhr.status);
                displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
            }
        };

        // Capturar errores en la solicitud
        xhr.onerror = function() {
            //console.error("Error en la solicitud");
            displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
        };

        // Obtener los datos del formulario
        const formData = new FormData(formFechasFiltro);

        // Convertir los datos del formulario en una cadena de consulta URL codificada
        const encodedData = new URLSearchParams(formData).toString();

        // Enviar la solicitud AJAX con los datos del formulario
        xhr.send(encodedData);
    }

    function peticionAjaxExamenes(){
        // Crear objeto XMLHttpRequest
        const xhr = new XMLHttpRequest();

        // Configurar la solicitud AJAX
        xhr.open("POST", '{{ route('getExamenes') }}'); // Especifica la ruta del script
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Manejar la respuesta de la solicitud
        xhr.onload = function() {
            if (xhr.status === 200) {
                cargarLimpiezaDeTabla(tablaExamenesTbody, "tablaExamen" ,"erroresDeTablaExamenes");

                //console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                //console.log(response);
                const data = response.data;

                data.forEach((element) => {
                    const row = document.createElement("tr");

                    const fieldOrder = {
                        tdCveMateria: createTableCell(element.cve_materia, "claveCampo"),
                        tdNombre_ing: createTableCell(element.nombre_ing, "materiaCampo"),
                        tdHora: createTableCell(element.hora, "horaCampo"),
                        tdSalon: createTableCell(element.salon, "salonCampo"),
                        tdTipo: createTableCell(element.tipo, "tipoCampo"),
                        tdNombre: createTableCell(element.nombre, "nombreCampo"),
                        tdNombre2: createTableCell(element.nombre, "nombreCampo2"),
                    };

                    const fieldKeys = Object.keys(fieldOrder);

                    fieldKeys.forEach((key) => {
                        const field = fieldOrder[key];
                        row.appendChild(field);
                    });

                    tablaExamenesTbody.appendChild(row);

                    //cargaFiltros(data);
                });

                // Inicialización de DataTables con paginación, scroll y buscador
                edicionDeTablas('tablaExamen', '200px', true, true, true, false, 5, [[5, 10, 15], [5, 10, 15]]);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                //deshabilitarBotones(false);
            } else {
                //console.error("Error en la solicitud. Código de estado: " + xhr.status);
                displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
            }
        };

        // Capturar errores en la solicitud
        xhr.onerror = function() {
            //console.error("Error en la solicitud");
            displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes")
        };

        // Obtener los datos del formulario
        const formData = new FormData(formSelectFechaForExam);

        // Convertir los datos del formulario en una cadena de consulta URL codificada
        const encodedData = new URLSearchParams(formData).toString();

        // Enviar la solicitud AJAX con los datos del formulario
        xhr.send(encodedData);
    }

    function peticionAjaxCalificaciones(){
        deshabilitarBotones(true);
        // Crear objeto XMLHttpRequest
        const xhr = new XMLHttpRequest();

        // Configurar la solicitud AJAX
        xhr.open("POST", '{{ route('getCalificaciones') }}'); // Especifica la ruta del script
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Manejar la respuesta de la solicitud
        xhr.onload = function() {
            if (xhr.status === 200) {
                cargarLimpiezaDeTabla(tablaCalificacionesTbody, "tablaCalificaciones" ,"erroresDeTablaCalificaciones");

                //console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                //console.log(response);
                const data = response.data; //Se recogen los datos de response en $data
                //console.log(data);

                //Se recogen los datos recibidos en response de los campos definidos en el controlador
                const claveCampo_materia = response.claveCampo_materia;
                const nombreCampo_materia = response.nombreCampo_materia;

                //Los siguientes son campos escondidos en la tabla de captura de calificaciones
                //En estos campos se define el value recibido por respons

                //LARAVEL CON ESTRUCUTRA ORIGINAL
                //estos campos sirven para establecer unsa relacion entre los datos de la tabla de calificacion y para registrarlos 
                //es necesario actualizar estos datos y hacer la relacion en los controladores segun la estructura original
                const materiaCampoModal = document.getElementById("materiaCampoModal");
                const claveCampoModal = document.getElementById("claveCampooModal");
                materiaCampoModal.value = nombreCampo_materia;
                claveCampoModal.value = claveCampo_materia;

                //console.log(data);
                data.forEach((element) => { //Se manejan los datos recibidos
                    const row = document.createElement("tr");

                    //La siguiente constante es un booleano que evalua si todas las calificaciones de la consulta, ninguna es vacia
                    //En caso de ser vacia alguna significa que es la primera captura de calificaciones
                    //En caso de no ser vacia significa que ya se registraron calificaciones anteriormente
                    const todasLasCalificacionesNoNulas = data.every((element) => element.calificacion !== null && element.calificacion !== "");

                    //Se crea un objeto con la informacion de cada campo recibido y se registra en cada una de las celdas que se usaran
                    const fieldOrder = {
                        tdCveUnica: createTableCell(element.cve_unica, "cve_unicaModal"),
                        tdnombre: createTableCell(element.nombre + " " + element.paterno + " " + element.materno, "nombreModal"),
                        tdCalificacion: createTableCellCalificacion(element.calificacion, "calificacionModal", todasLasCalificacionesNoNulas),
                    };

                    //Se obtiene cada una de las keys(nombres) de los campos en el objeto
                    const fieldKeys = Object.keys(fieldOrder);

                    //Se itera sobre el array de keys del objeto y de esta manera ir registrando cada celda en su fila
                    fieldKeys.forEach(key => {
                        const field = fieldOrder[key];
                        row.className="fila-calificacion"; //Se asignan clases que ayudaran a identificar el row de la tabla de calificaciones
                        row.appendChild(field);
                    });
                    //row.appendChild(tdButton);

                    tablaCalificacionesTbody.appendChild(row);
                });

                // Inicialización de DataTables con paginación, scroll y buscador
                edicionDeTablas('tablaCalificaciones', '200px', true, false, true, false, null, []);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                deshabilitarBotones(false);

                //console.log(filasConsulta);

            } else {
                //console.error("Error en la solicitud. Código de estado: " + xhr.status);
                displayError("Datos de alumno erróneos", true, "erroresDeTablaCalificaciones");
                deshabilitarBotones(false);
            }
        };

        // Capturar errores en la solicitud
        xhr.onerror = function() {
            //console.error("Error en la solicitud");
            displayError("Consulta de calificaciones fallida", true, "erroresDeTablaCalificaciones");
            deshabilitarBotones(false);
        };

        // Obtener los datos del formulario
        const formData = new FormData(formMateriaConsulta);

        // Convertir los datos del formulario en una cadena de consulta URL codificada
        const encodedData = new URLSearchParams(formData).toString();

        // Enviar la solicitud AJAX con los datos del formulario
        xhr.send(encodedData);
    }

    /********************************************************************************/
    /* Funcion para la seleccion de una fila en la tabla de examenes-materia        */
    /* al seleccionar una materia esta se asigna en cada campo del form de materia  */
    /* donde esta el boton para la consulta de calificaciones                       */
    /********************************************************************************/

    function seleccionarExamen(e) {
        e.preventDefault();
        
        //Cuando ocurre la selecion de una materia se hace sobre una celda(td) por lo que sera necesario obtener su padre
        const materiaSeleccionada = e.target.parentElement;
        const tds = Array.from(materiaSeleccionada.children); //Se hace un array con todos los datos del padre, es decir cada celda
    
        if(tds){
            //Se hace un objeto con los campos que seran llenados con la informacion de la materia seleccionada
            const fieldOrder = {
                    materiaCampo: document.getElementById("materiaCampo"),
                    tipoCampo: document.getElementById("tipoCampo"),
                    salonCampo: document.getElementById("salonCampo"),
                    nombreCampo: document.getElementById("nombreCampo"),
                    nombreCampo2: document.getElementById("nombreCampo2"),
                    claveCampo: document.getElementById("claveCampo"),
            };
            
            //Se obtienes las keys(nombres) de los campos del objetos creado anteriormente
            const fieldKeys = Object.keys(fieldOrder);
        
            //Se hace un forEach sobre los tds obtenidos
            tds.forEach(td => {
                //Se itera osbre el array de llaves para identificar cada campo del objeto
                fieldKeys.forEach(key => {
                    //Se evalua si la iteracion del td coincide con la iteracion de las keys
                if(td.classList.contains(key)) { //SI coincide se registra la informacion dentro de la celda
                    const contenido = td.textContent;
                    const field = fieldOrder[key];
                    field.value = contenido;
                }
                });
            });

            //botonCalificaciones.click();
            peticionAjaxCalificaciones();

            //form.submit();

      }else{
            displayError("Sin datos para consultar", true, "erroresDeTablaExamenes");
      }
  
    }



    function seleccionarFecha(e) {
        e.preventDefault();
    
        //Cuando ocurre la selecion de una materia se hace sobre una celda(td) por lo que sera necesario obtener su padre
        const fechaSeleccionada = e.target.parentElement;
        const valueFecha = fechaSeleccionada.querySelector('.inputFechaElement');

        //const valuePeriodo = fechaSeleccionada.querySelector('.inputPeriodoElement');
        //console.log(buttonfechaForExam);
        //const tds = Array.from(fechaSeleccionada.children); //Se hace un array con todos los datos del padre, es decir cada celda

        //const formSelectFechaForExam = document.getElementById("formSelectFechaForExam");
        //const inputFechaForExam = formSelectFechaForExam.querySelector('.inputFechaForExam');
        //const inputPeriodoForExam = formSelectFechaForExam.querySelector('.inputPeriodoForExam');

        //const buttonfechaForExam = document.getElementById("buttonfechaForExam");
        //const inputFechaForExam = document.getElementById("formSelectFechaForExam");
        
        //console.log(inputFechaForExam);
        //console.log(inputFechaForExam);
        if(valueFecha){
            const infoTablaExamenes = document.getElementById("infoTablaExamenes"); 
            const inputPeriodoForExam = formSelectFechaForExam.querySelector('.inputPeriodoForExam');

            const inputFechaForExam = formSelectFechaForExam.querySelector('.inputFechaForExam');
            //console.log(inputFechaForExam.parentNode);
            inputFechaForExam.value = valueFecha.value.trim();

            infoTablaExamenes.setAttribute("style", "color:lightgray;"); 
            const fechaCompleta = inputFechaForExam.value;
            const partesFecha = fechaCompleta.split(" ");
            const fecha = partesFecha[0];
            //console.log(fecha);
            const cadenaFinal = `Fecha: ${fecha} Periodo: ${inputPeriodoForExam.value}`;
            infoTablaExamenes.textContent = cadenaFinal;

            peticionAjaxExamenes();
        }else{
            displayError("Sin datos para consultar", true, "erroresDeTablaFechas");
        }
        //inputPeriodoForExam.value = valuePeriodo.value.trim();
        //inputFechaForExa
        //console.log(inputFechaForExam.value);

        //buttonfechaForExam.click();
        //formSelectFechaForExam.submit();
        //console.log(inputFechaForExam.value);
        //console.log(formSelectFechaForExam);

        
    }

    /********************************************************************************/
    /* Fuinciones de carga y limpieza                                                */
    /********************************************************************************/

    // Funcion para la limpieza de una tabla cuando esta ya tiene datos y se quiere
    // cargar nuevos datos                                                          
    function limpiarHTML(node) {
        // Forma lenta e insegura
        // node.innerHTML = '';

        // Forma rápida
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }

    //Funcion para desahbilitar o habilitar los botones cuando se hace una consulta de cualquiera de los form
    //de la pantalla
    function deshabilitarBotones(content){
        botonCalificaciones.disabled = content;
        //botonExamenes.disabled = content;
        //botonFechas.disabled = content;
        botonGuardar.disabled = content;
    }

    function displayError(textContent, deshabiltar, tipoError){
        if(deshabiltar === false){
            const error = document.getElementById(tipoError);
            error.setAttribute('style', 'display:none;');
            error.innerHTML = ``;
            return;
        }
        const error = document.getElementById(tipoError);
        error.setAttribute('style', 'display:block;');
        error.innerHTML=`
        <div class="mt-1 bg-danger p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
            ${textContent}     
        </div>
        `;
    }

    function cargarLimpiezaDeTabla(tablaTbody, tabla, tipoError){
        // Destruir la instancia de DataTables existente
        if ($.fn.DataTable.isDataTable("#"+tabla)) {
            $("#"+tabla).DataTable().destroy();
        }
        limpiarHTML(tablaTbody); //Se limpia la tabla en caso de haber datos ya consultados
        displayError("", false, tipoError);
    }

    function edicionDeTablas(tabla, scrollY, scrollCollapse, paging, searching, info, pageLength, lengthMenu){
        // Inicialización de DataTables con paginación, scroll y buscador
        $('#'+tabla).DataTable({
            scrollY: scrollY,
            scrollCollapse: scrollCollapse,
            paging: paging, // Habilitar paginación
            searching: searching, // Habilitar el buscador
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            },
            info: info,
            pageLength : pageLength,
            lengthMenu: lengthMenu
        });
    }


    /********************************************************************************/
    /* Funuciones: Para validacion de las calificaciones cuando estas son           */
    /* capturadas por primera vez o se quiere editar las calificaciones             +/
    /********************************************************************************/
    function validarCalificaciones(e) {
        e.preventDefault(); //previene la accion por defecto
        //const tablaCalificaciones = document.getElementById('tablaCalificaciones');
        //console.log(tablaCalificaciones);
        //S obtienen todas las filas de la tabla de calificaciones segun la clase asignada "fila-calificacion"
        const filas = document.getElementsByClassName('fila-calificacion');
        let evaluaCalificaciones = true; //bandera para identificar cuando existe un error
        const datosCalificaciones = []; //array donde se guardara la cve_unica y la calificacion
        var validacion = true; //bandera para indicar al form si se logro la validacion o no

        for (let i = 0; i < filas.length; i++) { //Se itera sobre las filas
            const fila = filas[i]; 
            const celdaClave = fila.querySelector('.cve_unicaModal'); //se obtiene la clave unica segun la fila que se esta iterando
            const celdaCalificacion = fila.querySelector('.calificacionModal'); //Se obtien la calificaion seguna la fila en la que se esta iterando

            const clave = celdaClave.textContent.trim(); //se obtiene el contenido de la celda, cve_unica
            const inputCalificacion = celdaCalificacion.querySelector('input'); //Se obtiene el contenido de la celda, calificacion

            const buscadorDeTabla = document.getElementById("tablaCalificaciones_filter").querySelector("input");
            //console.log(buscadorDeTabla);
            //Se identifica si la celda contiene un input o solo es texto, esto ayudara a poder evaluar la celda cuando un usuario no 
            //finaliza la edicion de una calificacion, se podran leer celdas tanto con inputs como con solo texto y obtener su valor
            var calificacion = inputCalificacion ? inputCalificacion.value.trim() : celdaCalificacion.textContent.trim();

            if (!calificacion) {
                // La calificación está vacía
                evaluaCalificaciones = false;
                mostrarAdvertencia(celdaCalificacion, 'Asigna una calificación');
            } else if (!validarRangoCalificacion(calificacion)) {
                // La calificación no está dentro del rango válido
                evaluaCalificaciones = false;
                mostrarAdvertencia(celdaCalificacion, 'Asigna una calificación valida: 0-10, AC o NP');
            }else if (buscadorDeTabla.value !== ''){
                evaluaCalificaciones = false;
                mostrarAdvertencia(celdaCalificacion, 'Debes asignar una calificación a todos los alumnos');
            } else {
                // La calificación es válida, elimina cualquier advertencia anterior
                eliminarAdvertencia(celdaCalificacion);

                const isNumeric = n => !isNaN(n);
                if(isNumeric(calificacion)){
                    calificacionValue = parseInt(calificacion, 10);
                    calificacion = calificacionValue.toString();
                }
                //console.log(calificacion)
                datosCalificaciones.push({ clave, calificacion });
            }
        }

        if (evaluaCalificaciones) {
            // Todas las calificaciones son válidas
            const form = document.getElementById('formCalificaciones');
            //const form = new FormData(this);

            // Todas las calificaciones son válidas, se asignan los datos al formulario
            const inputDatosCalificaciones = document.createElement('input');
            inputDatosCalificaciones.setAttribute('type', 'hidden');
            inputDatosCalificaciones.setAttribute('name', 'datosCalificaciones');
            inputDatosCalificaciones.value = JSON.stringify(datosCalificaciones);
            form.appendChild(inputDatosCalificaciones);

            //console.log(datosCalificaciones);

            validacion = true;
        } else {
            //Las calificaciones no son validas
            validacion = false;
        }

        //Se retorna el resultado de la validacion
        return validacion;
    }

    
    function validarRangoCalificacion(calificacion) {
        const calificacionesValidas = ['AC', 'NP']; //array con las posibilidades de registro en caso de no ser nuemeros
        //var valoresAceptados = /^([1-9]|10)$/;
        const valorNumerico = parseInt(calificacion); //se convierte a numero el string de la calficacioon
        const isNumeric = n => !isNaN(n); //constante que permite evaluar que un string con numeros y letras solo haya numeros
        
        if (calificacionesValidas.includes(calificacion)) {
            return true; // La calificación es válida (AC o NP)
        } else if (!isNaN(valorNumerico) && valorNumerico >= 0 && valorNumerico <= 10 && isNumeric(calificacion)) {
            return true; // La calificación es válida (1-10)
        }
        return false; // La calificación no cumple con el rango válido
    }

    //Parametros:
        //- celda: celda donde se realizara la advertencia
        //- content: es el mensaje que mostrara la adevertencia
    function mostrarAdvertencia(celda, content) {//Esta funcion creara el simbolo de advertencia on un tooltip para mostrar un mensaje
        eliminarAdvertencia(celda);
        const divAdvertencia = document.createElement('div');
        divAdvertencia.setAttribute('class', 'advertenciaCalificacion');
        divAdvertencia.setAttribute('style', 'height:17px;width:17px;margin-left:5px;');
        divAdvertencia.innerHTML = `<i data-bs-toggle="tooltip" data-bs-placement="top" title="${content}"  class='fas fa-info-circle' style='color: red;cursor:pointer;'></i>`;
        celda.appendChild(divAdvertencia);
    }

    //Esta funcion limpia la advertecia
    function eliminarAdvertencia(celda) {
        const divAdvertencia = celda.querySelector('.advertenciaCalificacion');
        if (divAdvertencia) {
            celda.removeChild(divAdvertencia);
        }
    }
</script>
  
  
<script>
    /*
    //Esta funcion sirve para evaluar si los campos no para la obtenciona de las fechas y las materias
    //Estan llenos de no ser asi, los botones se deshabilitan

    //Se obtiene los elementos del formulario para el filtrado de fechas
    //Junto con el boton de submit
    const form = document.getElementById('formFiltroFechas');
    const cicloEscolarInput = document.getElementById('ciclo_escolar');
    const periodoInput = document.getElementById('periodo');
    const submitButtonFechas = document.getElementById('fechasbutton');
    const submitButtonExamenes = document.getElementById('examenesbutton');
  
    // Función para verificar si los campos tienen valores seleccionados
    function verificarCampos() {
      const cicloEscolar = cicloEscolarInput.value;
      const periodo = periodoInput.value;
  
      if (cicloEscolar && periodo) {
        submitButtonFechas.disabled = false; // Habilitar el botón si ambos campos tienen valores
        submitButtonExamenes.disabled = false;
      } else {
        submitButtonFechas.disabled = true; // Deshabilitar el botón si alguno de los campos está vacío
        submitButtonExamenes.disabled = true;
      }
    }
  
    // Se agrega el evento 'change' a los campos y se llama a la funcion verificarCampos
    // De esta manera se espera a que los inputs tengan un cambio para habilitar los botones
    cicloEscolarInput.addEventListener('change', verificarCampos);
    periodoInput.addEventListener('change', verificarCampos);
  
    // Se verifican los campos iniciales al cargar la pagina
    verificarCampos();
    */
</script>


<script>
    //Estas funcion solo se encargan de dar estilo al boton segun la edicion, 
    //Es decir cuando se presion en el boton de editar calificacion, se agregan los estilos
    //en la funcion transformaEnEditable() aqui tambien se agrega el evento "onclick", "finalizarEdicion(this)"
    //para el nuevo boton editado.
    function transformarEnEditable(nodo){
            
            var nodoTd = nodo.parentNode.parentNode; //Nodo TD

            const inputCal = document.createElement("input");
            const divIcon = document.createElement("div");
            const buttonCaptura = document.createElement("button");

            var calificacion = nodoTd.textContent.trim();
            nodoTd.textContent = "";
            inputCal.value = calificacion;
            inputCal.setAttribute("class", "w-25 text-center");
            inputCal.setAttribute("type", "text");
            inputCal.setAttribute("style", "cursor: pointer!important;border-top:none!important;border-right:none!important;border-left:none!important;background-color:transparent!important;");

            buttonCaptura.setAttribute("class", "w-100 h-100 btn btn-success p-0");
            buttonCaptura.disabled = false;
            buttonCaptura.setAttribute("onclick", "finalizarEdicion(this)");
            buttonCaptura.innerHTML = `
            <i class='fas fa-check'></i>
            `;
            divIcon.appendChild(buttonCaptura);

            divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
            divIcon.setAttribute("class", "position-absolute");

            nodoTd.appendChild(divIcon);
            nodoTd.appendChild(inputCal);
    }

    function finalizarEdicion(nodo){
        var nodoTd = nodo.parentNode.parentNode; //Nodo TD

        const divIcon = document.createElement("div");
        const buttonCaptura = document.createElement("button");

        const inputCal = nodoTd.querySelector("input");
        var calificacion = inputCal.value;
        nodoTd.textContent = calificacion;
        inputCal.remove();

        buttonCaptura.setAttribute("class", "w-100 h-100 btn btn-primary p-0");
        buttonCaptura.disabled = false;
        buttonCaptura.setAttribute("onclick", "transformarEnEditable(this)");
        buttonCaptura.innerHTML = `
        <i class='fas fa-edit'></i>
        `;
        divIcon.appendChild(buttonCaptura);

        divIcon.setAttribute("style", "height:26px;width:26px;top:25%;left:85%;");
        divIcon.setAttribute("class", "position-absolute");

        nodoTd.appendChild(divIcon);
    }
</script>
@stop