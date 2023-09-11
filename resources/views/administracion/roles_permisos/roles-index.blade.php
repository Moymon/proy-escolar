@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-6">
                <h1>Roles del sistema
                </h1>
            </div>
        </div>
    </div>

    <!--
    vite(['resources/css/rolesYPermisos.css'])
    -->
    
@stop

@section('content')
    <!--
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-info" data-toggle="modal" data-target="#nuevoRol" ><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <br>
            <table id="tabla_roles" class="table table-bordered table-striped dataTable dtr-inline">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Origen</th>
                        <th>Lista de Permisos</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{$rol->id}}</td>
                            <td>{{$rol->name}}</td>
                            <td>{{$rol->guard_name}}</td>
                            <td>
                                @foreach ($rol->permissions as $permission)
                                    <div class="badge badge-secondary"><h6>{{$permission->name}}</h6></div>
                                @endforeach
                            </td>
                            <td width="10px">Ver...<a href="/roles-edit/{{$rol->id}}"><i class="fas fa-list"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    -->
    
    <div class="shadow-sm rounded border" style="background-color:white;">
        <div>
            <div class="wrapper d-flex flex-row">

                <!-- Sidebar  -->
                <nav id="sidebar" class="rounded">
                    <div class="sidebar-header rounded">
                        <h3>Roles y Permisos</h3>
                    </div>

                    <ul class="m-0 ulRoles list-unstyled components">
                        <p class="pRoles m-0 text-center">Roles</p>
                        <div class="input-group rounded p-3">
                            <input id="searchSideBarRoles" type="search" class="form-control rounded" placeholder="Buscar rol" aria-label="Search" aria-describedby="search-addon" />
                        </div>
                    </ul>
                    <ul id="listaRoles" style="max-height:50vh;overflow:auto;" class="scrollRoles ulRoles list-unstyled components">
                        
                        @foreach ($roles as $rol)
                            <li class="liRoles" id="{{$rol->name}}" data-id="{{$rol->name}}">
                                <div class="aRoles rolDeSidebarSeleccionable">{{$rol->name}}</div>
                            </li>
                        @endforeach
                    </ul>

                    <form id="formRolDeSideBar" method="POST" action="{{ route('getPermisosRelacionadosConNombre') }}" style="display: none;visibility:hidden;">
                        @csrf
                        <input type="hidden" id="nombreRolSeleccionadoDeSideBar" name="nombre">
                    </form>
                </nav>


                
                <!-- Page Content  -->
                <div id="content" class="w-100" style="width:100%!important;">
            
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
            
                            <button type="button" id="sidebarCollapse" class="btn">
                                <i id="sidebarIcon" class="mr-1 fas fa-times"></i>
                                Roles
                            </button>
            
                            <h3 class="m-0 mb-2 text-center" id="tituloRolSeleccionado"></h3>
                            
                            <div>
                                <button id="botonNuevoRol" class="btn" data-toggle="modal" data-target="#nuevoRol" ><i class="fas fa-plus"></i></button>
                                <button class="btn btn-info">Asignar Rol</button>
                            </div>
                        </div>
                    </nav>
            
                    <div class="w-100">
                        <div id="contenedorResultadoDeRolSeleccionado" class="w-100 h-100 d-flex flex-column">

                            <div class="dropdown w-100">
                                <div class="w-100 d-flex align-items-center justify-content-center">
                                    <!--
                                    <h3 class="m-0 mb-2 text-center" id="tituloRolSeleccionado"></h3>
                                    <p class="m-0 mb-2 mx-2">/</p>
                                    -->
                                    <h3 style="user-select: none;" id="tituloModulo" class="openDropdown dropbtn rounded">Módulos<i id="iconTituloModulo" class='fa fa-caret-right ml-2'></i></h3>
                                    
                                </div>

                                <div id="dropdown-content" class="dropdown-content border p-2">
                                    <div class="w-100 d-flex align-items-center justify-content-end">
                                        <p style="cursor:pointer;" class="m-0 mr-2" id="cierreDeModulos">
                                            <i id="iconoCierreDeModulos" class='fa fa-times'></i>
                                        </p>
                                    </div>

                                    <hr classs="m-0" style="color:lightgray;">

                                    <div id="listaDeModulos" class="w-100 row m-0">
                                        <div class="boxModulo col-3 m-0 p-0 border rounded shadow-sm">
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center p-2 labelModulo" id="opcionTodosModulos">Todos</div>
                                        </div>
                                        @foreach ($modulos as $modulo)
                                            <div class="boxModulo col-3 m-0 p-0 border rounded shadow-sm">
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center p-2 labelModulo" id="{{$modulo->nombre}}">{{$modulo->nombre}}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <form id="formModulosDeRol" method="POST" action="{{ route('getPermisosModuloConRol') }}" style="display: none;visibility:hidden;">
                                    @csrf
                                    <input type="hidden" id="nombreModulo" name="modulo">
                                </form>
                            </div>

                            <div class="p-2 w-100 d-flex flex-column">
                                <h5 class="fs-5">Indice permisos:</h5>
                                <div class="w-100 d-flex flex-row align-items-center justify-content-start">
                                    <div class="d-flex flex-row mr-3 align-items-center justify-content-center">
                                        <div id="indiceAsignados" class="mr-2 rounded border"></div>
                                        <div class="fs-6">Asignados</div>
                                    </div>
                                    <div class="d-flex flex-row mr-3 align-items-center justify-content-center">
                                        <div id="indiceNuevos" class="mr-2 rounded border"></div>
                                        <div class="fs-6">Nuevos por asignar</div>
                                    </div>
                                    <div class="d-flex flex-row mr-3 align-items-center justify-content-center">
                                        <div id="indiceEliminados" class="mr-2 rounded border"></div>
                                        <div class="fs-6">Eliminados</div>
                                    </div>
                                    <div class="d-flex flex-row mr-3 align-items-center justify-content-center">
                                        <div id="indiceNoAsiganados" class="mr-2 rounded border"></div>
                                        <div class="fs-6">Sin asignar</div>
                                    </div>
                                </div>
                            </div>

                            <div id="contenedorResultadoDeRolSeleccionado" class="w-100 h-100">
                                <div class="p-2 w-100">
                                    <div class="mb-2 w-100 d-flex flex-row align-items-center justify-content-between">
                                        <h3>Permisos asignados</h3>
        
                                        <div class="input-group rounded p-3 w-50">
                                            <input id="buscadorPermiso" type="search" class="w-50 form-control rounded" placeholder="Buscar permiso" aria-label="Search" aria-describedby="search-addon" />
                                            <button id="btnGuardadoPermisos" disabled class="ml-1 w-25 btn">Guardar</button>
                                        </div>
                                    </div>
                                    <div style="max-height:50vh;overflow:auto;">
                                        <div id="boxPermisosAsignados" class="row permisosAsignados w-100 d-flex flex-row align-items-start justify-content-start">
                                        </div>
                                    </div>                   
                                </div>
        
                                <hr class="m-0">
        
                                <div class="p-2 w-100">
                                    <h3>Permisos</h3>
                                    <div style="max-height:50vh;overflow:auto;">
                                        <div id="boxPermisosNoAsignados" class="row permisosNoAsigandos w-100 d-flex flex-row align-items-start justify-content-start">
                                        
                                        </div>
                                    </div>
                                </div> 
                            </div>

                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Confirmar Permisos-->
    <div class="modal fade" id="permisosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalPermisosLabel">Permisos a guardar: <span class="text-center" id="modalTituloRol"></span></h5>
            <button type="" class="rounded px-2" data-dismiss="modal" aria-label="Close"><i class='fa fa-times'></i></button>
            </div>
            <div id="modalPermisosBody" class="modal-body">
                <div class="w-100 d-flex flex-column">
                    <h5>¿Estas seguro que quieres asignar los siguientes permisos al rol : <span class="text-center" id="modalSubTituloRol"></span>?</h5>
                    <hr class="m-0 mb-2">
                    <h3 class="text-center mb-1">Permisos por agregar</h3>
                    <div id="modalListaPermisos" class="row w-100 m-0">

                    </div>
                    <hr class="m-0 my-3">
                    <h3 class="text-center mb-1">Permisos por eliminar</h3>
                    <div id="modalListaPermisosEliminados" class="row w-100 m-0">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="btnGuardadoPermisosModal" type="button" class="btn">Guardar cambios</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Confirmar Permisos-->
    <div class="modal fade" id="confirmacionDeCambio" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <div id="modalPermisosBody" class="modal-body">
                <h5 class="text-center">¿Estás seguro de que quieres continuar sin guardar los cambios?</h5>
                <div class="w-100 d-flex flex-row align-items-center justify-content-center">
                    <button id="btnConfirmarCambio" type="button" class="mr-1 btn btn-secondary" data-dismiss="modal">Continuar</button>
                    <button id="permanecerEnRol" type="button" class="ml-1 btn btn-primary" data-dismiss="modal">Permanecer en este rol</button>
                </div>

                <input type="hidden" style="display:none;" id="idRolConfirmarCambio">
            </div>
        </div>
        </div>
    </div>

    <!-----Modal Nuevo Rol------>
    <div class="modal fade" id="nuevoRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{route("crearRoles")}}">
                                @csrf
                                <div class="form-group"> 
                                    <div class="d-flex justify-content-around row">
                                        <div class="col-12">
                                            <label class="col-form-label">Nombre</label>
                                            <input class="form-control" type="text" name="nombre_rol">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="botonCrearRol" class="btn btn-primary" type="submit">Crear</button>
                                    </div>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--
    vite(['resources/js/rolesYPermisos.js'])
    -->
@stop

@section('css')
<style>
        /*ESTILOS DE SIDEBAR*/

    #boxMensajeNoResultados{
        background: #2C6DB1;
    }

    .boxDeRol:hover{
        cursor: pointer;
    }

    .scrollRoles::-webkit-scrollbar {
        width: 12px;               /* width of the entire scrollbar */
    }

    .scrollRoles::-webkit-scrollbar-track {
    background: #6597CB;        /* color of the tracking area */
    }

    .scrollRoles::-webkit-scrollbar-thumb {
        background-color: #004A98;    /* color of the scroll thumb */
        border-radius: 20px;       /* roundness of the scroll thumb */
        border: 3px solid #6597CB;  /* creates padding around scroll thumb */
    }


    .pRoles {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

    .aRoles:hover{
        cursor: pointer;
    }

    .aRoles,
    .aRoles:hover,
    .aRoles:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar {
        padding: 15px 10px;
        background: #fff;
        border: none;
        border-radius: 0;
        margin-bottom: 40px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* ---------------------------------------------------
        SIDEBAR STYLE
    ----------------------------------------------------- */

    .wrapper {
        /*display: flex;*/
        width: 100%;
        /*align-items: stretch;*/
    }

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #004A98;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar.active {
        opacity: 0;
        margin-left: -250px;

        transition: all 0.6s;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #2C6DB1;
    }

    #sidebar .ulRoles.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar .ulRoles .pRoles {
        color: #fff;
        padding: 10px;
    }

    #sidebar .ulRoles .liRoles .aRoles {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }

    #sidebar .ulRoles .liRoles .aRoles:hover {
        color: #004A98;
        background: #fff;
    }

    #sidebar .ulRoles .liRoles.active>.aRoles,
    .aRoles[aria-expanded="true"] {
        color: #fff;
        background: #2C6DB1;
    }

    .aRoles[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    .ulRoles .ulRoles .aRoles {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #2C6DB1;
    }

    .ulRoles.CTAs {
        padding: 20px;
    }

    .ulRoles.CTAs .aRoles {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .aRoles.download {
        background: #fff;
        color: #7386D5;
    }

    .aRoles.article,
    .aRoles.article:hover {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    /* ---------------------------------------------------
        CONTENT STYLE
    ----------------------------------------------------- */

    #content {
        width: 100%;
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* ---------------------------------------------------
        MEDIAQUERIES
    ----------------------------------------------------- */

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }
        #sidebar.active {
            margin-left: 0;
        }
        #sidebarCollapse span {
            display: none;
        }
    }



    /**********************************************************************************************/
    /**********************************************************************************************/
    /**********************************************************************************************/
    /*Estilos para modulos*/

    /* Dropdown Button */
    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd;}

    /* Show the dropdown menu on hover */
    /*.dropdown:hover .dropdown-content {display: block;}*/
    #tituloModulo {
        position: relative;
        cursor: pointer;
    }

    #tituloModulo::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px; /* Ajusta esta propiedad según el espaciado deseado */
        width: 100%;
        height: 2px;
        background-color: #004A98;
        transform: scaleX(0); /* Empieza sin subrayado */
        transform-origin: left;
        transition: transform 0.3s;
    }

    #tituloModulo:hover::after {
        transform: scaleX(1); /* Subrayado crece al 100% del ancho */
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    /*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/

    .labelModulo{
        cursor: pointer;
        transition: all 0.5s;
    }
    .labelModulo:hover{
        background-color: #004A98!important;
        color: white!important;
    }
    
</style>
@stop

@section('js')
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

        /******CLASES******/
        //CLASE para manipular toda la informacion de un rol seleccionado
        class Rol {
            //variables necesarias para el la manipulacion de un rol
            constructor(){
                this.rol = ''; //El Rol seleccionado
                this.modulo = ''; //Modulo seleccionado

                this.rolSeleccionado = false; //Variable para indicar si un rol fue seleccionado
                this.moduloSeleccionado = false; //Variable para indicar si un modulo fue seleccionado

                this.listaRoles = {}; //Objeto general de todos los roles retornada desde laravel
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

            //Esta funcion define el color al seleccionarse un nuevo Rol, entre los que estan asignados y los que no estan Asignados
            //Ademas aquellos que son nuevos asignados o eliminados
            setColorDeFondoYTexto(boxBotonDeRol, esAsignado, esOriginal) {
                const backgroundColor = esAsignado ? (esOriginal ? this.colorPermisoAsignado : this.colorPermisoNuevo) : (esOriginal ? this.colorPermisoEliminado : this.colorPermisoNoAsignado);
                const color = backgroundColor === this.colorPermisoNoAsignado ? 'black' : 'white';
                boxBotonDeRol.style.backgroundColor = backgroundColor;
                boxBotonDeRol.style.color = color;
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

            //Funcion para mostrar los permisos que seran guardados o eliminados de un rol en un modal
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

        }

        //CLASE para el filatrdo de elemntos mediante una busqueda
        class Filtro {
            constructor(datosDeBusqueda){
                this.datosDeBusqueda = datosDeBusqueda;
            }

            //Se debe definir name al crear la instacion en el constructor
            //Esta funcion obtiene la clave de name, mediante la cual se verifica si "element(la busqueda)" existe en la lista
            filtrarSearch(element) {
                const {name} = this.datosDeBusqueda;
                if(name) {
                    //return rol.name === name;
                    return element.name.toLowerCase().includes(name.toLowerCase());
                }
                return element;
            }


            //Funcion que oculta aquellos elementos que no coinciden con la busqueda
            //Recibe una lista original y otra con los resultados, de esta manera comparamos que elemntos ocultar
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

            //FUNCION NO UTILIZADA PERO PODIRA SER UTIL
            //funcion para mostrar un mensaje en caso de no encontrarse ningun resultado
            noResultado() {
                //limpiarHTML();

                const noResultado = document.createElement('div');
                noResultado.classList.add('alerta', 'error');
                noResultado.textContent = 'No Hay Resultados, Intenta con otros terminos de busqueda';
                resultado.appendChild(noResultado);
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
        const inputFormModulo_modulo = formModulosDeRol.querySelector('[name="modulo"]');

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
        objectRol.listaPermisos = @json($permisos);

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

            } else if(event.target.classList.contains("boxDeRol") || event.target.classList.contains("labeLBotonRol")){
                event.preventDefault();
                if(event.target.classList.contains("labeLBotonRol")){
                    verificaClickBoxDeRol(event.target.parentElement);
                }else{
                    verificaClickBoxDeRol(event.target);
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


        //***************************************************************************************************************************/
        //***************************************************************************************************************************/
        //***************************************************************************************************************************/
        //Funcion para mostrar los permisos del rol seleccionado
        function muestraPermisosRolSeleccionado() {
            ui.limpiarHTML(boxPermisosAsignados);
            ui.limpiarHTML(boxPermisosNoAsignados);

            objectRol.listaPermisos.forEach(elementPermiso => {
                let padreBotonRol = ui.creaBotonPermiso(`${elementPermiso.name}`);
                const boxBotonDeRol = padreBotonRol.querySelector('.boxDeRol');

                ui.verificaSiPermisoEstaAsignado(objectRol.permisosXRol_Asignados, objectRol.permisosXRol_NoAsignados, padreBotonRol, boxBotonDeRol, elementPermiso);
            });
            
        }

        // Función para manejar la petición AJAX de permisos del Rol seleccionado
        function peticionAjaxPermisosRolSeleccionado() {
            const xhr = new XMLHttpRequest();
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

        // Función para realizar una petición AJAX para el guardado de permisos
        function peticionAjaxGuardarPermisos() {
            const endpoint = '{{ route('guardarPermisos') }}'
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

        // Función para manejar la petición AJAX de permisos al seleccionarse un modulo
        function peticionAjaxModuloSeleccionado() {
            const xhr = new XMLHttpRequest();
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

        //FUNCIONES DE FILTRADO PARA EL SIDEBAR DE ROLES
        const filtroRoles = new Filtro({
            name: ''
        });

        //Event Listener para los select de busqueda
        buscadorSidebar.addEventListener('input', e => {
            filtroRoles.datosDeBusqueda.name = e.target.value;
            filtrarRol();
        });

        //Funcion que realiza el filtrado con la busqueda, sobre la lista, en caso Object.listaRoles
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
    
        //Funcion que realiza el filtrado con la busqueda, sobre la lista, en caso Object.listaRoles
        function filtrarPermiso() {
            const resultado = objectRol.listaPermisos.filter(filtroPermisos.filtrarSearch.bind(filtroPermisos));

            filtroPermisos.showResultados(boxPermisosAsignados, resultado);
            filtroPermisos.showResultados(boxPermisosNoAsignados, resultado);
        }

    </script>
@stop