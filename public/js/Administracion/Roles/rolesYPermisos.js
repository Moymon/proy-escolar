import * as jsRolPer from '../classRolPermisos.js';
import {UI} from '../UIRolesPermisos.js';
import * as filtro from '../classFiltro.js';

/******CLASES******/

//Instancias de las clases
const ui = new UI();
const objectPer = new jsRolPer.Permisos();

//***************************************************************************************************************************/
//***************************************************************************************************************************/
//***************************************************************************************************************************/

//Definicion de los roles y permisos que llegan al inicia de la vista desde un controlador
objectPer.listaRoles = listaRolesJSON;
objectPer.listaPermisos = listaPermisosJSON;

//***************************************************************************************************************************/
//***************************************************************************************************************************/
//***************************************************************************************************************************/
//EVEN TLISTENERS

//Listener para la configuracion de colores al entrar a la vista, esto sirve para que en la clase UI, se pueda poner cualquier color
document.addEventListener("DOMContentLoaded", () => {
    btnGuardadoPermisos.disabled=true;
    asignarRolBoton.disabled=true;

    btnGuardadoPermisos.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;');
    btnGuardadoPermisosModal.setAttribute('style', 'background-color:' + ui.colorPrincipal + ';color:white;" id="btnGuardadoPermisosModal');

    sidebarCollapse.setAttribute('style', 'background-color:' + ui.colorPrincipal + ';color:white;');

    indiceAsignados.setAttribute('style', 'background-color:' + ui.colorPermisoAsignado + ';height:10px;width:10px;');
    indiceNoAsiganados.setAttribute('style', 'background-color:' + ui.colorPermisoNoAsignado + ';height:10px;width:10px;');
    indiceNuevos.setAttribute('style', 'background-color:' + ui.colorPermisoNuevo + ';height:10px;width:10px;');
    indiceEliminados.setAttribute('style', 'background-color:' + ui.colorPermisoEliminado + ';height:10px;width:10px;');

    botonNuevoRol.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;');
    botonCrearRol.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;');

    permanecerEnRol.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;');

    asignarRolBoton.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;')

    btnGuardarRolXUsuarios.setAttribute('style', 'background-color:'+ ui.colorPrincipal +';color:white;');
});

//Listner para el CLICK: este es el evento principal de la interfaz, la mayoria de acciones suceden atraves de un click
document.addEventListener("click", function (event) {
    const target = event.target;

    if (target.id === "asignarRolBoton"){
        event.preventDefault();
        openModalToAssignToAUser();

    } else if (target.id === "btnGuardarRolXUsuarios") {
        event.preventDefault();
        saveRolForUser();
    }  
});

function loadListenersForInterfaceRoles(){
    contentRolSeleccionado.addEventListener('click', function(event){
        const target = event.target
    
        if (target.classList.contains("labelModulo")){
            event.preventDefault();
            onclickModulo(target);
    
        } else if (target.classList.contains("boxDeRol") || target.classList.contains("labeLBotonRol")){
            event.preventDefault();
            if(target.classList.contains("labeLBotonRol")){
                verificaClickBoxDeRol(target.parentElement);
            }else{
                verificaClickBoxDeRol(target);
            } 
    
        } else if (target.id === "btnGuardadoPermisos"){

            event.preventDefault();
            openModalForSave();
    
        } 
    });
    
    menuModulos.addEventListener('click', function(event){
        const target = event.target;
    
        if (target.classList.contains("openDropdown")){
            event.preventDefault();
            openDropdown(target);
    
        } else if (target.id === "cierreDeModulos" || target.id === "iconoCierreDeModulos"){
            event.preventDefault();
            openDropdown(tituloModulo);
    
        } 
    });
    
    sidebar.addEventListener('click', function (event) {
        const target = event.target
    
        if (target.classList.contains("rolDeSidebarSeleccionable")) {
            event.preventDefault();
            seleccionarRolDeSideBar(target);
    
        } 
    });
    
    navbarRoles.addEventListener('click', function(event){
        const target = event.target;
    
        if (target === sidebarCollapse) {
            event.preventDefault();
            sidebar.classList.toggle("active");
            const sidebarIcon = document.getElementById("sidebarIcon");
            sidebarIcon.classList.toggle("fa-times"); // Si es fa-align-left, cambia a fa-xmark
            sidebarIcon.classList.toggle("fa-align-left"); // Si es fa-xmark, cambia a fa-align-left
    
        } 
    });
    
    modalConfirmacionDeCambio.addEventListener('click', function(event){
        const target = event.target;
    
        if (target.id === "btnConfirmarCambio"){
            event.preventDefault();
    
            const inputCambio = modalConfirmacionDeCambio.querySelector('#idRolConfirmarCambio');
            const rolParaCambio = listaRoles.querySelector(`#${inputCambio.value}`);
            const targetRol = rolParaCambio.children[0];
            ui.animacionDeBoton(targetRol.parentElement.parentElement, '.aRoles', true, '#fff', '#004A98', targetRol);
            peticionAjaxPermisosRolSeleccionado(targetRol);
    
            inputCambio.value = "";
    
        } 
    });
    
    modalPermisos.addEventListener('click', function(event){
        const target = event.target;
    
        if (target.id === "btnGuardadoPermisosModal"){
            event.preventDefault();
            peticionAjaxGuardarPermisos();
    
        } 
    });
}
loadListenersForInterfaceRoles();

//***************************************************************************************************************************/
///TIPO DE GRUPOS DE FUNCIONES
/*
- FUNCIONES DE ROL
- FUNCIONES DE GUARDADO
- FUNCIONES DE MOVIMIENTO DE PERMISOS
- FUNCIONES DE MODULOS
- FUNCIONES DE ASIGNAR ROL A UN USUARIO
- FUNCIONES DE FILTRADO PARA EL SIDEBAR DE ROLES
- FUNCIONES DE FILTRADO PARA LOS PERMISOS QUE SE ESTAN MOSTRANDO
*/

//***************************************************************************************************************************/
//***************************************************************************************************************************/
//***************************************************************************************************************************/
//FUNCIONES GENERALES
function muestraPermisos(listaAverificar){
    ui.limpiarHTML(boxPermisosAsignados);
    ui.limpiarHTML(boxPermisosNoAsignados);
    
    listaAverificar.forEach(elementPermiso => {
        // Verifica si el permiso está en la lista de permisos asignados
        const [permisoEnAsignados, permisoEnNoAsignados] = objectPer.verificaSiPermisoEstaAsignado(objectPer.permisosXRol_Asignados, objectPer.permisosXRol_NoAsignados, elementPermiso);
        
        let padreBotonRol = ui.creaBotonPermiso(elementPermiso.name);
        const boxBotonDeRol = padreBotonRol.querySelector('.boxDeRol');

        if (permisoEnAsignados) {
            ui.setColorDeFondoYTexto(boxBotonDeRol, true, objectPer.permisosXRol_Originales.some(orig => orig.name === permisoEnAsignados.name));
            boxPermisosAsignados.appendChild(padreBotonRol);
        } else {
            ui.setColorDeFondoYTexto(boxBotonDeRol, false, objectPer.permisosXRol_Originales.some(orig => orig.name === permisoEnNoAsignados.name));
            boxPermisosNoAsignados.appendChild(padreBotonRol);
        }
    });
}

function inciaInterfaceOnChangeRol(rolName){
    tituloRolSeleccionado.textContent = rolName;
    objectPer.rol = rolName;

    asignarRolBoton.disabled = false;

    objectPer.rolSeleccionado = true; 
    objectPer.newPermissionsDeleted = [];
    objectPer.newPermissionsSelected = [];

    if(objectPer.moduloSeleccionado){
        let listaDeModulos = document.querySelector("#listaDeModulos");
        ui.animacionDeBoton(listaDeModulos, '.labelModulo', false, '', '', '');
        tituloModulo.textContent = "Módulos";
        objectPer.moduloSeleccionado = false;
        objectPer.modulo = '';
    }
}

function inciaInterfaceOnSave(){
    $('#modalPermisos').modal('hide');
    ui.limpiarHTML(modalListaPermisos);
    ui.limpiarHTML(modalListaPermisosEliminados);
    objectPer.newPermissionsDeleted = [];
    objectPer.newPermissionsSelected = [];
}


//***************************************************************************************************************************/
//***************************************************************************************************************************/
//***************************************************************************************************************************/
//FUNCIONES DE ROL
        
// Función para manejar la petición AJAX de permisos del Rol seleccionado
function peticionAjaxPermisosRolSeleccionado(target) {
    //inciaRol(target.getAttribute('data-target'));
    const nombreRol = target.getAttribute('data-target');
    ui.desactivaBoton(btnGuardadoPermisos, true);
    const requestData = {
        nombre: nombreRol, 
    }
    jsRolPer.peticionAjaxAplication(getPermisosRelacionadosConNombre, requestData)
    .then(response => {
        //console.log(response.rol.name);
        objectPer.actualizarPermisos(response.permisosRolSeleccionado, response.permisosOriginalesXRol, response.permisos_no_coincidentes);
        inciaInterfaceOnChangeRol(response.rol.name);
        muestraPermisos(objectPer.listaPermisos);
    })
    .catch(error => {
        console.error(error);
    });
}
//Funcion para establecer el camnbio de un rol al seleccionarse en el sidebar
//Esta verifica que no se hayan movido permisos, en caso de haberse movido abrira un modal de advertencia
function seleccionarRolDeSideBar(target) {
    if (objectPer.newPermissionsDeleted.length == 0 && objectPer.newPermissionsSelected.length == 0) {
        ui.animacionDeBoton(target.parentElement.parentElement, '.aRoles', true, '#fff', '#004A98', target);
        peticionAjaxPermisosRolSeleccionado(target);

    } else {
        const idRolConfirmarCambio = document.getElementById("idRolConfirmarCambio");
        idRolConfirmarCambio.value = target.parentElement.getAttribute("data-id");

        $('#confirmacionDeCambio').modal('show');
    }
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE MODULOS

//Funcion para abrir el dropdown con los modulos
function openDropdown(element) {
    let icon = element.parentElement.querySelector('i');
    icon.classList.toggle('fa-caret-right');
    icon.classList.toggle('fa-caret-down');
    dropdown.style.display = icon.classList.contains('fa-caret-down') ? "block" : "";
}

// Función para manejar la petición AJAX de permisos al seleccionarse un modulo
function peticionAjaxModuloSeleccionado(target) {
    const nombreModulo = target.getAttribute('data-target');

    const requestData = {
        modulo: nombreModulo, 
    }
    jsRolPer.peticionAjaxAplication(getPermisosModuloConRol, requestData)
    .then(response => {
        //console.log(response.rol.name);
        objectPer.moduloSeleccionado = true;  
        objectPer.permisosXModulo = response.permisos_modulo;
        muestraPermisos(objectPer.permisosXModulo);
    })
    .catch(error => {
        console.error(error);
    });
}   

function changeToAnotherModulo(isOtherModulo, target){
    ui.animacionDeBoton(target.parentElement.parentElement, '.labelModulo', true, ui.colorPrincipal, '#fff', target);

    if(isOtherModulo){
        tituloModulo.textContent = target.getAttribute('data-target');
        objectPer.modulo = target.getAttribute('data-target');
    }else{
        tituloModulo.textContent = "Módulos";
        objectPer.modulo = "";
        objectPer.moduloSeleccionado = false;
    }
}

//Funcion para establecer el UI al seleccionarse un Rol
function onclickModulo(target) {
    if (!objectPer.rolSeleccionado) {
        console.log("No se ha seleccionado ningún rol");
        return;
    }else if(target.id === "opcionTodosModulos") {
        changeToAnotherModulo(false, target);
        muestraPermisos(objectPer.listaPermisos);
    } else {
        changeToAnotherModulo(true, target);
        peticionAjaxModuloSeleccionado(target);
    }
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE MOVIMIENTO DE PERMISOS

//Funcion para la dinamica de movimiento de permisos Asignados o No Asigandos
//En este caso hay 3 acciones importantes

//1: fuenteList y destinoList; ayudan a definir desde donde se va mover el permiso y a donde va (const permisosFuente = objectPer[sourceList]; const permisosDestino = objectPer[targetList];)
//2: Se difine los colores al moverse un permiso
//3: Se editan las newPermissionsSelected o newPermissionsDeleted, para establecer posteriormente que permisos seran guardados y que permisos no seran guardados
function muevePermisoEnListas(nombrePermiso, isAsignados) {
    let newPermissionsSelected = objectPer['newPermissionsSelected'];
    let newPermissionsDeleted = objectPer['newPermissionsDeleted'];
    //Jorge D. R.M.
    const fuenteList = isAsignados ? 'permisosXRol_Asignados' : 'permisosXRol_NoAsignados';
    const destinoList = isAsignados ? 'permisosXRol_NoAsignados' : 'permisosXRol_Asignados';

    const permisoMovido = objectPer[fuenteList].find(permiso => permiso.name === nombrePermiso);

    if (permisoMovido) {

        //PRIMERA PARTE: 1°
        const permisosFuente = objectPer[fuenteList];
        const permisosDestino = objectPer[destinoList];

        //SEGUNDA PARTE: 2°
        updateColorForMovePermission(isAsignados, permisoMovido, permisosFuente, permisosDestino, nombrePermiso);

        //TERCERA PARTE: 3°
        updateListPermissionsDeletedAndSelected(permisosFuente, newPermissionsSelected, newPermissionsDeleted, permisoMovido);
    }
}

function updateListPermissionsDeletedAndSelected(permisosFuente, newPermissionsSelected, newPermissionsDeleted, permisoMovido){
    if(permisosFuente === objectPer.permisosXRol_NoAsignados){
        if(objectPer.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) == null){
            newPermissionsSelected.push(permisoMovido);
        }
        if(newPermissionsDeleted.find(permiso => permiso.name === permisoMovido.name)){
            newPermissionsDeleted.splice(newPermissionsDeleted.indexOf(permisoMovido), 1);
        }
    }else if(permisosFuente === objectPer.permisosXRol_Asignados){
        if(objectPer.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) != null){
            newPermissionsDeleted.push(permisoMovido);
        }
        if(newPermissionsSelected.find(permiso => permiso.name === permisoMovido.name)){
            newPermissionsSelected.splice(newPermissionsSelected.indexOf(permisoMovido), 1);
        }
    }

    objectPer.asignaListaDePermisos(newPermissionsSelected, newPermissionsDeleted);
}

function updateColorForMovePermission(isAsignados, permisoMovido, permisosFuente, permisosDestino, nombrePermiso){
    const backgroundColor = isAsignados ? 
    (objectPer.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) ? ui.colorPermisoEliminado : ui.colorPermisoNoAsignado) : 
    (objectPer.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) ? ui.colorPermisoAsignado : ui.colorPermisoNuevo);

    const color = backgroundColor === ui.colorPermisoNoAsignado ? 'black' : 'white';
    permisosFuente.splice(permisosFuente.indexOf(permisoMovido), 1);
    permisosDestino.push(permisoMovido);

    const permisoElement = document.getElementById(nombrePermiso);
    permisoElement.style.backgroundColor = backgroundColor;
    permisoElement.style.color = color;
}

// Función para verificar el click en el cuadro de rol en el sidebar
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
//FUNCIONES DE GUARDADO
        
//Funcion para abrir un modal al intentar guardar
function openModalForSave() {
    const modalTituloRol = document.getElementById("modalTituloRol");
    const modalSubTituloRol = document.getElementById("modalSubTituloRol");

    modalTituloRol.textContent = objectPer.rol;
    modalSubTituloRol.textContent = objectPer.rol;
    ui.limpiarHTML(modalListaPermisos);
    ui.limpiarHTML(modalListaPermisosEliminados);

    ui.muestraPermisosEnModal(objectPer.newPermissionsSelected, modalListaPermisos);
    ui.muestraPermisosEnModal(objectPer.newPermissionsDeleted, modalListaPermisosEliminados);

    $('#modalPermisos').modal('show');
}

// Función para mostrar los resultados guardados
function muestraResultadosGuardado() {
    //JDRM
    btnGuardadoPermisos.disabled = true;
    if (objectPer.moduloSeleccionado) {
        muestraPermisos(objectPer.permisosXModulo);
    } else {
        muestraPermisos(objectPer.listaPermisos);
    }
}

// Función para realizar una petición AJAX para el guardado de permisos
function peticionAjaxGuardarPermisos() {
    const requestData = {
        rol: objectPer.rol,
        permisosXRol_Asignados: objectPer.permisosXRol_Asignados
    };

    jsRolPer.peticionAjaxAplication(guardarPermisos, requestData)
    .then(response => {
        inciaInterfaceOnSave();
        ui.desactivaBoton(btnGuardadoPermisos, true);
        objectPer.actualizarPermisos(response.permisosRol, response.permisosOriginalesXRol, response.permisos_no_coincidentes);
        muestraResultadosGuardado();
    })
    .catch(error => {
        console.error(error);
    });
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE ASIGNAR ROL A UN USUARIO
function peticionAjaxGuardarUsuariosXRol(listaDeUsuariosAdded){
    const endpoint = guardarUsuariosXRol;
    const requestData = {
        rol: objectPer.rol,
        listaDeUsuariosAdded: listaDeUsuariosAdded,
    };

    jsRolPer.peticionAjaxAplication(guardarUsuariosXRol, requestData)
    .then(response => {
        $('#modalAsignaRolAUsuario').modal('hide');
    })
    .catch(error => {
        console.error(error);
    });
}

function saveRolForUser(){
    const listaDeUsuarios = modalAsignaRolAUsuario.querySelector('#listaDeUsuarios');
    const divs = Array.from(listaDeUsuarios.children);
    var listaDeUsuariosAdded = [];

    divs.forEach(div => {
        let input = div.querySelector('input');
        let target = div.getAttribute('data-id');

        if (input.checked) {
            listaDeUsuariosAdded.push(div.getAttribute('data-id'));
        } 
    });

            peticionAjaxGuardarUsuariosXRol(listaDeUsuariosAdded);
}

function muestraUsuarios(usuariosXRol, users){
    //ui.limpiarHTML(modalAsignaRolAUsuario.querySelector("#listaDeUsuarios"));
    const listaDeUsuarios = modalAsignaRolAUsuario.querySelector("#listaDeUsuarios");
    ui.limpiarHTML(modalAsignaRolAUsuario.querySelector("#listaDeUsuarios"));
    ui.creaBotonUsuario(users, usuariosXRol, listaDeUsuarios);

     $('#modalAsignaRolAUsuario').modal('show');
}

function peticionAjaxUsuarios(){
    const xhr = new XMLHttpRequest();
    const endpoint = getUsuariosXRol;
            
    const requestData = {
        rol: objectPer.rol,
    };
            
    xhr.open('POST', endpoint, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const data = JSON.parse(xhr.responseText);
                muestraUsuarios(data.usersXRol, data.users);
            } catch (error) {
                console.error("Error al procesar la respuesta:", error);
            }
        } else {
            console.error("Error en la solicitud. Código de estado: " + xhr.status);
        }
    };
    xhr.onerror = function () {
        console.error("Error en la solicitud.");
    };
    xhr.send(JSON.stringify(requestData));
}

function openModalToAssignToAUser(){
    const titulo = modalAsignaRolAUsuario.querySelector("#modalAsignaRolAUsuarioTitle");
    const subtitulo = modalAsignaRolAUsuario.querySelector("#asignaRolAUsuarioSubTitle");

    titulo.textContent = objectPer.rol;
    subtitulo.textContent = objectPer.rol;

    peticionAjaxUsuarios();
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE FILTRADO PARA EL SIDEBAR DE ROLES

const filtroRoles = new filtro.Filtro({
    name: ''
});

//Event Listener para los select de busqueda
buscadorSidebar.addEventListener('input', e => {
    filtroRoles.datosDeBusqueda.name = e.target.value;
    filtrarRol();
});

//Funcion que realiza el filtrado con la busqueda, sobre la lista, en caso Object.listaRoles
function filtrarRol() {
    const resultado = objectPer.listaRoles.filter( filtroRoles.filtrarSearch.bind(filtroRoles) );
    //const boxMensajeNoResultados = document.getElementById('boxMensajeNoResultados');
            
    filtroRoles.showResultados(listaRoles, resultado);
}

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//FUNCIONES DE FILTRADO PARA LOS PERMISOS QUE SE ESTAN MOSTRANDO

const filtroPermisos = new filtro.Filtro({
    name: ''
});

//Event Listener para los select de busqueda
buscadorPermiso.addEventListener('input', e => {
    filtroPermisos.datosDeBusqueda.name = e.target.value;
    filtrarPermiso();
});
    
//Funcion que realiza el filtrado con la busqueda, sobre la lista, en caso Object.listaRoles
function filtrarPermiso() {
    const resultado = objectPer.listaPermisos.filter(filtroPermisos.filtrarSearch.bind(filtroPermisos));

    filtroPermisos.showResultados(boxPermisosAsignados, resultado);
    filtroPermisos.showResultados(boxPermisosNoAsignados, resultado);
}