import {UI} from './ui.js';

const ui = new UI();

/********************************************************************************/
/* Peticiones con AJAX                                                          */
/********************************************************************************/

//Constantes para cada form de Consulta
/* Tres form en total:
        formFechasFiltro: para los campos de ciclo-escolar y periodo, este form hace la consulta para la tabla de Fechas y Examenes-Materia
        formMateriaConsulta: cundo se selecciona una de las materias, este form se encarga de recibir la informacion y con ella hacer la consulta para la tabla calificaciones.
        formCalificaciones: Este form recibe la informacion de materia y realiza el update de calificaciones.
*/
const formFechasFiltro = document.getElementById("formFiltroFechas");
const formMateriaConsulta = document.getElementById("camposMateriaInfo");
const formCalificaciones = document.getElementById("formCalificaciones");

export function peticionAjaxFechas(tablaFechasTbody) {
    // Crear objeto XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Configurar la solicitud AJAX
    xhr.open("POST", getFechas); // Especifica la ruta del script
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Manejar la respuesta de la solicitud
    xhr.onload = function () {
        if (xhr.status === 200) {
            ui.cargarLimpiezaDeTabla(tablaFechasTbody, "tablaFechas", "erroresDeTablaFechas");

            const response = JSON.parse(xhr.responseText);
            const data = response.data; // se obtiene el elemento data que contiene la información de las fechas
            const diasSemana = ["domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado"];
            const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

            data.forEach((element) => {
                const fechaOriginal = new Date(element.fecha);
                const diaSemana = diasSemana[fechaOriginal.getDay()];
                const dia = fechaOriginal.getDate();
                const mes = meses[fechaOriginal.getMonth()];
                const anio = fechaOriginal.getFullYear();

                const fechaFormateada = `${diaSemana} ${dia} de ${mes} del ${anio}`;
                const row = document.createElement("tr");
                const td = ui.createTableCell(fechaFormateada, "fechaCampo");

                const inputFechaElement = document.createElement("input");
                inputFechaElement.type = "hidden";
                inputFechaElement.value = element.fecha;

                inputFechaElement.setAttribute("style", "display:none;");
                inputFechaElement.className = "inputFechaElement";

                td.appendChild(inputFechaElement);
                row.appendChild(td);
                tablaFechasTbody.appendChild(row);
            });

            // Inicialización de DataTables con paginación, scroll y buscador
            ui.edicionDeTablas("tablaFechas", "", false, false, false, false, 5, [
                [5, 10, 15],
                [5, 10, 15],
            ]);

            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            //ui.deshabilitarBotones(false);
        } else {
            ui.displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
        }
    };

    // Capturar errores en la solicitud
    xhr.onerror = function () {
        //console.error("Error en la solicitud");
        ui.displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
    };

    // Obtener los datos del formulario
    const formData = new FormData(formFechasFiltro);

    // Convertir los datos del formulario en una cadena de consulta URL codificada
    const encodedData = new URLSearchParams(formData).toString();

    // Enviar la solicitud AJAX con los datos del formulario
    xhr.send(encodedData);
}

export function peticionAjaxExamenes(tablaExamenesTbody) {
    // Crear objeto XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Configurar la solicitud AJAX
    xhr.open("POST", getExamenes); // Especifica la ruta del script
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Manejar la respuesta de la solicitud
    xhr.onload = function () {
        if (xhr.status === 200) {
            ui.cargarLimpiezaDeTabla(tablaExamenesTbody, "tablaExamen", "erroresDeTablaExamenes");

            //console.log(xhr.responseText);
            const response = JSON.parse(xhr.responseText);
            //console.log(response);
            const data = response.data;

            data.forEach((element) => {
                const row = document.createElement("tr");

                const fieldOrder = {
                    tdCveMateria: ui.createTableCell(element.cve_materia, "claveCampo"),
                    tdNombre_ing: ui.createTableCell(element.nombre_ing, "materiaCampo"),
                    tdHora: ui.createTableCell(element.hora, "horaCampo"),
                    tdSalon: ui.createTableCell(element.salon, "salonCampo"),
                    tdTipo: ui.createTableCell(element.tipo, "tipoCampo"),
                    tdNombre: ui.createTableCell(element.nombre, "nombreCampo"),
                    tdNombre2: ui.createTableCell(element.nombre, "nombreCampo2"),
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
            ui.edicionDeTablas("tablaExamen", "200px", true, true, true, false, 5, [
                [5, 10, 15],
                [5, 10, 15],
            ]);

            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            //ui.deshabilitarBotones(false);
        } else {
            //console.error("Error en la solicitud. Código de estado: " + xhr.status);
            ui.displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
        }
    };

    // Capturar errores en la solicitud
    xhr.onerror = function () {
        //console.error("Error en la solicitud");
        ui.displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
    };

    // Obtener los datos del formulario
    const formData = new FormData(formSelectFechaForExam);

    // Convertir los datos del formulario en una cadena de consulta URL codificada
    const encodedData = new URLSearchParams(formData).toString();

    // Enviar la solicitud AJAX con los datos del formulario
    xhr.send(encodedData);
}

export function peticionAjaxCalificaciones(tablaCalificacionesTbody) {
    ui.deshabilitarBotones(true);
    // Crear objeto XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Configurar la solicitud AJAX
    xhr.open("POST", getCalificaciones); // Especifica la ruta del script
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Manejar la respuesta de la solicitud
    xhr.onload = function () {
        if (xhr.status === 200) {
            ui.cargarLimpiezaDeTabla(tablaCalificacionesTbody, "tablaCalificaciones", "erroresDeTablaCalificaciones");

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
        } else {
            ui.displayError("Datos de alumno erróneos", true, "erroresDeTablaCalificaciones");
            ui.deshabilitarBotones(false);
        }
    };

    // Capturar errores en la solicitud
    xhr.onerror = function () {
        ui.displayError("Consulta de calificaciones fallida", true, "erroresDeTablaCalificaciones");
        ui.deshabilitarBotones(false);
    };

    // Obtener los datos del formulario
    const formData = new FormData(formMateriaConsulta);

    // Convertir los datos del formulario en una cadena de consulta URL codificada
    const encodedData = new URLSearchParams(formData).toString();

    // Enviar la solicitud AJAX con los datos del formulario
    xhr.send(encodedData);
}