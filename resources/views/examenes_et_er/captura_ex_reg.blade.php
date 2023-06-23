@extends('adminlte::page')

@section('title', 'Listado de Exámenes')

@section('content_header')
    <h1>Captura de Examenes a Regularización</h1>
@stop

@section('content')
<div class="row">
    <div class="col-4 d-flex flex-column">
        <div class="card w-100 h-100">
            <div class="card-body">
                <!--
                <form action="" class="m-0 p-0">
                -->
                <form id="formFiltroFechas" method="POST" action="{{route('getTipoConsulta')}}" class="m-0 p-0">
                    @csrf

                    <input type="hidden" name="tipoConsulta" id="tipoConsulta">

                    <div class="row">
                        <div class="col-6">
                            <label for="ciclo_escolar" class="m-0 form-label fw-light">Ciclo Escolar</label>
                            <select name="ciclo_escolar" id="ciclo_escolar" class="mb-1 form-select form-control">
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
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <label for="periodo" class="m-0 form-label fw-light">Periodo</label>
                            <select name="periodo" id="periodo" class="mb-1 form-select form-control">
                                <option value="" selected>Periodo</option>
                                <option value="EXAMENES A TITULO">EXAMENES A TITULO</option>
                                <option value="EXAMENES A REGULARIZACION">EXAMENES A REGULARIZACION</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6 ">
                            <button type="submit" id="fechasbutton" class="btn-sm bg-dark form-control">Listar Fechas</button>
                        </div>
                    </div>
                
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped dataTable dtr-inline tablas_pago"  id="tablaFechas">
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
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-6">
                            <button type="submit" id="examenesbutton" class="btn-sm bg-dark form-control">Listar Exámenes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-8 d-flex flex-column">
            <div class="card w-100 h-100">
                <div class="card-body">
                    <table id="tablaExamen" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th scope="col">Clave</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Salon</th>
                                <th scope="col">Ex</th>
                                <th scope="col">Sinodal Titular</th>
                                <th scope="col">Sinodal Secretario</th>
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
            
            <div class="card w-100 h-100">
                <div class="card-body">
                    <!--
                    <form action="">
                    -->
                    <form id="camposMateriaInfo" method="POST" action="{{route('getCalificaciones')}}">
                        @csrf
                        <div class="m-0 row w-100 mt-1 border p-2">
                          <div class="col-5 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="materiaCampo" class="m-0 form-label fw-light">Materia</label>
                              <input readonly name="materiaCampo" id="materiaCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-2 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="tipoCampo" class="m-0 form-label fw-light">Tipo de Examen</label>
                              <input readonly name="tipoCampo" id="tipoCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-5 p-0 d-flex flex-column">
                            <div>
                              <label for="salonCampo" class="m-0 form-label fw-light">Salon</label>
                              <input readonly name="salonCampo" id="salonCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-5 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="nombreCampo" class="m-0 form-label fw-light">Sinodal Titular</label>
                              <input readonly name="nombreCampo" id="nombreCampo" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-5 p-0 d-flex flex-column">
                            <div style="padding-right:10px;">
                              <label for="nombreCampo2" class="m-0 form-label fw-light">Sinodal Secretario</label>
                              <input readonly name="nombreCampo2" id="nombreCampo2" type="text" class="form-control">
                            </div>
                          </div>
                          
                          <input readonly name="claveCampo" id="claveCampo" type="hidden" class="form-control">
              
                          <div class="col-2 p-0 d-flex flex-column mt-4">
                            <div class="w-100">
                              <button type="submit" id="calificacionesbutton" class="w-100 mb-3 btn btn-dark">calificaciones</button>
                            </div>
                          </div>
                        </div>
                    </form>

                    <form method="POST" action="{{route('updateCalificaciones')}}" id="formCalificaciones">
                        
                        @csrf
                        <input type="hidden" name="materiaCampo" id="materiaCampoModal">
                        <input type="hidden" name="claveCampo" id="claveCampooModal">
      
                        <div style="">
                        
                            <table id="tablaCalificaciones" class="table table-bordered table-striped dataTable dtr-inline">
                              <thead class="">
                                <tr>
                                  <th scope="col">UASLP</th>
                                  <th scope="col">Nombre de Alumno</th>
                                  <th scope="col">Calificacion</th>
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
      
                        <div class=" d-flex flex-row align-items-center justify-content-start w-100">
                          <button id="guardarCalificaciones" style="" type="submit" class="px-5 m-0 btn-success btn-sm mt-2">Guardar</button>
                        </div>
      
                        <div id="contenedorForm">
      
                        </div>
      
                    </form>

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

    #tablaFechasTbody td{
        display: flex;
        align-items: center;
        justify-content: center;
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

    #tablaCalificaciones{
        border-top: none!important;
        border-bottom: none!important;
    }
    .sin-borde {
        border: none!important;
        background-color: white!important; 
        width: 15px!important;
    }
</style>
@stop

@section('js')
<script>
    //Constantes para cada form de Consulta
	/* Tres form en total:
		formFechasFiltro: para los campos de ciclo-escolar y periodo, este form hace la consulta para la tabla de Fechas y Examenes-Materia
		formMateriaConsulta: cundo se selecciona una de las materias, este form se encarga de recibir la informacion y con ella hacer la consulta para la tabla calificaciones.
		formCalificaciones: Este form recibe la informacion de materia y realiza el update de calificaciones.
	*/
    const formFechasFiltro = document.getElementById("formFiltroFechas");
    const formMateriaConsulta = document.getElementById("camposMateriaInfo");
    const formCalificaciones = document.getElementById("formCalificaciones");
  
    //Constantes para identificar cada tbody de las tablas de la pantalla
	//Estos tobody ayudaran a identificar, donde se colocaran las consultas de base de datos
    const tablaFechasTbody = document.querySelector("#tablaFechas tbody");
    const tablaExamenesTbody = document.querySelector("#tablaExamen tbody");
    const tablaCalificacionesTbody = document.querySelector("#tablaCalificaciones tbody");
  
    //Constantes para algunos botones de la pantalla
	//Estos botones, ademas de hacer el submit en sus respectivos form, se encargan de realizar otra accion
	//por ello son declarados para manejar estos eventos.
    const botonFechas = document.querySelector("#fechasbutton");
    const botonExamenes = document.querySelector("#examenesbutton");
    const botonGuardar = document.querySelector('#guardarCalificaciones');

    //Constant para un input dentro del form de fechas(Ciclo-escolar, periodo)
	//este input sirvira para identificar la consulta que se hara, 
	//es decir para la tabla de fechas o la tabla examenes-materia
    const tipoConsulta = document.querySelector("#tipoConsulta");
  
    //Esta funcion permite englobar cada uno de los listener que se usuaran para la dinamica de la pagina
    cargarEventListener();
    function cargarEventListener() {
        // Estos listener cambian el valor del input escondido en el form (ciclo-escolar, periodo) para la el tipo de consulta que se hara
        botonFechas.addEventListener("click", () => {
            tipoConsulta.value = "fecha";
        });
        botonExamenes.addEventListener("click", () => {
            tipoConsulta.value = "examen";
        });
  
        //Estos listener se les asigna un evento y la funcion que se ejecutara cuando suceda el evento
		
		//Listener para el evento de submit de cada form cuando se hace la consulta a base de datos
        formFechasFiltro.addEventListener("submit", consultaFechas);
        formMateriaConsulta.addEventListener("submit", consultaCalificaciones);
        formCalificaciones.addEventListener("submit", updateCalificaciones);

        //Listener para la dinamica de seleccion de una materia en la tabla de (examenes-materia) 
        tablaExamenesTbody.addEventListener("click", seleccionarExamen);


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

    //Esta funcion recibe el evento formFechasFiltro "submit" esto sucede cuando se presiona el boton type="submit"
    function consultaFechas(e) {
        e.preventDefault(); //evita que el boton recargue la pagina

        const formData = new FormData(this); //se recibe el form del cual se esta haciendo el listener
  
        if (tipoConsulta.value === "fecha") { // se evalua el valor del input escondido en el form para saber que tipo de consulta realizar (fecha o examen)
            limpiarHTML(tablaFechasTbody); // Se llama a la funcion de limpiar en caso de que esten datos ya consultados en la tabla 
  
            fetch(this.getAttribute("action"), {  //this.getAttribute("action") representa la accion definida por route() en el form
                //se construye la peticion asincrona
                method: "POST",
                body: formData,
            })
            .then((response) => response.json()) //"promesa" donde se espera la respuesta json desde el controlador de laravel
            .then((response) => { //despues de recibir el valor de la respues json desde el controlador se trabaja con los datos recibidos
            
                /*En este caso se obtiene la informacion de reponse en el objeto o array $data*/
                const data = response.data; //se obtiene el elemento data que contiene la informacion de las fechas

                //se define dos arrays para dar formato a las fechas obtenidas
                const diasSemana = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
                const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

                data.forEach((element) => { // se recorre cada valor recibo, en este caso las fechas

                    //Se da formato a las fechas 
                    const fechaOriginal = new Date(element.fecha);
                    const diaSemana = diasSemana[fechaOriginal.getDay()];
                    const dia = fechaOriginal.getDate();
                    const mes = meses[fechaOriginal.getMonth()];
                    const anio = fechaOriginal.getFullYear();
  
                    /*En estas lineas de codigo
                        - Se guarda la fecha formateada
                        - Se crea un elemnto tr llamada row
                        - Se crea un elemento td llamndo a la funcion createTableCell(fechaFormateada, "fechaCampo"); llamada td
                        - Al constante row (tr) se le agrega el elemento td creado anteriormente - appendChild()
                    */
                    const fechaFormateada = `${diaSemana} ${dia} de ${mes} del ${anio}`;
                    const row = document.createElement("tr");
                    const td = createTableCell(fechaFormateada, "fechaCampo");
                    row.appendChild(td);


                    /*A la constante tablaFechasTbody se le agrega el elemento row(tr)*/
                    tablaFechasTbody.appendChild(row);
                });
            })
            .catch((error) => { //en caso de tener un error se ejecuta lo siguiente, en este caso nose trabaja el error solo se muestra un cosole.log()
                console.error("Error:", error);
            });
        } else if (tipoConsulta.value === "examen") {
            limpiarHTML(tablaExamenesTbody); //Se llama a la funion de limpiarHTML en caso de tener elemntos consultados anteriormente
  
            fetch(this.getAttribute("action"), {
                method: "POST",
                body: formData,
            })
            .then((response) => response.json())
            .then((response) => {

                const data = response.data; //se obtiene el $data de los datos consultados

                data.forEach((element) => { //Se recorre el $data para asignar cada valor recibido
                    //Se crear un row donde se guaradra la informacion de cada celda de la tabla 
                    const row = document.createElement("tr");
  
                    //se contruye un objeto con la informacion de los datos recibidos
                    //en cada uno de estos se llama a la funcion createTableCell() que retorna un elemento td
                    const fieldOrder = {
                        tdCveMateria: createTableCell(element.cve_materia, "claveCampo"),
                        tdNombre_ing: createTableCell(element.nombre_ing, "materiaCampo"),
                        tdHora: createTableCell(element.hora, "horaCampo"),
                        tdSalon: createTableCell(element.salon, "salonCampo"),
                        tdTipo: createTableCell(element.tipo, "tipoCampo"),
                        tdNombre: createTableCell(element.nombre, "nombreCampo"),
                        tdNombre2: createTableCell(element.nombre, "nombreCampo2"),
                    };
  
                    //Se obtiene la llave dentro del objeto de cada td creado, esta servira para identificar cada celda y su valor
                    const fieldKeys = Object.keys(fieldOrder);
  
                    //se recorre el array de llaves y se busca dentro del objeto el valor que coincida con la llave fieldOrder[key]
                    //cuando este coinicida, se hace un appendChild() en el row de este valor encontrado.
                    fieldKeys.forEach(key => {
                        const field = fieldOrder[key];
                        row.appendChild(field);
                    });
  
                    /*A la constante tablaFechasTbody se le agrega el elemento row(tr)*/
                    tablaExamenesTbody.appendChild(row);
                });
            })
            .catch((error) => { //en caso de tener un error se ejecuta lo siguiente, en este caso nose trabaja el error solo se muestra un cosole.log()
                console.error("Error:", error);
            });
        }
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
        limpiarHTML(tablaCalificacionesTbody); //Se limpia la tabla en caso de haber datos ya consultados
  
        fetch(action, {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .then((response) => {

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
        })
        .catch((error) => {
            console.error("Error:", error);
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
    /* Funcion para la seleccion de una fila en la tabla de examenes-materia        */
    /* al seleccionar una materia esta se asigna en cada campo del form de materia  */
    /* donde esta el boton para la consulta de calificaciones                       */
    /********************************************************************************/
    function seleccionarExamen(e) {
      e.preventDefault();
    
      //Cuando ocurre la selecion de una materia se hace sobre una celda(td) por lo que sera necesario obtener su padre
      const materiaSeleccionada = e.target.parentElement;
      const tds = Array.from(materiaSeleccionada.children); //Se hace un array con todos los datos del padre, es decir cada celda
  
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
  
    }


    /********************************************************************************/
    /* Funcion para la limpieza de una tabla cuando esta ya tiene datos y se quiere */
    /* cargar nuevos datos                                                          */
    /********************************************************************************/
    function limpiarHTML(node) {
        // Forma lenta e insegura
        // node.innerHTML = '';

        // Forma rápida
        while (node.firstChild) {
            node.removeChild(node.firstChild);
        }
    }


    /********************************************************************************/
    /* Funuciones: Para validacion de las calificaciones cuando estas son           */
    /* capturadas por primera vez o se quiere editar las calificaciones             +/
    /********************************************************************************/
    function validarCalificaciones(e) {
        e.preventDefault(); //previene la accion por defecto

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

            //Se identifica si la celda contiene un input o solo es texto, esto ayudara a poder evaluar la celda cuando un usuario no 
            //finaliza la edicion de una calificacion, se podran leer celdas tanto con inputs como con solo texto y obtener su valor
            const calificacion = inputCalificacion ? inputCalificacion.value.trim() : celdaCalificacion.textContent.trim();

            if (!calificacion) {
                // La calificación está vacía
                evaluaCalificaciones = false;
                mostrarAdvertencia(celdaCalificacion, 'Asigna una Calificacion');
            } else if (!validarRangoCalificacion(calificacion)) {
                // La calificación no está dentro del rango válido
                evaluaCalificaciones = false;
                mostrarAdvertencia(celdaCalificacion, 'Asigna una calificación valida: 0-10, AC o NP');
            } else {
                // La calificación es válida, elimina cualquier advertencia anterior
                eliminarAdvertencia(celdaCalificacion);
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#tablaExamen').DataTable({
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

    /*
    $(document).ready(function (){
        $('#tablaFechas').DataTable({
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
    */
    /*
    $(document).ready(function (){
        $('#tablaCalificaciones').DataTable({
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
    */
</script>
@stop