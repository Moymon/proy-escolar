//Esta funcion recibe el evento formFechasFiltro "submit" esto sucede cuando se presiona el boton type="submit"
function consultaFechas(e) {
    e.preventDefault(); //evita que el botón recargue la página

    const formData = new FormData(this); //se recibe el form del cual se está haciendo el listener

    //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
    // TRUE: para deshabilitar los botones
    // FALSE: para habilitar los botones
    ui.deshabilitarBotones(true);

    fetch(this.getAttribute("action"), {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json()) // "promesa" donde se espera la respuesta json desde el controlador de Laravel
        .then((response) => {
            if (response.error) {
                ui.displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
                ui.deshabilitarBotones(false);
            } else {
                ui.cargarLimpiezaDeTabla(tablaFechasTbody, "tablaFechas", "erroresDeTablaFechas");

                // después de recibir el valor de la respuesta json desde el controlador, se trabaja con los datos recibidos
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

                    const inputPeriodoElement = document.createElement("input");
                    inputPeriodoElement.type = "hidden";
                    inputPeriodoElement.value = response.periodo;
                    inputPeriodoElement.setAttribute("style", "display:none;");
                    inputPeriodoElement.className = "inputPeriodoElement";

                    td.appendChild(inputFechaElement);
                    td.appendChild(inputPeriodoElement);

                    row.appendChild(td);

                    tablaFechasTbody.appendChild(row);
                });

                // Inicialización de DataTables
                ui.edicionDeTablas("tablaFechas", "", false, false, false, false, 5, [
                    [5, 10, 15],
                    [5, 10, 15],
                ]);

                //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
                // TRUE: para deshabilitar los botones
                // FALSE: para habilitar los botones
                ui.deshabilitarBotones(false);
            }
        })
        .catch((error) => {
            //console.error("Error:", error);
            ui.displayError("Consulta de fechas fallida", true, "erroresDeTablaFechas");
            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            ui.deshabilitarBotones(false);
        });
}

function consultaExamenes(e) {
    e.preventDefault(); //evita que el botón recargue la página

    const formData = new FormData(this); //se recibe el form del cual se está haciendo el listener

    //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
    // TRUE: para deshabilitar los botones
    // FALSE: para habilitar los botones
    ui.deshabilitarBotones(true);

    fetch(this.getAttribute("action"), {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((response) => {
            if (response.error) {
                ui.displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
                ui.deshabilitarBotones(false);
            } else {
                ui.cargarLimpiezaDeTabla(tablaExamenesTbody, "tablaExamen", "erroresDeTablaExamenes");
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
                ui.deshabilitarBotones(false);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            ui.displayError("Consulta de exámenes fallida", true, "erroresDeTablaExamenes");
            //habilitar los botones de la pantalla, esto permitira no hacer una misma consulta muchas veces al presionar el boton varias veces
            // TRUE: para deshabilitar los botones
            // FALSE: para habilitar los botones
            ui.deshabilitarBotones(false);
        });
}