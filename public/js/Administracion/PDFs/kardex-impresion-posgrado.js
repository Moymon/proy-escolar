class Alumno{
    constructor(){
        this.datosthis;
        this.datosCalificaciones;
        this.inputDatosSemestre;
    }
}

class AlumnoManager extends Alumno{
    constructor(){
        super();

    }
}

const formPDFKardexPosgrado = document.getElementById("formPDFKardexPosgrado");
const buttonCrearPdf = document.getElementById("buttonCrearPdf"); 
const tablasCalificaciones = document.getElementsByClassName("tablaDatosCalificaciones");

const alumno = new AlumnoManager();

function loadEventListeners(){
    buttonCrearPdf.addEventListener("click", (e) =>{
        e.preventDefault();
        peticionCreaPDF(() =>{
            console.log("Creado");
        });
    });
}

loadEventListeners();


function recogeInformacion() { //Obtenemos toda la informacion de la pantalla
    const clave = document.getElementById('cve_unica').value;
    const nombreAlumno = document.getElementById('nombreAlumno').value;
    const grado = document.getElementById('grado').value;
    const opcion = document.getElementById('opcion').value;
    const prom_general = document.getElementById('prom_general').value;
    const prom_gral_apro = document.getElementById('prom_gral_apro').value;
    const total_cre_apro = document.getElementById('total_cre_apro').value;

    alumno.datosAlumno = { //Objeto con los datos del alumno dentro de la pantalla
        clave,
        nombre: nombreAlumno,
        grado,
        opcion,
    };

    alumno.datosCalificaciones = { //Objeto con los datos generales de kardex dentro de la pantalla
        'Promedio General': prom_general,
        'Promedio General Aprobatorio': prom_gral_apro,
        'Total Creditos Aprobados': total_cre_apro,
    };

    alumno.datosSemestre = recogeDatosSemestre();

    const requestData = {
        datosAlumno: alumno.datosAlumno,
        datosCalificaciones: alumno.datosCalificaciones,
        datosSemestre: alumno.datosSemestre 
    }

    return requestData;
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


function peticionCreaPDF(callback){
    const requestData = recogeInformacion();

    peticionAplication(imprimeKardex , requestData)
        .then(response => {
            if (response) {
                console.log(response);
                callback();
            } else {
                console.error("Error en la respuesta del servidor: " + response.message);
                callback();
            }
        })
        .catch(error => {
            console.error("Error en la solicitud AJAX: " + error);
            callback();
        });
}


function peticionAplication(route, requestData) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", route);
        xhr.setRequestHeader("Content-Type", "application/json");
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

        xhr.onload = function () {
            console.log(xhr.status);
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText); 
                console.log(response);
                resolve(response);
            } else {
                const message = "Error en la solicitud. Código de estado: " + xhr.status;
                reject(message);
            }
        };
        xhr.onerror = function () {
            const message = "Error en la solicitud";
            reject(message);
        };
        xhr.send(JSON.stringify(requestData));
    });
}

/*
() => {
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
}
*/

