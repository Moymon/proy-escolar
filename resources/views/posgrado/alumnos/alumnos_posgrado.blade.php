@extends('adminlte::page')
@section('plugins.Datatables',true)
@section('title', 'Dashboard')

@section('content_header')
 <!--
    <h1>Dashboard</h1>
-->
@stop

@section('content')
    <div class="w-100 d-flex align-items-center justify-content-end">
        <div>
            <div class=" d-flex flex-row align-items-center justify-content-end">
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscarAlumno">Buscar Alumno</button>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav" data-toggle="tab" data-target="#nav-datos-generales" type="button" role="tab" aria-controls="nav-datos-generales" aria-selected="true">Datos Generales</button>
        <button class="nav-link" id="nav" data-toggle="tab"  data-target="#nav-contacto-domicilio" type="button" role="tab" aria-controls="nav-contacto-domicilio" aria-selected="false">Contacto y Domicilio</button>
        <button class="nav-link" id="nav" data-toggle="tab"  data-target="#nav-antecedentes" type="button" role="tab" aria-controls="nav-antecedentes" aria-selected="false">Antecedentes Académicos</button>
        </div>
    </nav>

    <!--Tabs posgrado-->
    <div class="tab-content" id="nav-tabContent">
        <!--Tab datos generales-->
        <div class="mb-5 tab-pane fade show active" id="nav-datos-generales" role="tabpanel" aria-labelledby="nav-datos-generales">
            <div class="card">
                <div class="card-body">
                    <div class="row gutters-sm">
                        <div class="col-sm-1 mb-3 d-flex align-items-start justify-content-start">
                            <div style="width: 133px;" class="border">
                                <div style="height: 133px;">
                                    <img src="{{ asset('img/perfil.png') }}" class="img-fluid" alt="" style="width: 133px; height: 133px;">
                                </div>
                                <button class="w-100 btn btn-sm btn-primary" style="border-radius:0px;" data-toggle="modal" data-target="#modalSubirImagen"><i class="fas fa-camera"></i></button>
                            </div>
                        </div>

                        <div class="col-sm-11 mb-3 pl-3">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="clave_uaslp">Clave UASLP</label>
                                    <input type="text" class="form-control" id="clave_uaslp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="posgrado">Posgrado</label>
                                    <select id="posgrado" class="form-select form-control" aria-label="posgrado">
                                        <option selected>posgrado</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    <input type="date" class=" form-control" id="fecha_nacimiento">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="apellido_paterno">Apellido Paterno</label>
                                    <input type="text" class=" form-control" id="apellido_paterno">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="apellido_materno">Apellido Materno</label>
                                    <input type="text" class=" form-control" id="apellido_materno">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombres">Nombres</label>
                                    <input type="text" class=" form-control" id="nombres">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class=" form-control" id="nombres">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" id="curp">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="edo_civil">Estado Civil</label>
                            <select id="edo_civil" class="form-select form-control">
                                <option>Soltero/a</option>
                                <option>Casado/a</option>
                                <option>Viudo/a</option>
                                <option>Separado/a</option>
                                <option>Divorciado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="sexo">Género</label>
                            <select id="sexo" class="form-select form-control" aria-label="sexo">
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="2">Otros</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Estado</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="afiliacion_imss">Número de Seguridad Social (IMSS)</label>
                        <input type="text" class="form-control" id="afiliacion_imss">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fecha_imss">Fecha Afiliación NNS</label>
                            <input type="date" class="form-control" id="fecha_imss">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="archivo_mss">Archivo de NSS (Nombre)</label>
                            <input type="text" name="archivo_nss" class="form-control" />
                        </div>
                        <div class="form-group col-md-2">
                            <label>Habla alguna lengua indígena</label>
                            <select class="form-control form-select"> 
                                <option>No</option>
                                <option>Si</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Discapacidad</label>
                            <select class="form-control form-select">
                                <option>Ninguna</option>
                                <option>Fisica/Motriz</option>
                                <option>Intelectual</option>
                                <option>Multiple</option>
                                <option>Auditiva:hipoacusia</option>
                                <option>Auditiva/Sordera</option>
                                <option>Visual: baja vision</option>
                                <option>Visual: Ceguera</option>
                                <option>Psicosocial</option>
                                <option>Otras</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>CVU</label>
                            <input type="text" class="form-control"/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>RFC</label>
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Asesor de Tesis</label>
                            <select class="form-control form-select">
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 d-flex align-items-end justify-content-center">
                            <button class="btn btn-primary w-100">Cambiar Asesor</button>
                        </div>
                    </div>

                    <h6 class="text-center">Contacto de emergencia</h6>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                        <input class="form-control" type="text" name="">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Parentesco</label>
                            <select class="form-control form-select">
                                <option>Padre</option>
                                <option>Madre</option>
                                <option>Tio/a</option>
                                <option>Hermano/a</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefono_emergencia">Teléfono</label>
                            <input class="form-control" type="text" id="telefono_emergencia">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="celular_emergencia">Celular</label>
                            <input class="form-control" type="text" id="celular_emergencia">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                        <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Tab Domicilio-->
        <div class="mb-5 tab-pane fade" id="nav-contacto-domicilio" role="tabpanel" >
            <div class="card">
                <div class="card-body">
                    <h5>Datos de Contacto</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="celular">Celular</label>
                            <input type="text" id="celular" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo">Correo Electrónico Personal</label>
                            <input type="email" class="form-control" id="correo">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo">Correo Institucional</label>
                            <input type="email_insti" class="form-control" id="correo">
                        </div>
                    </div>

                    <h5>Domicilio Actual</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="col-2">
                            <label for="calle">Calle</label>
                            <input type="text" id="calle" class="form-control">
                        </div>    
                        <div class="col-1">
                            <label for="num_ext">No. Exterior</label>
                            <input type="text" id="num_ext" class="form-control">
                        </div>
                        <div class="col-1">
                            <label for="num_int">No. Interior</label>
                            <input type="text" id="num_int" class="form-control">
                        </div>
                        <div class="col-2">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" id="colonia">
                        </div>
                        <div class="col-1">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class="form-control" id="codigo_postal">
                        </div>
                        <div class="col-3">
                            <label>Ciudad</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="col-2">
                            <label>Estado</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>

                    <h5>Domicilio Permanente</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="col-2">
                            <label for="calle">Calle</label>
                            <input type="text" id="calle" class="form-control">
                        </div>    
                        <div class="col-1">
                            <label for="num_ext">No. Exterior</label>
                            <input type="text" id="num_ext" class="form-control">
                        </div>
                        <div class="col-1">
                            <label for="num_int">No. Interior</label>
                            <input type="text" id="num_int" class="form-control">
                        </div>
                        <div class="col-2">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" id="colonia">
                        </div>
                        <div class="col-1">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class="form-control" id="codigo_postal">
                        </div>
                        <div class="col-3">
                            <label>Ciudad</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="col-2">
                            <label>Estado</label>
                            <input class="form-control" type="text">
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
            </div>
        </div>

        <!--Tab antecedentes-->
        <div class="mb-5 tab-pane fade" id="nav-antecedentes" role="tabpanel" aria-labelledby="nav-antecedentes">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5>Licenciatura</h5>
                        <hr class="mb-4 mt-2"/>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="universidad">Universidad</label>
                                <select id="universidad" class="form-select form-control" aria-label="universidad">
                                    <option selected>universidad</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="escuela_facultad">Escuela y/o Facultad</label>
                                <select id="escuela_facultad" class="form-select form-control" aria-label="escuela_facultad">
                                    <option selected>facultad</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="licenciatura">Licenciatura</label>
                                <select id="licenciatura" class="form-select form-control" aria-label="licenciatura">
                                    <option selected>licenciatura</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="licenciatura">Número de cédula</label>
                                <input type="text" class="form-control" id="licenciatura">
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                            <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                        </div>
                    </div>

                    <div>
                        <h5>Posgrado</h5>
                        <hr class="mb-4 mt-2"/>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="universidad_posgrado">Universidad</label>
                                <select id="universidad_posgrado" class="form-select form-control" aria-label="universidad_posgrado">
                                    <option selected>universidad posgrado</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="escuela_facultad_posgrado">Escuela y/o Facultad</label>
                                <select id="escuela_facultad_posgrado" class="form-select form-control" aria-label="escuela_facultad_posgrado">
                                    <option selected>facultad posgrado</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="posgrado_alumno">Posgrado</label>
                                <select id="posgrado_alumno" class="form-select form-control" aria-label="posgrado_alumno">
                                    <option selected>posgrado</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="fecha_titulacion">Fecha de Titulación</label>
                                <input type="date" class="mid form-control" id="fecha_titulacion">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="libro">Libro</label>
                                <input type="text" class="mid form-control" id="libro">
                            </div>   
                            <div class="form-group col-md-1">
                                <label for="acta">Acta</label>
                                <input type="text" class="mid form-control" id="acta">
                            </div>
                            <div class="form-group col-md-2">
                                <div class="d-flex flex-column">
                                    <label for="periodo_posgrado_incio">Periodo</label>
                                    <div class="d-flex flex-row">
                                        <div class="pr-1 w-50">
                                            <input class="form-control" type="number" id="periodo_posgrado_incio" min="1900" max="2099" value="2015">
                                        </div>
                                        <div class="pl-1 w-50">
                                            <input class="form-control" type="number" id="periodo_posgrado_fin" min="1900" max="2099" value="2016">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="numero_cedeula">Número de cédula</label>
                                <input type="text" class="mid form-control" id="numero_cedeula">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="estado_titulacion">Estado de Titulación</label>
                                <input type="text" class="mid form-control" id="estado_titulacion">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="opcion_titulacion">Opción de Titulación</label>
                                <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                                    <option selected>opcion titulacion</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button  id="nuevo_pos" type="button" class="btn btn-success m-3"><i class="fas fa-folder-plus" data-toggle="modal" data-target="#nuevoPosgrado"></i></button>
                        </div>
                        <table class="table table-bordered table-striped dataTable dtr-inline tabla_posgrado">
                            <thead>
                                <tr>
                                    <th>Nivel</th>
                                    <th>Posgrado</th>
                                    <th>Facultad</th>
                                    <th>Universidad</th>
                                    <th>Edición</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center" width="10px"><a href="#" class="m-0 btn btn-primary"> <i class="fas fa-pencil-alt"></i></a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center" width="10px"><a href="#" class="m-0 btn btn-primary"> <i class="fas fa-pencil-alt"></i></a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center" width="10px"><a href="#" class="m-0 btn btn-primary"> <i class="fas fa-pencil-alt"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Modal nuevo pos-->
    <div class="modal fade" id="nuevoPosgrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del Posgrado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="posgrado_alumno">Posgrado</label>
                    <select id="posgrado_alumno" class="form-select form-control" aria-label="posgrado_alumno">
                        <option selected>posgrado</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="fecha_titulacion">Fecha de Titulación</label>
                    <input type="date" class="form-control" id="fecha_titulacion">
                </div>
                <div class="form-group col-md-1">
                    <label for="libro">Libro</label>
                    <input type="text" class="form-control" id="libro">
                </div>   
                <div class="form-group col-md-1">
                    <label for="acta">Acta</label>
                    <input type="text" class="form-control" id="acta">
                </div>
                <div class="form-group col-md-3">
                    <div class="d-flex flex-column">
                        <label for="periodo_posgrado_incio">Periodo</label>
                        <div class="d-flex flex-row">
                            <div class="pr-1 w-50">
                                <input type="number" class="form-control" id="periodo_posgrado_incio" min="1900" max="2099" value="2015">
                            </div>
                            <div class="pl-1 w-50">
                                <input type="number" class="form-control" id="periodo_posgrado_fin" min="1900" max="2099" value="2016">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="numero_cedula">Número de cédula</label>
                    <input type="text" class="form-control" id="numero_cedula">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="estado_titulacion">Estado de Titulación</label>
                    <input type="text" class="form-control" id="estado_titulacion">
                </div>
                <div class="form-group col-md-3">
                    <label for="opcion_titulacion">Opción de Titulación</label>
                    <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                        <option selected>opcion titulacion</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </div>
    </div>

    @include('modalAlumnos')
    @include('subirFotoPerfil')
@stop

@section('footer')
    <div></div>
@stop

@section('css')
    <link rel="stylesheet"  href="{{ asset('css/custom-file-image.css')}}" />
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>     
        label{
            font-weight: 400!important;
        }
    </style>
@stop

@section('js')
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
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
        const $imagen = document.querySelector('#foto'), $imagenPreview = document.querySelector('#imagenPreview');

        $imagen.addEventListener("change",() =>{
            const archivo = $imagen.files;
            /*Si no hay datos del archivo no hacemos nada*/
            if (!archivo || !archivo.length) {
                $imagen.src = "";
                return;
            }else{
                /*Tomamos el primer archivo*/
                const archivo1 = archivo[0];
                const blobObject = URL.createObjectURL(archivo[0]);
                $imagenPreview.src = blobObject;
            }

        });
    </script>
@stop