/********************************************************************************/
/* Funuciones: Para validacion de las calificaciones cuando estas son           */
/* capturadas por primera vez o se quiere editar las calificaciones             +/
/********************************************************************************/


export function validarCalificaciones(e) {
    e.preventDefault(); //previene la accion por defecto
    //const tablaCalificaciones = document.getElementById('tablaCalificaciones');
    //console.log(tablaCalificaciones);
    //S obtienen todas las filas de la tabla de calificaciones segun la clase asignada "fila-calificacion"
    const filas = document.getElementsByClassName("fila-calificacion");
    let evaluaCalificaciones = true; //bandera para identificar cuando existe un error
    const datosCalificaciones = []; //array donde se guardara la cve_unica y la calificacion
    var validacion = true; //bandera para indicar al form si se logro la validacion o no

    for (let i = 0; i < filas.length; i++) {
        //Se itera sobre las filas
        const fila = filas[i];
        const celdaClave = fila.querySelector(".cve_unicaModal"); //se obtiene la clave unica segun la fila que se esta iterando
        const celdaCalificacion = fila.querySelector(".calificacionModal"); //Se obtien la calificaion seguna la fila en la que se esta iterando

        const clave = celdaClave.textContent.trim(); //se obtiene el contenido de la celda, cve_unica
        const inputCalificacion = celdaCalificacion.querySelector("input"); //Se obtiene el contenido de la celda, calificacion

        const buscadorDeTabla = document.getElementById("tablaCalificaciones_filter").querySelector("input");
        //console.log(buscadorDeTabla);
        //Se identifica si la celda contiene un input o solo es texto, esto ayudara a poder evaluar la celda cuando un usuario no
        //finaliza la edicion de una calificacion, se podran leer celdas tanto con inputs como con solo texto y obtener su valor
        var calificacion = inputCalificacion ? inputCalificacion.value.trim() : celdaCalificacion.textContent.trim();

        if (!calificacion) {
            // La calificación está vacía
            evaluaCalificaciones = false;
            mostrarAdvertencia(celdaCalificacion, "Asigna una calificación");
        } else if (!validarRangoCalificacion(calificacion)) {
            // La calificación no está dentro del rango válido
            evaluaCalificaciones = false;
            mostrarAdvertencia(celdaCalificacion, "Asigna una calificación valida: 0-10, AC o NP");
        } else if (buscadorDeTabla.value !== "") {
            evaluaCalificaciones = false;
            mostrarAdvertencia(celdaCalificacion, "Debes asignar una calificación a todos los alumnos");
        } else {
            // La calificación es válida, elimina cualquier advertencia anterior
            eliminarAdvertencia(celdaCalificacion);

            const isNumeric = (n) => !isNaN(n);
            if (isNumeric(calificacion)) {
                let calificacionValue = parseInt(calificacion, 10);
                calificacion = calificacionValue.toString();
            }
            //console.log(calificacion)
            datosCalificaciones.push({ clave, calificacion });
        }
    }

    if (evaluaCalificaciones) {
        // Todas las calificaciones son válidas
        const form = document.getElementById("formCalificaciones");
        //const form = new FormData(this);

        // Todas las calificaciones son válidas, se asignan los datos al formulario
        const inputDatosCalificaciones = document.createElement("input");
        inputDatosCalificaciones.setAttribute("type", "hidden");
        inputDatosCalificaciones.setAttribute("name", "datosCalificaciones");
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
    const calificacionesValidas = ["AC", "NP"]; //array con las posibilidades de registro en caso de no ser nuemeros
    //var valoresAceptados = /^([1-9]|10)$/;
    const valorNumerico = parseInt(calificacion); //se convierte a numero el string de la calficacioon
    const isNumeric = (n) => !isNaN(n); //constante que permite evaluar que un string con numeros y letras solo haya numeros

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
function mostrarAdvertencia(celda, content) {
    //Esta funcion creara el simbolo de advertencia on un tooltip para mostrar un mensaje
    eliminarAdvertencia(celda);
    const divAdvertencia = document.createElement("div");
    divAdvertencia.setAttribute("class", "advertenciaCalificacion");
    divAdvertencia.setAttribute("style", "height:17px;width:17px;margin-left:5px;");
    divAdvertencia.innerHTML = `<i data-bs-toggle="tooltip" data-bs-placement="top" title="${content}"  class='fas fa-info-circle' style='color: red;cursor:pointer;'></i>`;
    celda.appendChild(divAdvertencia);
}

//Esta funcion limpia la advertecia
function eliminarAdvertencia(celda) {
    const divAdvertencia = celda.querySelector(".advertenciaCalificacion");
    if (divAdvertencia) {
        celda.removeChild(divAdvertencia);
    }
}