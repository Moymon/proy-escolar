@extends('adminlte::page')
@extends('modalAlumnos')

@section('title', 'Kardex')
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables',true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h1>Catalogo de usuarios del sistema</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible default_cursor_cs">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <i class="icon fas fa-exclamation-triangle" > Alerta </i>
                Error en la solicitud. El registro {{$error}} ya existe
            </div>
        @endforeach
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible default_cursor_cs">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <i class="icon fas fa-check" > Éxito </i>
            Solicitud realizada satisfactoriamente
        </div>
    @endif
    
    @livewire('administracionuserindex')
@stop

@section('footer')
    <div></div>
@stop

@section('css')
@stop

@section('js')
    <script>

            /******CLASES******/
            //CLASE para manipular toda la informacion de un rol seleccionado
            class Rol {
                //variables necesarias para el la manipulacion de un rol
                constructor(){
                    this.rol = ''; //El Rol seleccionado
                    this.rolSeleccionado = false; //Variable para indicar si un rol fue seleccionado
                    this.listaRoles = {}; //Objeto general de todos los roles retornada desde laravel

                    this.ObjetoRoles = {}; //Objeto general de todos los roles retornados desde laravel

                    this.rolesXUsuario = {}; //Objeto para todos los roles
                    this.rolesXUsuario_Asignados = {}; //Objeto para los roles asignados del usuario
                    this.rolesXUsuario_NoAsignados = {}; //Objeto para los roles no asignados del usuario
                    this.rolesXUsuario_Originales = {}; //Objeto para los roles originales del usuario 
                    //Utilizar el mismo concepto de las variables 
                    this.newRolesSelected = []; //Guardara momentaneamente los roles que se moveran a los Asigandos
                    this.newRolesDeleted = []; ////Guardara momentaneamente los roles que se moveran a los Eliminados

                    /*Originales*/
                    this.ObjetoPermisos = {}; //Objeto general de todos los permisos retornada desde Laravel


                    this.permisosXModulo = {}; //Objeto para los permisos del modulo seleccionado
                    this.permisosXRol_Asignados = {}; //Objeto para los permisos asignados del Rol seleccionado
                    this.permisosXRol_NoAsignados = {}; //Objeto para los permisos no asignados del Rol seleccionado
                    this.permisosXRol_Originales = {}; //Objeto para los permisos asignados al Rol seleccionado

                    //DIFERENCIAS
                    // *permisosXRol_Asignados(NoAsignados): sera dinamica cada que cambie un permiso a los no asignados o se le agregue un permiso
                    // *permisosXRol_Originales: se mantendra los permisos del rol al seleccionarlo, esto permitira hacer una comparacion en caso de haber cambios de permisos en el rol
                    //Estas variables me permitiran mostrar los permisos que seran guardados o eliminados en un modal
                    this.newPermissionsSelected = []; //Guardara momentaneamente los permisos que se moveran a los Asigandos
                    this.newPermissionsDeleted = []; ////Guardara momentaneamente los permisos que se moveran a los Eliminados
                }


                //Funcion para guardar los permisos que van siendo movidos y comprobar las listas de los asignados con los originales para deshabilitar el boton de guardado
                asignaListaDePermisos(newPermissionsSelected, newPermissionsDeleted) {
                    this.newPermissionsSelected = newPermissionsSelected;
                    this.newPermissionsDeleted = newPermissionsDeleted;

                    //console.log(permisosAsignados);
                    // Crear conjuntos a partir de las listas, esto para hacer mas rapido la comparacion
                    const setPermisosAsignados = new Set(this.permisosXRol_Asignados);
                    const setPermisosOriginales = new Set(this.permisosXRol_Originales);
                    if (this.comparaListaDePermisos(setPermisosAsignados, setPermisosOriginales )) {
                        btnGuardadoPermisos.disabled = true;
                    } else {
                        btnGuardadoPermisos.disabled = false;
                    }
                }

                //Funcion para guardar los roles en base al movimiento y comprobar las listas de los asignados con los originales para deshabilitar el boton de guardado
                asignaListaDeRoles(newRolesSelected, newRolesDeleted) {
                    this.newRolesSelected = newRolesSelected;
                    this.newRolesDeleted = newRolesDeleted;

                    //console.log(permisosAsignados);
                    // Crear conjuntos a partir de las listas, esto para hacer mas rapido la comparacion
                    const setRolesAsignados = new Set(this.rolesXUsuario_Asignados);
                    const setRolesOriginales = new Set(this.rolesXUsuario_Originales);
                    if (this.comparaListaDeRoles(setRolesAsignados, setRolesOriginales )) {
                        btnGuardarRoles.disabled = true;
                    } else {
                        btnGuardarRoles.disabled = false;
                    }
                }            

                //Funcion para comparar dos listas si son iguales
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

                //Funcion para comparar dos listas si son iguales
                comparaListaDeRoles(setAsignados, setOriginales) {
                    let rolMovido;
                    
                    if (setAsignados.size !== setOriginales.size) {
                        //console.log(setAsignados.size + " setAsigandos");
                        //console.log(setOriginales.size + " setOriginales");
                        return false;
                    }

                    for (let item of setOriginales) {
                        rolMovido = this.rolesXUsuario_Asignados.find(rol => rol.name === item.name);
                        //console.log(rolMovido);
                        if (!rolMovido) {
                            return false;
                        }
                    }
                    return true;
                }

                //Funcion setter cuando se seleccione un nuevo Rol
                actualizarPermisos(permisosRol, permisosOriginalesXRol, permisos_no_coincidentes){
                    this.permisosXRol_Asignados = permisosRol;
                    this.permisosXRol_Originales = permisosOriginalesXRol;
                    this.permisosXRol_NoAsignados = permisos_no_coincidentes;
                }

                //Funcion que actualiza el la interfaz al nuevo Rol seleccionado y llama a la peticion AJAX del rol
                funcionPeticionDeRoles(target){
                    tituloRolSeleccionado.textContent = target.textContent;
                    nombreRolSeleccionadoDeSideBar.value = target.textContent;
                    this.rol = target.textContent;

                    peticionAjaxPermisosRolSeleccionado();
                }

                //Funcion que actualiza  la interfaz al nuevo Rol o Usuario seleccionado y llama a la peticion AJAX correspondiente
                peticion(target){
                    this.rol = target.getAttribute('data-id');
                    peticionAjaxSeleccionado();
                }

            }

            //Clase para englobar aquellos metodos que definen, cambian estilos o HTML de la interfaz
            class UI {

                //Variables para los colores de la interfaz
                //Cambiarlos aqui cambiara todos los calores de la interfaz
                constructor(){
                    this.colorPrincipal = "#004A98";
                    this.colorSecundario = "#2C6DB1";
                    
                    this.colorPermisoAsignado = "#004A98";
                    this.colorPermisoNoAsignado ="rgb(242, 242, 242)";
                    this.colorPermisoEliminado = "#DA0000";
                    this.colorPermisoNuevo= "#00B600";

                    this.colorAsignado = "#004A98";
                    this.colorNoAsignado ="rgb(242, 242, 242)";
                    this.colorEliminado = "#DA0000";
                    this.colorNuevo= "#00B600";
                }

                //Funcion para crear los botones de los permisos
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

                //Funcion para crear los botones
                creaBoton(nombre){
                    let padreBoton = this.createElementHTML('div', '', 'col-3 padreBotonRol h-auto', '', '');
                    padreBoton.setAttribute("data-id", nombre);

                    let boxBoton = this.createElementHTML('div', '', 'mb-1 ml-1 boxDeRol p-1 pr-2 border rounded-pill d-flex flex-row align-items-center justify-content-between', nombre, '');
                    //boxBotonDeRol.setAttribute('onclick', 'verificaClickBoxDeRol(this)');

                    let labeLBoton = this.createElementHTML('div', 'user-select: none;', 'labeLBotonRol ml-1 text-wrap text-center h-100 w-100', '', nombre);

                    boxBoton.appendChild(labeLBoton);
                    padreBoton.appendChild(boxBoton);

                    return padreBoton;
                }            

                //Esta funcion define el color al seleccionarse un nuevo Rol, entre los que estan asignados y los que no estan Asignados
                //Ademas aquellos que son nuevos asignados o eliminados
                setColorDeFondoYTexto(boxBotonDeRol, esAsignado, esOriginal) {
                    const backgroundColor = esAsignado ? (esOriginal ? this.colorPermisoAsignado : this.colorPermisoNuevo) : (esOriginal ? this.colorPermisoEliminado : this.colorPermisoNoAsignado);
                    const color = backgroundColor === this.colorPermisoNoAsignado ? 'black' : 'white';
                    boxBoton.style.backgroundColor = backgroundColor;
                    boxBoton.style.color = color;
                }

                //Esta funcion define el color, entre los que estan asignados y los que no estan Asignados
                //Ademas aquellos que son agregados, asignados o eliminados
                setColorDeFondoYTexto2(boxBoton, esAsignado, esOriginal) {
                    const backgroundColor = esAsignado ? (esOriginal ? this.colorAsignado : this.colorNuevo) : (esOriginal ? this.colorEliminado : this.colorNoAsignado);
                    const color = backgroundColor === this.colorNoAsignado ? 'black' : 'white';
                    boxBoton.style.backgroundColor = backgroundColor;
                    boxBoton.style.color = color;
                }

                //Funcion que compara los permisos en las listas para posteriomente definir su color
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

                //Funcion que compara en las listas para posteriomente definir su color
                verificaSiEstaAsignado(Asignados, NoAsignados, padreBoton, boxBoton, rol) {

                    const nombre = rol.name.toLowerCase();
                    const EnAsignados = Asignados.find(seleccionado => seleccionado.name.toLowerCase() === nombre);
                    const EnNoAsignados = NoAsignados.find(seleccionado => seleccionado.name.toLowerCase() === nombre);

                    if (EnAsignados) {
                        this.setColorDeFondoYTexto2(boxBoton, true, objectRol.rolesXUsuario_Originales.some(orig => orig.name ===  EnAsignados.name));
                        boxRolesAsignados.appendChild(padreBoton);
                    } else {
                        this.setColorDeFondoYTexto2(boxBoton, false, objectRol.rolesXUsuario_Originales.some(orig => orig.name === EnNoAsignados.name));
                        boxRolesNoAsignados.appendChild(padreBoton);
                    }
                }

                //Funcion que recorres todos los elementos del sidebar de roles para en caso de ser seleccionado, cambiar su color de estado
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

                //Funcion bandera para distribuir los elementos de un rol seleccionado, y mandarlos animacionDeBotonSidebarOModulo para cambiar su color de estado
                funcionPeticionDeRolesUI(target) {
                    const divs = Array.from(target.parentElement.parentElement.children);
                    this.animacionDeBotonSidebarOModulo(divs, target, '.aRoles', '#fff', '#004A98');
                }

                //Funcion que limpia todos los hijos de un elemento HTML
                limpiarHTML(element){
                    while(element.firstChild){
                        element.removeChild(element.firstChild);
                    }
                }

                //Funcion que crea un elemento HTML
                createElementHTML(element, style, clase, id, textContent) {
                    element = document.createElement(element);
                    element.setAttribute('style', style);
                    element.setAttribute('class', clase);
                    element.id = id;
                    element.textContent = textContent;

                    return element;
                }

                //Funcion que quita toda la informacion del modulo que se selecciono, en este caso solo se usa cuando se cambia de rol
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

            }

            //Instancias de las clases
            const ui = new UI();
            const objectRol = new Rol();

            //***************************************************************************************************************************/
            //***************************************************************************************************************************/
            //***************************************************************************************************************************/
            //Variables y AddEventListeners

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Almacenar elementos en variables para un acceso más rápido

            //Elemento del sidebar de ROLES
            const formRolDeSideBar = document.getElementById("formRolDeSideBar");
            const nombreRolSeleccionadoDeSideBar = document.getElementById("nombreRolSeleccionadoDeSideBar");

            const listaRoles = document.getElementById('listaRoles');
            const sidebarCollapse = document.getElementById("sidebarCollapse");
            const sidebar = document.getElementById("sidebar");
            const buscadorSidebar = document.getElementById("searchSideBarRoles");

            //Elementos de la ventana de permisos
            const tituloRolSeleccionado = document.getElementById("tituloRolSeleccionado");
            const boxPermisosAsignados = document.getElementById("boxPermisosAsignados");
            const boxPermisosNoAsignados = document.getElementById("boxPermisosNoAsignados");
            const buscadorPermiso = document.getElementById("buscadorPermiso");


            //Elementos de la venta de permisos, especificos para el Modulo
            const tituloModulo = document.getElementById("tituloModulo");
            const formModulosDeRol = document.getElementById("formModulosDeRol");

            //Boton para el guardado
            const btnGuardadoPermisos = document.getElementById("btnGuardadoPermisos");

            //Dropdown
            const dropdown = document.getElementById("dropdown-content");

            //elementos del MODAL donde se muestran los permisos que se van a guardar o eliminar
            const modalListaPermisos = document.getElementById("modalListaPermisos");
            const modalListaPermisosEliminados = document.getElementById("modalListaPermisosEliminados");
            const btnGuardadoPermisosModal = document.getElementById("btnGuardadoPermisosModal");
            const modalConfirmacionDeCambio =  document.getElementById("confirmacionDeCambio");

            //Seccion de indices para los colores del los permisos
            const indiceAsignados = document.getElementById("indiceAsignados");
            const indiceNuevos = document.getElementById("indiceNuevos");
            const indiceEliminados = document.getElementById("indiceEliminados");
            const indiceNoAsiganados = document.getElementById("indiceNoAsiganados");

            //elementos de la secuencia de creacion de un NuevoRol
            const botonNuevoRol = document.getElementById("botonNuevoRol");
            const botonCrearRol = document.getElementById("botonCrearRol");

            //Botones en Modal Permamencia de Rol
            const permanecerEnRol = document.getElementById("permanecerEnRol");

            //Definicion de los roles y permisos que llegan al inicia de la vista desde un controlador
            objectRol.listaRoles = @json($roles);

            //Listener para la configuracion de colores al entrar a la vista, esto sirve para que en la clase UI, se pueda poner cualquier color
            document.addEventListener("DOMContentLoaded", () => {
                btnGuardadoPermisos.disabled=true;

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
            });

            //Listner para el CLICK: este es el evento principal de la interfaz, la mayoria de acciones suceden atraves de un click
            document.addEventListener("click", function (event) {
                if (event.target.classList.contains("rolDeSidebarSeleccionable")) {
                    event.preventDefault();
                    seleccionarRolDeSideBar(event.target);
                } else if(event.target.id === "btnConfirmarCambio"){
                    event.preventDefault();
                    const inputCambio = modalConfirmacionDeCambio.querySelector('#idRolConfirmarCambio');
                    const rolParaCambio = listaRoles.querySelector(`#${inputCambio.value}`);
                    ui.funcionPeticionDeRolesUI(rolParaCambio.children[0]);
                    objectRol.funcionPeticionDeRoles(rolParaCambio.children[0]);
                    inputCambio.value = "";

                }else if (event.target === sidebarCollapse) {
                    event.preventDefault();
                    sidebar.classList.toggle("active");
                    const sidebarIcon = document.getElementById("sidebarIcon");
                    sidebarIcon.classList.toggle("fa-times"); // Si es fa-align-left, cambia a fa-xmark
                    sidebarIcon.classList.toggle("fa-align-left"); // Si es fa-xmark, cambia a fa-align-left

                } else if(event.target.classList.contains("labelModulo")){
                    event.preventDefault();
                    onclickModulo(event);

                /*Quinto if para los movimientos de roles*/
                } else if(event.target.classList.contains("boxDeRol") || event.target.classList.contains("labeLBotonRol")){
                    event.preventDefault();
                    if(event.target.classList.contains("labeLBotonRol")){
                        //verificaClickBoxDeRol(event.target.parentElement);
                        verificaClickBox(event.target.parentElement);
                    }else{
                        //verificaClickBoxDeRol(event.target);
                        verificaClickBox(event.target);
                    }
                }else if (event.target.id === "btnGuardadoPermisos"){
                    event.preventDefault();
                    openModalForSave();

                } else if (event.target.id === "btnGuardadoPermisosModal"){
                    event.preventDefault();
                    peticionAjaxGuardarPermisos();

                } else if (event.target.id === "cierreDeModulos" || event.target.id === "iconoCierreDeModulos"){
                    event.preventDefault();
                    openDropdown(tituloModulo);

                } else if(event.target.classList.contains("openDropdown")){
                    event.preventDefault();
                    openDropdown(event.target);
                }
            });


            //Listener para el CLICK sobre la tabla: este es el evento principal para operar la tabla
            document.querySelector("#tabla_usuarios tbody").addEventListener("click", function (event) {
                //console.log("Entre 1");
                if (event.target.classList.contains("seleccionable")) {
                    //console.log("Entre 2");
                    event.preventDefault();
                    seleccionar(event.target);
                }
            });

            document.addEventListener("click", function (event){
                if(event.target.id === "btnGuardarRoles"){
                    event.preventDefault();
                    $('#confirmarRol').modal('show');
                }else if(event.target.id === "btnConfirmarRoles"){
                    event.preventDefault();
                    peticionAjaxGuardar();
                }
            });

            //***************************************************************************************************************************/
            //***************************************************************************************************************************/
            //***************************************************************************************************************************/

            function muestraRolesUsuarioSeleccionado() {
                ui.limpiarHTML(boxRolesAsignados);
                ui.limpiarHTML(boxRolesNoAsignados);
                //console.log('muestraRolesUsuarioSeleccionado', objectRol);
                objectRol.listaRoles.forEach(elementRol => {
                    let padreBoton = ui.creaBotonPermiso(`${elementRol.name}`);
                    const boxBoton = padreBoton.querySelector('.boxDeRol');
                    //console.log(objectRol);
                    ui.verificaSiEstaAsignado(objectRol.rolesXUsuario_Asignados, objectRol.rolesXUsuario_NoAsignados, padreBoton, boxBoton, elementRol);
                    //console.log(elementRol.name);
                });
                
            }

            // Función para realizar una petición AJAX para el guardado de permisos
            function peticionAjaxSeleccionado() {
                const endpoint = '{{ route('getRolesNombre') }}'
                const requestData = {
                    rol: objectRol.rol,
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
                    //console.log(response);
                    /*
                    if (!response.ok) {
                        throw new Error("Error en la solicitud. Código de estado: " + response.status);
                    }*/
                    return response.json();
                })
                .then(data => {
                    //console.log('peticionAjaxSeleccionado', data);
                    //console.log('peticionAjaxSeleccionado',objectRol);
                    //$('#actualizarRol').modal('show');
                    objectRol.newRolesSelected = [];
                    objectRol.newRolesDeleted = [];
                    objectRol.listaRoles = data.roles;
                    objectRol.rolesXUsuario_Asignados = data.rolesUserSeleccionado;
                    objectRol.rolesXUsuario_Originales = data.rolesOriginalesUser;
                    objectRol.rolesXUsuario_NoAsignados = data.rolesNoCoincidentes;
                    
                    muestraRolesUsuarioSeleccionado();
                    $('#actualizarRol').modal('show');
                    /*
                    $('#permisosModal').modal('hide');
                    btnGuardadoPermisos.disabled = true;
                    ui.limpiarHTML(modalListaPermisos);
                    ui.limpiarHTML(modalListaPermisosEliminados);
                    objectRol.newPermissionsDeleted = [];
                    objectRol.newPermissionsSelected = [];
                    objectRol.actualizarPermisos(data.permisosRol, data.permisosOriginalesXRol, data.permisos_no_coincidentes);
                    muestraResultadosGuardado();
                    */
                })
                .catch(error => {
                    console.error("Error en la solicitud:", error);
                });
            }

            // Función para realizar una petición AJAX para el guardado
            function peticionAjaxGuardar() {
                const endpoint = '{{ route('guardarRoles') }}'
                const requestData = {
                    rol: objectRol.rol,
                    asignados: objectRol.rolesXUsuario_Asignados,
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
                    //console.log(data);
                    $('#actualizarRol').modal('hide');
                    $('#confirmarRol').modal('hide');

                    Swal.fire({
                        type: 'success',
                        text: 'Cambios realizados',
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        window.location ='/usuarios';
                    });
                    /*
                    $('#permisosModal').modal('hide');
                    btnGuardadoPermisos.disabled = true;
                    ui.limpiarHTML(modalListaPermisos);
                    ui.limpiarHTML(modalListaPermisosEliminados);
                    objectRol.newPermissionsDeleted = [];
                    objectRol.newPermissionsSelected = [];
                    objectRol.actualizarPermisos(data.permisosRol, data.permisosOriginalesXRol, data.permisos_no_coincidentes);
                    muestraResultadosGuardado();*/
                })
                .catch(error => {
                    console.error("Error en la solicitud:", error);
                });
            }

            //Funcion para establecer el camnbio de un rol al seleccionarse en el sidebar
            //Esta verifica que no se hayan movido permisos, en caso de haberse movido abrira un modal de advertencia
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

            //Funcion para seleccion de rol o usuario
            //Esta verifica que no se hayan movido permisos, en caso de haberse movido abrira un modal de advertencia
            function seleccionar(target) {
                
                objectRol.peticion(target);
            }

            //**************************************************************************************************************
            //**************************************************************************************************************
            //**************************************************************************************************************
            //Funcion para abrir un modal al intentar guardar
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


            //Funcion para la dinamica de movimiento de permisos Asignados o No Asigandos
            //En este caso hay 3 acciones importantes

            //1: sourceList y targetList; ayudan a definir desde donde se va mover el permiso y a donde va (const permisosFuente = objectRol[sourceList]; const permisosDestino = objectRol[targetList];)
            //2: Se difine los colores al moverse un permiso
            //3: Se editan las newPermissionsSelected o newPermissionsDeleted, para establecer posteriormente que permisos seran guardados y que permisos no seran guardados
            function muevePermisoEnListas(nombrePermiso, isAsignados) {
                let newPermissionsSelected = objectRol['newPermissionsSelected'];
                let newPermissionsDeleted = objectRol['newPermissionsDeleted'];

                const sourceList = isAsignados ? 'permisosXRol_Asignados' : 'permisosXRol_NoAsignados';
                const targetList = isAsignados ? 'permisosXRol_NoAsignados' : 'permisosXRol_Asignados';

                const permisoMovido = objectRol[sourceList].find(permiso => permiso.name === nombrePermiso);

                if (permisoMovido) {

                    //PRIMERA PARTE: 1°
                    const permisosFuente = objectRol[sourceList];
                    const permisosDestino = objectRol[targetList];

                    //SEGUNDA PARTE: 2°
                    const backgroundColor = isAsignados ? 
                    (objectRol.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) ? ui.colorPermisoEliminado : ui.colorPermisoNoAsignado) : 
                    (objectRol.permisosXRol_Originales.find(permiso => permiso.name === permisoMovido.name) ? ui.colorPermisoAsignado : ui.colorPermisoNuevo);

                    const color = backgroundColor === ui.colorPermisoNoAsignado ? 'black' : 'white';
                    permisosFuente.splice(permisosFuente.indexOf(permisoMovido), 1);
                    permisosDestino.push(permisoMovido);

                    const permisoElement = document.getElementById(nombrePermiso);
                    permisoElement.style.backgroundColor = backgroundColor;
                    permisoElement.style.color = color;

                    //TERCERA PARTE: 3°
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

                    objectRol.asignaListaDePermisos(newPermissionsSelected, newPermissionsDeleted);
                }
            }

            function mueveEnListas(nombre, isAsignados){
                let newSelected = objectRol['newRolesSelected'];
                let newDeleted = objectRol['newRolesDeleted'];

                const sourceList = isAsignados ? 'rolesXUsuario_Asignados' : 'rolesXUsuario_NoAsignados';
                const targetList = isAsignados ? 'rolesXUsuario_NoAsignados' : 'rolesXUsuario_Asignados';

                const movido = objectRol[sourceList].find(rol => rol.name === nombre);

                if (movido) {

                    //PRIMERA PARTE: 1°
                    const fuente = objectRol[sourceList];
                    const destino = objectRol[targetList];

                    //SEGUNDA PARTE: 2°
                    const backgroundColor = isAsignados ? 
                    (objectRol.rolesXUsuario_Originales.find(rol => rol.name === movido.name) ? ui.colorPermisoEliminado : ui.colorPermisoNoAsignado) : 
                    (objectRol.rolesXUsuario_Originales.find(rol => rol.name === movido.name) ? ui.colorPermisoAsignado : ui.colorPermisoNuevo);

                    const color = backgroundColor === ui.colorPermisoNoAsignado ? 'black' : 'white';
                    fuente.splice(fuente.indexOf(movido), 1);
                    destino.push(movido);

                    const permisoElement = document.getElementById(nombre);
                    permisoElement.style.backgroundColor = backgroundColor;
                    permisoElement.style.color = color;

                    //TERCERA PARTE: 3°
                    if(fuente === objectRol.rolesXUsuario_NoAsignados){
                        if(objectRol.rolesXUsuario_Originales.find(rol => rol.name === movido.name) == null){
                            newSelected.push(movido);
                        }
                        if(newDeleted.find(roles => roles.name === movido.name)){
                            newDeleted.splice(newDeleted.indexOf(movido), 1);
                        }
                    }else if(fuente === objectRol.rolesXUsuario_Asignados){
                        if(objectRol.rolesXUsuario_Originales.find(rol => rol.name === movido.name) != null){
                            newDeleted.push(movido);
                        }
                        if(newSelected.find(rol => rol.name === movido.name)){
                            newSelected.splice(newSelected.indexOf(movido), 1);
                        }
                    }

                    objectRol.asignaListaDeRoles(newSelected, newDeleted);
                }
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

            function verificaClickBox(element){
                const $element = $(element);
                const $contenedorPadre = $element.closest(".padreBotonRol");
                const isAsignados = $element.closest(".permisosAsignados").length > 0;
                const $contenedorDestino = isAsignados ? $(".permisosNoAsigandos") : $(".permisosAsignados");
                const styleBackground = isAsignados ? 'background-color:'+ ui.colorPermisoNoAsignado +';color:black;' : 'background-color:'+ ui.colorPermisoAsignado + ';color:white;';

                $contenedorPadre.appendTo($contenedorDestino);
                $element.attr('style', styleBackground);

                mueveEnListas(element.id, isAsignados);
            }


            //**************************************************************************************************************
            //**************************************************************************************************************
            //**************************************************************************************************************
            //Funciones de Modulos
            //Funcion para abrir el dropdown con los modulos
            function openDropdown(element) {
                let icon = element.parentElement.querySelector('i');
                icon.classList.toggle('fa-caret-right');
                icon.classList.toggle('fa-caret-down');
                dropdown.style.display = icon.classList.contains('fa-caret-down') ? "block" : "";
            }

            //Funcion para mostrarse los permisos en caso de seleccionarse un modulo
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


            //Funcion para establecer el UI y al seleccionarse un Rol
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


            //Funcion que realiza el filtrado con la busqueda, sobre la lista, en caso Object.listaRoles
            function filtrarRol() {
                const resultado = objectRol.listaRoles.filter( filtroRoles.filtrarSearch.bind(filtroRoles) );
                //const boxMensajeNoResultados = document.getElementById('boxMensajeNoResultados');
                
                filtroRoles.showResultados(listaRoles, resultado);
            }

            //**************************************************************************************************************
            //**************************************************************************************************************
            //**************************************************************************************************************


    </script>

    <script>
        $(document).ready(function (){
            $('.table').DataTable({
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
    </script>

    <script>
        function verUsuario(data){
            
            var editables = ['id','nombre','rpe','apellido_pa','apellido_ma','direccion_ip','correo'];
            var id, hijos;
            Object.entries(data).forEach(([atributo, valor]) => {
                if( editables.includes(atributo) ){
                    //console.log(valor);
                    id = atributo + "Edit";
                    idForm = atributo + "Form";
                    hijos = document.getElementById(id).childElementCount;
                    editar = document.getElementById(id);
                    
                    while(editar.firstChild && hijos > 1){
                        editar.removeChild(editar.lastChild);
                        hijos = document.getElementById(id).childElementCount;
                    }

                    var padreInput = document.createElement('input');
                    padreInput.setAttribute("class","form-control");
                    padreInput.setAttribute("value",valor);
                    padreInput.setAttribute("name",idForm);

                    if(idForm === "idForm"){
                        padreInput.setAttribute("readonly","readonly");
                    }
                    
                    editar.appendChild(padreInput);
                }
            });

            $('#editarUsuario').modal('show');
        }
    </script>
@stop