class Materia {
    constructor(numero, nombre, tipo, calificacion, fecha, creditos) {
        this.numero = numero;
        this.nombre = nombre;
        this.tipo = tipo;
        this.calificacion = calificacion;
        this.fecha = fecha;
        this.creditos = creditos;
    }
}
  
class Semestre {
    constructor(nombre, materias) {
        this.nombre = nombre;
        this.materias = materias;
    }
  
    agregarMateria(materia) {
        this.materias.push(materia);
    }
}

class Alumno{
    constructor(clave, nombre, grado, opcion, prom_gnral, prom_gnral_apro, total_cre_apro, semestres){
        this.clave = clave;
        this.nombre = nombre;
        this.grado = grado;
        this.opcion = opcion;

        this.prom_gnral = prom_gnral;
        this.prom_gnral_apro = prom_gnral_apro;
        this.total_cre_apro = total_cre_apro;

        this.semestres = semestres;
    }
}


const buttonCrearPdf = document.getElementById("buttonCrearPdf"); 
const tablasCalificaciones = document.getElementsByClassName("tablaDatosCalificaciones");
const tablasSemestre = $('.tablaDatosCalificaciones');

function loadEventListeners(){
    buttonCrearPdf.addEventListener("click", (e) =>{
        e.preventDefault();
        const alumno = recogeAlumno();
        peticionAplication(imprimeKardex , alumno, () =>{
            removeLoader();
        });
    });
}

loadEventListeners();




function recogeAlumno() {
    const clave = document.getElementById('cve_unica').value;
    const nombreAlumno = document.getElementById('nombreAlumno').value;
    const grado = document.getElementById('grado').value;
    const opcion = document.getElementById('opcion').value;
    const prom_general = document.getElementById('prom_general').value;
    const prom_gral_apro = document.getElementById('prom_gral_apro').value;
    const total_cre_apro = document.getElementById('total_cre_apro').value;
    const semestres = recogeSemestreYMaterias();
    return new Alumno(clave, nombreAlumno, grado, opcion, prom_general, prom_gral_apro, total_cre_apro, semestres);
}

function recogeSemestreYMaterias() {
    const semestres = [];
    for (const element of tablasSemestre) {
        const datosTabla = $(element).DataTable().rows().data();
        const semestreNombre = element.querySelector('thead tr th').textContent.trim();
        const materias = [];

        for (let i = 2; i < datosTabla.length; i++) {
            const fila = datosTabla[i];
            const materia = new Materia(fila[0], fila[1], fila[2], fila[3], fila[4], fila[5]);
            materias.push(materia);
        }

        const semestre = new Semestre(semestreNombre, materias);
        semestres.push(semestre);
    }

    return semestres;
}


function peticionAplication(route, requestData, callback) {
    createLoader();
    const xhr = new XMLHttpRequest();
    xhr.open("POST", route);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.responseType = 'arraybuffer';
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var blob = new Blob([xhr.response], { type: 'application/pdf' });
            var pdfUrl = URL.createObjectURL(blob);
            window.open(pdfUrl, '_blank');
            callback();
        } else {
            console.error("Error en la solicitud. Código de estado: " + xhr.status);
            callback();
        }
    };
    xhr.onerror = function () {
        const message = "Error en la solicitud";
        console.log(message);
        callback();
    };

    const jsonData = JSON.stringify(requestData);
    xhr.send(jsonData);
}



function createLoader(){
    var loader = createHTML('div', 'loader', '', 'loader', '');
    var overlay = createHTML('div', 'overlay', '', 'overlay','');
    overlay.appendChild(loader);
    document.body.appendChild(overlay);
}

function removeLoader() {
    const loader = document.querySelector(".loader");
    const overlay = document.querySelector(".overlay");

    loader.classList.add("loader--hidden");
    overlay.classList.add("loader--hidden");
    loader.addEventListener("transitionend", () => {
        loader.remove();
        overlay.remove();
    });
}

function createHTML(element, clase, estilo, id, text){
    let elementHTML = document.createElement(element);
    elementHTML.setAttribute('class', clase);
    elementHTML.setAttribute('style', estilo);
    elementHTML.setAttribute('id', id);
    elementHTML.textContent = text;

    return elementHTML;
}