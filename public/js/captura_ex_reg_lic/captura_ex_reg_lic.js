import {UI} from './ui.js';
import {validarCalificaciones} from './validaciones.js';
import * as request from './peticiones.js';

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


/* Estos ayudaran a comparar los datos de consulta en la tabla fechas, con unos campos bandera */
const cicloEscolar = formFechasFiltro.querySelector('#ciclo_escolar');
const periodo = formFechasFiltro.querySelector('#periodo');

const formSelectFechaForExam = document.getElementById("formSelectFechaForExam");
const inputPeriodoForExam = formSelectFechaForExam.querySelector(".inputPeriodoForExam");
const inputFechaForExam = formSelectFechaForExam.querySelector(".inputFechaForExam");


const ui = new UI();

//Esta funcion permite englobar cada uno de los listener que se usuaran para la dinamica de la pagina
cargarEventListener();
function cargarEventListener() {
    //Estos listener se les asigna un evento y la funcion que se ejecutara cuando suceda el evento

    cicloEscolar.addEventListener("change", (e) =>{
        e.preventDefault();
        if (cicloEscolar.value != "" && periodo.value != "") {
            inputPeriodoForExam.value = periodo.value;
            request.peticionAjaxFechas(tablaFechasTbody);
        }
    });
    periodo.addEventListener("change", (e) =>{
        e.preventDefault();
        if (cicloEscolar.value != "" && periodo.value != "") {
            inputPeriodoForExam.value = periodo.value;
            request.peticionAjaxFechas(tablaFechasTbody);
        }
    });

    // Funcion para consulta de calificaciones, esta se ejecuta cunado se consulta las calificaiciones de una materia que se selecciona por primera vez
    // Llama a la funcion promesaDatosFormTablaCalificacinoes()
    formMateriaConsulta.addEventListener("submit", function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        promesaDatosFormTablaCalificacinoes(this.getAttribute("action"), formData);
    });

    // Funcion para la actualizacion de calificaciones esta se ejecuta cuando se captura o editan las califiaciones de una materia
    // esta funcion, llama la funcion de validacion antes de pasar a la actualizacion de
    // estas califcaciones ademas llama a la funcion promesaDatosFormTablaCalificacinoes()
    formCalificaciones.addEventListener("submit", function(e){
        e.preventDefault();
        let validacion;
    
        validacion = validarCalificaciones(e);
        if (!validacion) {
            return;
        }
        const formData = new FormData(this);
        promesaDatosFormTablaCalificacinoes(this.getAttribute("action"), formData); //this.getAttribute("action") representa la accion definida por route() en el form
    
    });

    //Listener para la dinamica de seleccion de una materia en la tabla de (examenes-materia)
    tablaExamenesTbody.addEventListener("click", seleccionarExamen);
    tablaFechasTbody.addEventListener("click", seleccionarFecha);


    //ES IMPORTNATE RECALCAR QUE SE DEBE MANTENER O MANEJAR LAS CLASES ESTABLECIDAS EN EL HTML
    //DE NO SER ASI NO SE PODRAN IDENTIFICAR LOS ELEMENTOS PARA MANEJARLOS, SI SE CAMBIAN ESTAS CLASE
    //DEBERA CAMBIAR LOS CAMPOS CON LOS QUE SE LLAMAN EN ESTAS FUNCIONES
}

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

/********************************************************************************/
/* Funciones: Peticiones Asincronas con Fetch y .then, estas funciones permiten */
/* esperar la consulta a base de datos medinate la route() de los form          */
/********************************************************************************/

//Esta funcion solo define el fetch y .then para la recepcion y manejo de estos datos
function promesaDatosFormTablaCalificacinoes(action, formData) {
    //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
    // TRUE: para deshabilitar los botones
    // FALSE: para habilitar los botones
    ui.deshabilitarBotones(true);

    fetch(action, {
        method: "POST",
        body: formData,
    })
    .then((response) => response.json())
    .then((response) => {
            if (response.error) {
                ui.displayError("Datos de alumno erróneos", true, "erroresDeTablaCalificaciones");
                ui.deshabilitarBotones(false);
            } else {
                ui.cargarLimpiezaDeTabla(tablaCalificacionesTbody, "tablaCalificaciones", "erroresDeTablaCalificaciones");

                const data = response.data; //Se recogen los datos de response en $data

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

                data.forEach((element) => {
                    //Se manejan los datos recibidos
                    const row = document.createElement("tr");

                    //La siguiente constante es un booleano que evalua si todas las calificaciones de la consulta, ninguna es vacia
                    //En caso de ser vacia alguna significa que es la primera captura de calificaciones
                    //En caso de no ser vacia significa que ya se registraron calificaciones anteriormente
                    const todasLasCalificacionesNoNulas = data.every((element) => element.calificacion !== null && element.calificacion !== "");

                    //Se crea un objeto con la informacion de cada campo recibido y se registra en cada una de las celdas que se usaran
                    const fieldOrder = {
                        tdCveUnica: ui.createTableCell(element.cve_unica, "cve_unicaModal"),
                        tdnombre: ui.createTableCell(element.nombre + " " + element.paterno + " " + element.materno, "nombreModal"),
                        tdCalificacion: ui.createTableCellCalificacion(element.calificacion, "calificacionModal", todasLasCalificacionesNoNulas),
                    };

                    //Se obtiene cada una de las keys(nombres) de los campos en el objeto
                    const fieldKeys = Object.keys(fieldOrder);

                    //Se itera sobre el array de keys del objeto y de esta manera ir registrando cada celda en su fila
                    fieldKeys.forEach((key) => {
                        const field = fieldOrder[key];
                        row.className = "fila-calificacion"; //Se asignan clases que ayudaran a identificar el row de la tabla de calificaciones
                        row.appendChild(field);
                    });

                    tablaCalificacionesTbody.appendChild(row);
                });

                // Inicialización de DataTables con paginación, scroll y buscador
                ui.edicionDeTablas("tablaCalificaciones", "200px", true, false, true, false, null, []);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                ui.deshabilitarBotones(false);
            }
        })
    .catch((error) => {
            ui.displayError("Error en la consulta de calificaciones", true, "erroresDeTablaCalificaciones");
            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            ui.deshabilitarBotones(false);
    });
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

    if (tds) {
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
        tds.forEach((td) => {
            //Se itera osbre el array de llaves para identificar cada campo del objeto
            fieldKeys.forEach((key) => {
                //Se evalua si la iteracion del td coincide con la iteracion de las keys
                if (td.classList.contains(key)) {
                    //SI coincide se registra la informacion dentro de la celda
                    const contenido = td.textContent;
                    const field = fieldOrder[key];
                    field.value = contenido;
                }
            });
        });

        request.peticionAjaxCalificaciones(tablaCalificacionesTbody);
    } else {
        ui.displayError("Sin datos para consultar", true, "erroresDeTablaExamenes");
    }
}

function seleccionarFecha(e) {
    e.preventDefault();

    //Cuando ocurre la selecion de una materia se hace sobre una celda(td) por lo que sera necesario obtener su padre
    const fechaSeleccionada = e.target.parentElement;
    const valueFecha = fechaSeleccionada.querySelector(".inputFechaElement");

    if (valueFecha) {
        const infoTablaExamenes = document.getElementById("infoTablaExamenes");

        inputFechaForExam.value = valueFecha.value.trim();
        infoTablaExamenes.setAttribute("style", "color:lightgray;");

        const fechaCompleta = inputFechaForExam.value;
        const partesFecha = fechaCompleta.split(" ");
        const fecha = partesFecha[0];
        const cadenaFinal = `Fecha: ${fecha} Periodo: ${inputPeriodoForExam.value}`;

        infoTablaExamenes.textContent = cadenaFinal;

        request.peticionAjaxExamenes(tablaExamenesTbody);
    } else {
        ui.displayError("Sin datos para consultar", true, "erroresDeTablaFechas");
    }
}
