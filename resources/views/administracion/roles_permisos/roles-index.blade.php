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
    vite(['resources/css/Administracion/rolesYPermisos.css'])
    -->
    <link rel="stylesheet" href="{{asset('/css/Administracion/Roles/rolesYPermisos.css')}}">
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

                    foreach ($roles as $rol)
                        <tr>
                            <td>{$rol->id}}</td>
                            <td>{$rol->name}}</td>
                            <td>{$rol->guard_name}}</td>
                            <td>
                                foreach ($rol->permissions as $permission)
                                    <div class="badge badge-secondary"><h6>{$permission->name}}</h6></div>
                                endforeach
                            </td>
                            <td width="10px">Ver...<a href="/roles-edit/{$rol->id}}"><i class="fas fa-list"></i></a></td>
                        </tr>
                    endforeach
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
                    <ul id="listaRoles" style="height:60vh;overflow:auto;" class="w-100 scrollRoles ulRoles list-unstyled components">
                        
                        @foreach ($roles as $rol)
                            <li class="liRoles" id="{{$rol->name}}" data-id="{{$rol->name}}" data-name="{{$rol->name}}">
                                <div class="aRoles rolDeSidebarSeleccionable" data-target="{{$rol->name}}">{{$rol->name}}</div>
                            </li>
                        @endforeach
                    </ul>

                    <!--
                    <form id="formRolDeSideBar" method="POST" action="{ route('getPermisosRelacionadosConNombre') }}" style="display: none;visibility:hidden;">
                        csrf
                        <input type="hidden" id="nombreRolSeleccionadoDeSideBar" name="nombre">
                    </form>
                    -->
                </nav>


                
                <!-- Page Content  -->
                <div id="content" class="w-100" style="width:100%!important;">
            
                    <nav id="navbarRoles" class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <button type="button" id="sidebarCollapse" class="btn">
                                <i id="sidebarIcon" class="mr-1 fas fa-times"></i>
                                Roles
                            </button>
            
                            <h3 class="m-0 mb-2 text-center" id="tituloRolSeleccionado"></h3>
                            
                            <div>
                                <button id="botonNuevoRol" class="btn" data-toggle="modal" data-target="#nuevoRol" ><i class="fas fa-plus"></i></button>
                                <button id="asignarRolBoton" class="btn btn-primary">
                                    <span class="button__text" id="asignarRolBotonSpan">Asignar Rol</span>
                                </button>
                            </div>
                        </div>
                    </nav>
            
                    <div class="w-100">
                        <div id="contentRolSeleccionado" class="w-100 h-100 d-flex flex-column">

                            <div id="menuModulos" class="dropdown w-100">
                                <div class="w-100 d-flex flex-row align-items-center justify-content-center">
                                    <!--
                                    <h3 class="m-0 mb-2 text-center" id="tituloRolSeleccionado"></h3>
                                    <p class="m-0 mb-2 mx-2">/</p>
                                    -->

                                    <h3 style="user-select: none;" id="tituloModulo" class="openDropdown dropbtn rounded">Módulos</h3>
                                    <i id="iconTituloModulo" class='fa fa-caret-right ml-2'></i>
                                    
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
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center p-2 labelModulo" id="{{$modulo->nombre}}" data-target="{{$modulo->nombre}}">{{$modulo->nombre}}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div id="boxIndices" class="p-2 w-100 d-flex flex-column">
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

                            <div id="contentRolSeleccionadoPermisos" class="w-100 h-100">
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
    <div class="modal fade" id="modalPermisos" tabindex="-1" aria-labelledby="modalConfirmarPermisos" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPermisosLabel">Permisos a guardar: <span class="text-center" id="modalTituloRol"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalPermisosBody" class="modal-body">
                <div class="w-100 d-flex flex-column">
                    <h5 class="text-center mb-4">¿Estas seguro que quieres asignar los siguientes permisos al rol : <span class="text-center" id="modalSubTituloRol"></span>?</h5>

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
            <button id="btnGuardadoPermisosModal" type="button" class="btn btn-primary">
                <span class="button__text" id="btnGuardadoPermisosModalSpan">Guardar cambios</span>
            </button>
            </div>
        </div>
        </div>
    </div>

    <!--Modal Confirmar cambio de Rol-->
    <div class="modal fade" id="confirmacionDeCambio" tabindex="-1" aria-labelledby="modalConfirmarCambioDeRoL" aria-hidden="true">
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
    <div class="modal fade" id="nuevoRol" tabindex="-1" role="dialog" aria-labelledby="modalNuevoRol" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route("crearRoles")}}">
                        @csrf
                        <div class="form-group"> 
                            <div class="d-flex justify-content-around row">
                                <div class="col-12">
                                    <label class="col-form-label">Nombre</label>
                                    <input class="form-control" type="text" name="nombre_rol">
                                    @error('nombre_rol')
                                        <p class="bg-red-500 text-danger my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                    @enderror
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
  
    <!--Modal Agregar Usuario-->
    <div class="modal fade" id="modalAsignaRolAUsuario" tabindex="-1" aria-labelledby="modalAsignaRolAUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAsignaRolAUsuarioTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="w-100">
                        <div class="">
                            <h5 class="text-center">Asigna el rol: <span id="asignaRolAUsuarioSubTitle"></span> a los usuarios</h5>
                        </div>

                        <div id="listaDeUsuarios" class="row m-0">
                            <div id="generalBtnUsuarios" class="col-3">
                                <div id="padreBtnUsuarios" class="mr-1 mb-2 px-2 py-1 d-flex flex-row border rounded" style="background-color:rgb(242, 242, 242);color:black;">
                                    <label class="container m-0" id="labelbtnUsuarios">
                                        <input id="inputBtnUsuarios" type="checkbox" checked="checked">
                                        <span id="spanBtnUsuarios" class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btnGuardarRolXUsuarios" type="button" class="btn">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="module" src="{{asset('js/Administracion/Roles/rolesYPermisos.js') }}"></script>
@stop

@section('css')
@stop

@section('js')
    <script>
        listaRolesJSON = @json($roles);
        listaPermisosJSON = @json($permisos);

        const getPermisosRelacionadosConNombre = '{{ route('getPermisosRelacionadosConNombre') }}';
        const guardarPermisos = '{{ route('guardarPermisos') }}';
        const getPermisosModuloConRol = '{{ route('getPermisosModuloConRol') }}';
        const guardarUsuariosXRol = '{{ route('guardarUsuariosXRol') }}';
        const getUsuariosXRol = '{{ route('getUsuariosXRol') }}';

        const rutaClassRolPermisos = "{{ asset('js/Administracion/classRolPermisos.js') }}";


        //VARIABLES
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Almacenar elementos en variables para un acceso más rápido

        //Elemento del sidebar de ROLES
        //const formRolDeSideBar = document.getElementById("formRolDeSideBar");
        //const nombreRolSeleccionadoDeSideBar = document.getElementById("nombreRolSeleccionadoDeSideBar");
        const navbarRoles = document.getElementById("navbarRoles");
        const tituloRolSeleccionado = navbarRoles.querySelector("#tituloRolSeleccionado");
        const sidebarCollapse = navbarRoles.querySelector("#sidebarCollapse");
        const botonNuevoRol = navbarRoles.querySelector("#botonNuevoRol");
        const asignarRolBoton = navbarRoles.querySelector("#asignarRolBoton"); //Boton para abriri modal de asiganr Rol a un usuario
        

        const sidebar = document.getElementById("sidebar");
        const listaRoles = sidebar.querySelector('#listaRoles');
        const buscadorSidebar = sidebar.querySelector("#searchSideBarRoles");

        //Elementos de la ventana de permisos
        const content = document.getElementById("content");
        const contentRolSeleccionado = document.getElementById("contentRolSeleccionado");
        const boxPermisosAsignados = contentRolSeleccionado.querySelector("#boxPermisosAsignados");
        const boxPermisosNoAsignados = contentRolSeleccionado.querySelector("#boxPermisosNoAsignados");
        const buscadorPermiso = contentRolSeleccionado.querySelector("#buscadorPermiso");

        //Elementos de la venta de permisos, especificos para el Modulo
        const tituloModulo = contentRolSeleccionado.querySelector("#tituloModulo");

        //Boton para el guardado
        const btnGuardadoPermisos = contentRolSeleccionado.querySelector("#btnGuardadoPermisos");

        //Dropdown
        const menuModulos = document.getElementById("menuModulos");
        const dropdown = menuModulos.querySelector("#dropdown-content");

        //Seccion de indices para los colores del los permisos
        const boxIndices = document.getElementById('boxIndices');
        const indiceAsignados = boxIndices.querySelector("#indiceAsignados");
        const indiceNuevos = boxIndices.querySelector("#indiceNuevos");
        const indiceEliminados = boxIndices.querySelector("#indiceEliminados");
        const indiceNoAsiganados = boxIndices.querySelector("#indiceNoAsiganados");

        
        //elementos del MODAL donde se muestran los permisos que se van a guardar o eliminar
        const modalPermisos = document.getElementById("modalPermisos");
        const modalListaPermisos = modalPermisos.querySelector("#modalListaPermisos");
        const modalListaPermisosEliminados = modalPermisos.querySelector("#modalListaPermisosEliminados");
        const btnGuardadoPermisosModal = modalPermisos.querySelector("#btnGuardadoPermisosModal");

        //elementos de la secuencia de creacion de un NuevoRol
        const modalNuevoRol = document.getElementById('nuevoRol');
        const botonCrearRol = modalNuevoRol.querySelector("#botonCrearRol");

        //Botones en Modal Permamencia de Rol
        const modalConfirmacionDeCambio = document.getElementById("confirmacionDeCambio");
        const permanecerEnRol = modalConfirmacionDeCambio.querySelector("#permanecerEnRol");

        //Elementos de modal para asiganra el rol a un usuario
        const modalAsignaRolAUsuario = document.getElementById("modalAsignaRolAUsuario");
        const btnGuardarRolXUsuarios = modalAsignaRolAUsuario.querySelector('#btnGuardarRolXUsuarios');
        
    </script>
@stop