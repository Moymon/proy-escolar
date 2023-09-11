class Rol {
    constructor(){
        this.rol = '';
        this.modulo = '';

        this.rolSeleccionado = false;
        this.moduloSeleccionado = false;

        this.listaRoles = {};
        this.listaPermisos = {};

        this.permisosXModulo = {};
        this.permisosXRol_Asignados = {};
        this.permisosXRol_NoAsignados = {};
        this.permisosXRol_Originales = {};

        this.newPermissionsSelected = [];
        this.newPermissionsDeleted = [];
    }


    asignaListaDePermisos(permisosAsignados, permisosNoAsignados) {
        this.permisosXRol_Asignados = permisosAsignados;
        this.permisosXRol_NoAsignados = permisosNoAsignados;

        //console.log(permisosAsignados);
        // Crear conjuntos a partir de las listas
        const setPermisosAsignados = new Set(this.permisosXRol_Asignados);
        const setPermisosOriginales = new Set(this.permisosXRol_Originales);
        if (this.comparaListaDePermisos(setPermisosAsignados, setPermisosOriginales )) {
            btnGuardadoPermisos.disabled = true;
        } else {
            btnGuardadoPermisos.disabled = false;
        }
    }

    comparaListaDePermisos(setAsignados, setOriginales) {
        let permisoMovido;
        
        if (setAsignados.size !== setOriginales.size) {
            //console.log(setAsignados.size + " setAsigandos");
            //console.log(setOriginales.size + " setOriginales");
            return false;
        }

        for (let item of setOriginales) {
            permisoMovido = this.permisosXRol_Asignados.find(permiso => permiso.name === item.name);
            //console.log(permisoMovido);
            if (!permisoMovido) {
                return false;
            }
        }
        return true;
    }


    actualizarPermisos(permisosRol, permisosOriginalesXRol, permisos_no_coincidentes){
        this.permisosXRol_Asignados = permisosRol;
        this.permisosXRol_Originales = permisosOriginalesXRol;
        this.permisosXRol_NoAsignados = permisos_no_coincidentes;
    }

    funcionPeticionDeRoles(target){
        tituloRolSeleccionado.textContent = target.textContent;
        nombreRolSeleccionadoDeSideBar.value = target.textContent;
        this.rol = target.textContent;

        peticionAjaxPermisosRolSeleccionado();
    }

}

class UI {

    constructor(){
        this.colorPrincipal = "#004A98";
        this.colorSecundario = "#2C6DB1";
        
        this.colorPermisoAsignado = "#004A98";
        this.colorPermisoNoAsignado ="rgb(242, 242, 242)";
        this.colorPermisoEliminado = "#DA0000";
        this.colorPermisoNuevo= "#00B600";
    }

    creaBotonPermiso(nombrePermiso){
        let padreBotonRol = this.createElementHTML('div', '', 'col-3 padreBotonRol h-auto', '', '');
        padreBotonRol.setAttribute("data-id", nombrePermiso);

        let boxBotonDeRol = this.createElementHTML('div', '', 'mb-1 ml-1 boxDeRol p-1 pr-2 border rounded-pill d-flex flex-row align-items-center justify-content-between', nombrePermiso, '');
        //boxBotonDeRol.setAttribute('onclick', 'verificaClickBoxDeRol(this)');

        let labeLBotonRol = this.createElementHTML('div', 'user-select: none;', 'labeLBotonRol ml-1 text-wrap text-center h-100 w-100', '', nombrePermiso);

        boxBotonDeRol.appendChild(labeLBotonRol);
        padreBotonRol.appendChild(boxBotonDeRol);

        return padreBotonRol;
    }


    setColorDeFondoYTexto(boxBotonDeRol, esAsignado, esOriginal) {
        const backgroundColor = esAsignado ? (esOriginal ? this.colorPermisoAsignado : this.colorPermisoNuevo) : (esOriginal ? this.colorPermisoEliminado : this.colorPermisoNoAsignado);
        const color = backgroundColor === this.colorPermisoNoAsignado ? 'black' : 'white';
        boxBotonDeRol.style.backgroundColor = backgroundColor;
        boxBotonDeRol.style.color = color;
    }

    verificaSiPermisoEstaAsignado(permisosAsignados, permisosNoAsignados, padreBotonRol, boxBotonDeRol, permiso) {
        const nombrePermiso = permiso.name.toLowerCase();
        const permisoEnAsignados = permisosAsignados.find(permisoSeleccionado => permisoSeleccionado.name.toLowerCase() === nombrePermiso);
        const permisoEnNoAsignados = permisosNoAsignados.find(permisoSeleccionado => permisoSeleccionado.name.toLowerCase() === nombrePermiso);

        if (permisoEnAsignados) {
            this.setColorDeFondoYTexto(boxBotonDeRol, true, objectRol.permisosXRol_Originales.some(orig => orig.name === permisoEnAsignados.name));
            boxPermisosAsignados.appendChild(padreBotonRol);
        } else {
            this.setColorDeFondoYTexto(boxBotonDeRol, false, objectRol.permisosXRol_Originales.some(orig => orig.name === permisoEnNoAsignados.name));
            boxPermisosNoAsignados.appendChild(padreBotonRol);
        }
    }

    animacionDeBotonSidebarOModulo(divs, target, clase, colorFondo, color){
        divs.forEach(div => {
            const element = div.querySelector(clase);
            element.classList.remove("selected");
            element.style.background = "";
            element.style.color = "";
        });

        target.style.background = colorFondo;
        target.style.color = color;
        target.classList.add("selected");

    }

    limpiarHTML(element){
        while(element.firstChild){
            element.removeChild(element.firstChild);
        }
    }

    createElementHTML(element, style, clase, id, textContent) {
        element = document.createElement(element);
        element.setAttribute('style', style);
        element.setAttribute('class', clase);
        element.id = id;
        element.textContent = textContent;

        return element;
    }

    reiniciaModulos(){
        let listaDeModulos = document.querySelector("#listaDeModulos")
        const divs = Array.from(listaDeModulos.children);
        //console.log(listaDeModulos)
        //console.log(divs);
        divs.forEach(div => {
            const element = div.querySelector('.labelModulo');
            element.classList.remove("selected");
            element.style.background = "";
            element.style.color = "";
        });

        tituloModulo.textContent = "Módulos";
        objectRol.moduloSeleccionado = false;
        objectRol.modulo = '';
    }

    muestraPermisosEnModal(listaDePermisos, elementLista){
        if(listaDePermisos.length){
            for (const numeroPermiso in listaDePermisos) {
                const permiso = listaDePermisos[numeroPermiso];

                const padrePermiso = this.createElementHTML('div', '', 'col-4', '', '');
                const boxPermiso = this.createElementHTML('div', 'background-color:' + this.colorPermisoNoAsignado + ';color:black;', 'text-center mr-2 mb-2 rounded border', permiso.name, permiso.name);

                padrePermiso.appendChild(boxPermiso);
                elementLista.appendChild(padrePermiso);
            }
        } else{
            const titulo = this.createElementHTML('h6', 'color:gray;', 'fs-6 my-2 text-center w-100', '', 'Sin permisos');
            elementLista.appendChild(titulo);
        }
    }

    funcionPeticionDeRolesUI(target) {
        const divs = Array.from(target.parentElement.parentElement.children);
        this.animacionDeBotonSidebarOModulo(divs, target, '.aRoles', '#fff', '#004A98');
    }
}


class Filtro {
    constructor(datosDeBusqueda){
        this.datosDeBusqueda = datosDeBusqueda;
    }


    filtrarSearch(element) {
        const {name} = this.datosDeBusqueda;
        if(name) {
            //return rol.name === name;
            return element.name.toLowerCase().includes(name.toLowerCase());
        }
        return element;
    }


    showResultados(lista, listaConResultados) {
        for (let i = 0; i < lista.children.length; i++) {
            const elemento = lista.children[i];
            const id = elemento.getAttribute('data-id');
            const resultado = listaConResultados.find(resultado => resultado.name === id);
            if (resultado) {
                elemento.style.display = 'block'; // Mostrar elementos relacionados
            } else {
                elemento.style.display = 'none'; // Ocultar elementos no relacionados
            }
        }
    }

    noResultado() {
        //limpiarHTML();

        const noResultado = document.createElement('div');
        noResultado.classList.add('alerta', 'error');
        noResultado.textContent = 'No Hay Resultados, Intenta con otros terminos de busqueda';
        resultado.appendChild(noResultado);
    }
}


const ui = new UI();
const objectRol = new Rol();

//***************************************************************************************************************************/
//***************************************************************************************************************************/
//***************************************************************************************************************************/
//Variables y AddEventListeners

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Almacenar elementos en variables para un acceso más rápido
const formRolDeSideBar = document.getElementById("formRolDeSideBar");
const nombreRolSeleccionadoDeSideBar = document.getElementById("nombreRolSeleccionadoDeSideBar");

const listaRoles = document.getElementById('listaRoles');
const sidebarCollapse = document.getElementById("sidebarCollapse");
const sidebar = document.getElementById("sidebar");
const buscadorSidebar = document.getElementById("searchSideBarRoles");

const tituloRolSeleccionado = document.getElementById("tituloRolSeleccionado");
const boxPermisosAsignados = document.getElementById("boxPermisosAsignados");
const boxPermisosNoAsignados = document.getElementById("boxPermisosNoAsignados");
const buscadorPermiso = document.getElementById("buscadorPermiso");


//Constante Area de modulos
const tituloModulo = document.getElementById("tituloModulo");
const formModulosDeRol = document.getElementById("formModulosDeRol");
const inputFormModulo_modulo = formModulosDeRol.querySelector('[name="modulo"]');

const btnGuardadoPermisos = document.getElementById("btnGuardadoPermisos");

//Dropdown
const dropdown = document.getElementById("dropdown-content");

//Modal
const modalListaPermisos = document.getElementById("modalListaPermisos");
const modalListaPermisosEliminados = document.getElementById("modalListaPermisosEliminados");
const btnGuardadoPermisosModal = document.getElementById("btnGuardadoPermisosModal");
const modalConfirmacionDeCambio =  document.getElementById("confirmacionDeCambio");

//Indices
const indiceAsignados = document.getElementById("indiceAsignados");
const indiceNuevos = document.getElementById("indiceNuevos");
const indiceEliminados = document.getElementById("indiceEliminados");
const indiceNoAsiganados = document.getElementById("indiceNoAsiganados");

objectRol.listaRoles = @json($roles);
objectRol.listaPermisos = @json($permisos);


document.addEventListener("DOMContentLoaded", () => {
    btnGuardadoPermisos.disabled=true;

    btnGuardadoPermisos.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;');
    btnGuardadoPermisosModal.setAttribute('style', 'background-color:' + ui.colorPrincipal + ';color:white;" id="btnGuardadoPermisosModal');

    sidebarCollapse.setAttribute('style', 'background-color:' + ui.colorPrincipal + ';color:white;');

    indiceAsignados.setAttribute('style', 'background-color:' + ui.colorPermisoAsignado + ';height:10px;width:10px;');
    indiceNoAsiganados.setAttribute('style', 'background-color:' + ui.colorPermisoNoAsignado + ';height:10px;width:10px;');
    indiceNuevos.setAttribute('style', 'background-color:' + ui.colorPermisoNuevo + ';height:10px;width:10px;');
    indiceEliminados.setAttribute('style', 'background-color:' + ui.colorPermisoEliminado + ';height:10px;width:10px;');
});

// Agregar un solo evento de delegación en lugar de varios oyentes individuales
document.addEventListener("click", function (event) {
    event.preventDefault();
    if (event.target.classList.contains("rolDeSidebarSeleccionable")) {
        seleccionarRolDeSideBar(event.target);

    } else if(event.target.id === "btnConfirmarCambio"){
        const inputCambio = modalConfirmacionDeCambio.querySelector('#idRolConfirmarCambio');
        const rolParaCambio = listaRoles.querySelector(`#${inputCambio.value}`);
        ui.funcionPeticionDeRolesUI(rolParaCambio.children[0]);
        objectRol.funcionPeticionDeRoles(rolParaCambio.children[0]);
        inputCambio.value = "";

    }else if (event.target === sidebarCollapse) {
        sidebar.classList.toggle("active");
        const sidebarIcon = document.getElementById("sidebarIcon");
        sidebarIcon.classList.toggle("fa-times"); // Si es fa-align-left, cambia a fa-xmark
        sidebarIcon.classList.toggle("fa-align-left"); // Si es fa-xmark, cambia a fa-align-left

    } else if(event.target.classList.contains("labelModulo")){
        onclickModulo(event);

    } else if(event.target.classList.contains("boxDeRol") || event.target.classList.contains("labeLBotonRol")){
        if(event.target.classList.contains("labeLBotonRol")){
            verificaClickBoxDeRol(event.target.parentElement);
        }else{
            verificaClickBoxDeRol(event.target);
        }
    }else if (event.target.id === "btnGuardadoPermisos"){
        openModalForSave();

    } else if (event.target.id === "btnGuardadoPermisosModal"){
        peticionAjaxGuardarPermisos();

    } else if (event.target.id === "cierreDeModulos" || event.target.id === "iconoCierreDeModulos"){
        openDropdown(tituloModulo);

    } else if(event.target.classList.contains("openDropdown")){
        openDropdown(event.target);
    }
});


//***************************************************************************************************************************/
//***************************************************************************************************************************/
//***************************************************************************************************************************/
function muestraPermisosRolSeleccionado() {
    ui.limpiarHTML(boxPermisosAsignados);
    ui.limpiarHTML(boxPermisosNoAsignados);

    objectRol.listaPermisos.forEach(elementPermiso => {
        let padreBotonRol = ui.creaBotonPermiso(`${elementPermiso.name}`);
        const boxBotonDeRol = padreBotonRol.querySelector('.boxDeRol');

        ui.verificaSiPermisoEstaAsignado(objectRol.permisosXRol_Asignados, objectRol.permisosXRol_NoAsignados, padreBotonRol, boxBotonDeRol, elementPermiso);
    });
    
}

// Función para manejar la petición AJAX de permisos
function peticionAjaxPermisosRolSeleccionado() {
    const xhr = new XMLHttpRequest();
    const url = getPermisosRelacionadosConNombre;
    xhr.open("POST", '{{ route('getPermisosRelacionadosConNombre') }}');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText); 
            btnGuardadoPermisos.disabled = true;
            objectRol.rolSeleccionado = true; 
            objectRol.newPermissionsDeleted = [];
            objectRol.newPermissionsSelected = [];
            objectRol.actualizarPermisos(response.permisosRolSeleccionado, response.permisosOriginalesXRol, response.permisos_no_coincidentes);
            if(objectRol.moduloSeleccionado){
                ui.reiniciaModulos();
            }

            muestraPermisosRolSeleccionado();
        } else {
            console.error("Error en la solicitud. Código de estado: " + xhr.status);
        }
    };
    xhr.onerror = function () {
        console.error("Error en la solicitud");
    };
    const formData = new FormData(formRolDeSideBar);
    
    const encodedData = new URLSearchParams(formData).toString();
    xhr.send(encodedData);
}

function seleccionarRolDeSideBar(target) {
    if (objectRol.newPermissionsDeleted.length == 0 && objectRol.newPermissionsSelected.length == 0) {
        ui.funcionPeticionDeRolesUI(target);
        objectRol.funcionPeticionDeRoles(target);
    } else {
        const idRolConfirmarCambio = document.getElementById("idRolConfirmarCambio");
        idRolConfirmarCambio.value = target.parentElement.getAttribute("data-id");

        $('#confirmacionDeCambio').modal('show');
    }
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************

function openModalForSave() {
    const modalTituloRol = document.getElementById("modalTituloRol");
    const modalSubTituloRol = document.getElementById("modalSubTituloRol");

    modalTituloRol.textContent = objectRol.rol;
    modalSubTituloRol.textContent = objectRol.rol;
    ui.limpiarHTML(modalListaPermisos);
    ui.limpiarHTML(modalListaPermisosEliminados);

    ui.muestraPermisosEnModal(objectRol.newPermissionsSelected, modalListaPermisos);
    ui.muestraPermisosEnModal(objectRol.newPermissionsDeleted, modalListaPermisosEliminados);
    
    $('#permisosModal').modal('show');
}

// Función para mostrar los resultados guardados
function muestraResultadosGuardado() {
    btnGuardadoPermisos.disabled = true;
    if (objectRol.moduloSeleccionado) {
        muestraPermisosModuloConRolSeleccionado();
    } else {
        muestraPermisosRolSeleccionado();
    }
}

// Función para realizar una petición AJAX para el guradado de permisos
function peticionAjaxGuardarPermisos() {
    //const endpoint = guardarPermisos;
    getPermisosModuloConRol
    const endpoint = '{{ route('getPermisosModuloConRol') }}'
    const requestData = {
        rol: objectRol.rol,
        permisosXRol_Asignados: objectRol.permisosXRol_Asignados
    };

    fetch(endpoint, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(requestData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Error en la solicitud. Código de estado: " + response.status);
        }
        return response.json();
    })
    .then(data => {
        $('#permisosModal').modal('hide');
        btnGuardadoPermisos.disabled = true;
        ui.limpiarHTML(modalListaPermisos);
        ui.limpiarHTML(modalListaPermisosEliminados);
        objectRol.newPermissionsDeleted = [];
        objectRol.newPermissionsSelected = [];
        objectRol.actualizarPermisos(data.permisosRol, data.permisosOriginalesXRol, data.permisos_no_coincidentes);
        muestraResultadosGuardado();
    })
    .catch(error => {
        console.error("Error en la solicitud:", error);
    });
}


function muevePermisoEnListas(nombrePermiso, isAsignados) {
    let newPermissionsSelected = objectRol['newPermissionsSelected'];
    let newPermissionsDeleted = objectRol['newPermissionsDeleted'];

    const sourceList = isAsignados ? 'permisosXRol_Asignados' : 'permisosXRol_NoAsignados';
    const targetList = isAsignados ? 'permisosXRol_NoAsignados' : 'permisosXRol_Asignados';

    const permisoMovido = objectRol[sourceList].find(permiso => permiso.name === nombrePermiso);

    if (permisoMovido) {
        const permisosFuente = objectRol[sourceList];
        const permisosDestino = objectRol[targetList];

        const backgroundColor = isAsignados ? 
        (objectRol.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) ? ui.colorPermisoEliminado : ui.colorPermisoNoAsignado) : 
        (objectRol.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) ? ui.colorPermisoAsignado : ui.colorPermisoNuevo)

        if(permisosFuente === objectRol.permisosXRol_NoAsignados){
            if(objectRol.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) == null){
                newPermissionsSelected.push(permisoMovido);
            }
            if(newPermissionsDeleted.find(permiso => permiso.name === permisoMovido.name)){
                newPermissionsDeleted.splice(newPermissionsDeleted.indexOf(permisoMovido), 1);
            }
        }else if(permisosFuente === objectRol.permisosXRol_Asignados){
            if(objectRol.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) != null){
                newPermissionsDeleted.push(permisoMovido);
            }
            if(newPermissionsSelected.find(permiso => permiso.name === permisoMovido.name)){
                newPermissionsSelected.splice(newPermissionsSelected.indexOf(permisoMovido), 1);
            }
        }
        objectRol.newPermissionsSelected = newPermissionsSelected;
        objectRol.newPermissionsDeleted = newPermissionsDeleted;

        const color = backgroundColor === ui.colorPermisoNoAsignado ? 'black' : 'white';

        permisosFuente.splice(permisosFuente.indexOf(permisoMovido), 1);
        permisosDestino.push(permisoMovido);

        const permisoElement = document.getElementById(nombrePermiso);
        permisoElement.style.backgroundColor = backgroundColor;
        permisoElement.style.color = color;

        objectRol.asignaListaDePermisos(objectRol.permisosXRol_Asignados, objectRol.permisosXRol_NoAsignados);
    }
}

// Función para verificar el click en el cuadro de rol
function verificaClickBoxDeRol(element) {
    const $element = $(element);
    const $contenedorPadre = $element.closest(".padreBotonRol");
    const isAsignados = $element.closest(".permisosAsignados").length > 0;
    const $contenedorDestino = isAsignados ? $(".permisosNoAsigandos") : $(".permisosAsignados");
    const styleBackground = isAsignados ? 'background-color:'+ ui.colorPermisoNoAsignado +';color:black;' : 'background-color:'+ ui.colorPermisoAsignado + ';color:white;';

    $contenedorPadre.appendTo($contenedorDestino);
    $element.attr('style', styleBackground);

    muevePermisoEnListas(element.id, isAsignados);
}


//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//Funciones de Modulos

function openDropdown(element) {
    let icon = element.parentElement.querySelector('i');
    icon.classList.toggle('fa-caret-right');
    icon.classList.toggle('fa-caret-down');
    dropdown.style.display = icon.classList.contains('fa-caret-down') ? "block" : "";
}

function muestraPermisosModuloConRolSeleccionado() {
    ui.limpiarHTML(boxPermisosAsignados);
    ui.limpiarHTML(boxPermisosNoAsignados);

    objectRol.permisosXModulo.forEach(elementPermiso => {
        let padreBotonRol = ui.creaBotonPermiso(elementPermiso.name);
        const boxBotonDeRol = padreBotonRol.querySelector('.boxDeRol');
        // Verifica si el permiso está en la lista de permisos asignados
        ui.verificaSiPermisoEstaAsignado(objectRol.permisosXRol_Asignados, objectRol.permisosXRol_NoAsignados, padreBotonRol, boxBotonDeRol, elementPermiso);
    });
}

// Función para manejar la petición AJAX de permisos
function peticionAjaxModuloSeleccionado() {
    const xhr = new XMLHttpRequest();
    const url = getPermisosModuloConRol;
    xhr.open("POST", '{{ route('getPermisosModuloConRol') }}');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);  
            objectRol.moduloSeleccionado = true;  
            objectRol.permisosXModulo = response.permisos_modulo;
            muestraPermisosModuloConRolSeleccionado();
        } else {
            console.error("Error en la solicitud. Código de estado: " + xhr.status);
        }
    };
    xhr.onerror = function () {
        console.error("Error en la solicitud");
    };
    const formData = new FormData(formModulosDeRol);
    const encodedData = new URLSearchParams(formData).toString();
    xhr.send(encodedData);
}

function onclickModulo(e) {
    e.preventDefault();

    if (!objectRol.rolSeleccionado) {
        console.log("No se ha seleccionado ningún rol");
        return;
    }

    const divs = Array.from(e.target.parentElement.parentElement.children);
    ui.animacionDeBotonSidebarOModulo(divs, e.target, '.labelModulo', ui.colorPrincipal, '#fff');

    if (e.target.id === "opcionTodosModulos") {
        tituloModulo.textContent = "Módulos";
        inputFormModulo_modulo.value = "";
        objectRol.modulo = "";
        objectRol.moduloSeleccionado = false;
        muestraPermisosRolSeleccionado();
    } else {
        tituloModulo.textContent = e.target.textContent;
        inputFormModulo_modulo.value = e.target.textContent;
        objectRol.modulo = e.target.textContent;
        peticionAjaxModuloSeleccionado();
    }
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE FILTRADO PARA EL SIDEBAR DE ROLES
const filtroRoles = new Filtro({
    name: ''
});

//Event Listener para los select de busqueda
buscadorSidebar.addEventListener('input', e => {
    filtroRoles.datosDeBusqueda.name = e.target.value;
    filtrarRol();
});

function filtrarRol() {
    const resultado = objectRol.listaRoles.filter( filtroRoles.filtrarSearch.bind(filtroRoles) );
    //const boxMensajeNoResultados = document.getElementById('boxMensajeNoResultados');
    
    filtroRoles.showResultados(listaRoles, resultado);
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE FILTRADO PARA LOS PERMISOS QUE SE ESTAN MOSTRANDO
const filtroPermisos = new Filtro({
    name: ''
});

//Event Listener para los select de busqueda
buscadorPermiso.addEventListener('input', e => {
    filtroPermisos.datosDeBusqueda.name = e.target.value;
    filtrarPermiso();
});

function filtrarPermiso() {
    const resultado = objectRol.listaPermisos.filter(filtroPermisos.filtrarSearch.bind(filtroPermisos));

    filtroPermisos.showResultados(boxPermisosAsignados, resultado);
    filtroPermisos.showResultados(boxPermisosNoAsignados, resultado);
}
