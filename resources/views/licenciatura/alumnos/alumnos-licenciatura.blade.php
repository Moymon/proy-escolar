@extends('adminlte::page')
@section('plugins.Datatables',true)
@section('title', 'Dashboard')
@section('content_header')
    <!--
        <h1>Dashboard</h1>
    -->
@stop

@section('content')
    <div class="al_lic w-100 d-flex align-items-center justify-content-end">
        <div class="w-100 d-flex flex-row align-items-center">
            <div class="w-50 d-flex flex-sm-row flex-column">
                <button data-toggle="modal" data-target="#modal_horario_calificaciones" id="horario_calificaciones" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn btn-sm btn-primary">Horario y Calificaciones</button>
                <button data-toggle="modal" data-target="#modal_bitacora_portal_alumnos" id="bitacora_portal_alumnos" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn btn-sm btn-primary">Bitácora del Portal de Alumnos</button>
                <button disabled id="imprimir_portada" style="width:min(150px, 100%);margin-right:10px;margin-bottom:10px;" type="button" class="btn btn-sm btn-primary"><i class="bi bi-printer-fill" style="margin-right: 10px"></i>Imprimir Portada</button>
            </div> 

            <div class="w-50 d-flex flex-row align-items-center justify-content-end">
                <div>
                    <button type="button" class="m-1 btn btn-primary" data-toggle="modal" data-target="#buscarAlumno" name=""> Buscar Alumno </button>
                </div>
                <div>
                    <button type="button" class="m-1 btn btn-success"><i class="bi bi-plus"></i> Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-datos_generales" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Datos Generales</button>
        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-domicilio" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Contacto y Domicilio</button>
        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-academico" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Antecedente Académico</button>
        <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-egreso" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Datos de Egreso</button>
        </div>
    </nav>

    <!--Tabs-->
    <div class="tab-content" id="nav-tabContent">
        <div class="mb-5 tab-pane fade show active" id="nav-datos_generales" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                <div class="form-group col-md-3">
                                    <label for="clave_ingenieria">Clave Ingeniería</label>
                                    <input type="text" class="form-control" id="clave_ingenieria">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="carrera">Carrera</label>
                                    <select id="carrera" class="form-select form-control" aria-label="Carrera">
                                        <option selected>Carrera</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ciclo_escolar">Ciclo Escolar</label>
                                    <input type="text" class="form-control" id="ciclo_escolar">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="situacion">Situación</label>
                                    <input type="text" class="form-control" id="situacion">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_situacion">Fecha de la Situación</label>
                                    <input type="date" class="form-control" id="fecha_situacion">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="conducta">Conducta</label>
                                    <input type="text" class="form-control" name="conducta">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="condicion">Condición</label>
                                    <input type="text" class="form-control" id="condicion">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_paterno">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_materno">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="sexo">Género</label>
                            <select id="sexo" class="form-select form-control" aria-label="sexo">
                                <option selected>----</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" id="curp">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nombre_asesor">Nombre del Asesor</label>
                            <select id="nombre_asesor" class="form-select form-control" aria-label="nombre_asesor">
                                <option selected>nombre_asesor</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 d-flex align-items-end">
                            <button id="cambio_asesor" type="button" class="btn btn-primary w-100">Cambio de Asesor</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="afiliacion_imss">Número de Seguridad Social (IMSS)</label>
                            <input type="text" class="form-control" id="afiliacion_imss">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_imss">Fecha de Afiliación NNS</label>
                            <input type="date" class="form-control" id="fecha_imss">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="archivo_nss">Archivo de NSS (Nombre)</label>
                            <input type="text" name="archivo_nss" id="archivo_nss" class="form-control" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estado_civil">Estado Civil</label>
                            <select class="form-control form-select" id="estado_civil">
                                <option>Soltero/a</option>
                                <option>Casado/a</option>
                                <option>Divorciado/a</option>
                                <option>Viudo/a</option>
                                <option>Separado/a</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-3">
                            <label for="lengua_indigena">Habla alguna lengua indígena</label>
                            <select class="form-control form-select" id="lengua_indigena"> 
                                <option>No</option>
                                <option>Si</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="discapacidad">Discapacidad</label>
                            <select class="form-control form-select" id="discapacidad">
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

                    <h6 class="text-center">Contacto de emergencia</h6>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nombre_emergencia">Nombre</label>
                            <input class="form-control" type="text" id="nombre_emergencia">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="parentesco_emergencia">Parentesco</label>
                            <select class="form-control form-select" id="parentesco_emergencia">
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
                        <div>
                            <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                        </div>
                        <div>
                            <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5 tab-pane fade" id="nav-domicilio" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card">
                <div class="card-body">

                    <h5>Datos de Contacto</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular">  
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_alterno">Correo Alterno</label>
                            <input type="email" class="form-control" id="correo_alterno">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="correo_uaslp">Correo institucional</label>
                            <input type="email" class="form-control" id="correo_uaslp">
                        </div>
                    </div>

                    <h5 class="">Domicilio Actual</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="calle">Calle</label>
                            <input type="text" class="form-control" id="calle">  
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_ext">No. Exterior</label>
                            <input type="number" class="form-control" id="num_ext">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_int">No. Interior</label>
                            <input type="number" class="form-control" id="num_int">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" id="colonia">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class=" form-control" id="codigo_postal">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ciudad_municipio">Ciudad y/o Municipio</label>
                            <input type="text" class=" form-control" id="ciudad_municipio">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado">Estado</label>
                            <input type="text" class=" form-control" id="estado">
                        </div>
                    </div>

                    <h5 class="">Domicilio Permanente</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="calle">Calle</label>
                            <input type="text" class="form-control" id="calle" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_ext">No. Exterior</label>
                            <input type="number" class="form-control" id="num_ext" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="num_int">No. Interior</label>
                            <input type="number" class="form-control" id="num_int" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="colonia">Colonia</label>
                            <input type="text" class="form-control" id="colonia" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="codigo_postal">Código Postal</label>
                            <input type="text" class="form-control" id="codigo_postal" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ciudad_municipio">Ciudad y/o Municipio</label>
                            <input type="text" class="form-control" id="ciudad_municipio" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" disabled>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <div>
                            <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                        </div>
                        <div>
                            <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                        </div>
                    </div>

                    <h5 class="">Domicilio y contacto del tutor</h5>
                    <hr class="mb-4 mt-2" />
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="padre">Padre o tutor</label>
                            <input type="text" class="form-control" id="padre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="madre">Madre</label>
                            <input type="text" class="form-control" id="madre">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="calle_tutor">Calle</label>
                            <input type="text" class="form-control" id="calle_tutor">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="numero_ext_tutor">No. Exterior</label>
                            <input type="text" class="form-control" id="numero_ext_tutor">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="numero_int_tutor">No. Interior</label>
                            <input type="text" class="form-control" id="numero_int_tutor">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="colonia_tutor">Colonia</label>
                            <input type="text" class="form-control" id="colonia_tutor">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="codigo_postal_tutor">Código Postal</label>
                            <input type="text" class=" form-control" id="codigo_postal_tutor">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ciudad_municipio_tutor">Ciudad y/o Municipio</label>
                            <input type="text" class=" form-control" id="ciudad_municipio_tutor">    
                        </div>
                        <div class="form-group col-md-2">
                            <label for="estado_tutor">Estado</label>
                            <input type="text" class=" form-control" id="estado_tutor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="telefono_tutor">Teléfono</label>
                            <input type="tel" class="small form-control" id="telefono_tutor">    
                        </div>
                        <div class="form-group col-md-4">
                            <label for="celular_tutor">Celular</label>
                            <input type="tel" class="form-control" id="celular_tutor">
                        </div>
                        <div class="col-4">
                            <label for="correo_personal_tutor">Correo Electrónico Personal</label>
                            <input type="email" class=" form-control" id="correo_personal_tutor">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                        <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5 tab-pane fade" id="nav-academico" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="secundaria">Secundaria</label>
                            <input type="text" class="small form-control" id="secundaria">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="ciudad_secundaria">Ciudad</label>
                            <input type="text" class=" form-control" id="ciudad_secundaria">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="bachillerato">Bachillerato</label>
                            <input type="text" class="form-control" id="bachillerato">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ciudad_bachillerato">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad_bachillerato">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="estado_bachillerato">Estado</label>
                            <input type="text" class="form-control" id="estado_bachillerato">
                        </div>
                        <div class="form-group col-md-3">
                            <div class="d-flex flex-column">
                                <label for="periodo_bachillerato_incio">Periodo</label>
                                <div class="d-flex flex-row">
                                    <div class="pr-1 w-50">
                                        <input type="number" min="1900" max="2099" class="form-control" id="periodo_bachillerato_incio" value="2015"/>
                                    </div>
                                    <div class="pl-1 w-50">
                                        <input type="number" class="form-control" min="1900" max="2099" id="periodo_bachillerato_fin" value="2018"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                        <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5 tab-pane fade" id="nav-egreso" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="fecha_pasante">Fecha de Pasante</label>
                            <input type="date" class="small form-control" id="fecha_pasante">
                        </div>

                        <div class="form-group col-md-2">
                            <div class="d-flex flex-column">
                                <label for="periodo_bachillerato_incio">Periodo</label>
                                <div class="d-flex flex-row">
                                    <div class="pr-1 w-50">
                                        <input type="number" min="1900" max="2099" class="mid form-control" id="periodo_bachillerato_incio" value="2015"/>
                                    </div>
                                    <div class="pl-1 w-50">
                                        <input type="number" class="mid form-control" min="1900" max="2099" id="periodo_bachillerato_fin" value="2018"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="fecha_titulacion">Fecha de Titulación</label>
                            <input type="text" class="form-control" id="fecha_titulacion">
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
                            <label for="ciclo_escolar_horario">Estado de Titulación </label>
                            <input type="text" class="form-control" id="estado:_titulacion">    
                        </div>
                        <div class="form-group col-md-4">
                            <label for="opcion_titulacion">Opción de Titulación</label>
                            <select id="opcion_titulacion" class="form-select form-control" aria-label="opcion_titulacion">
                                <option selected>titulacion</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <div>
                            <button id="modificar" type="button" class="m-1 btn btn-primary">Modificar</button>
                        </div>
                        <div>
                            <button id="guardar" type="button" class="m-1 btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal top fade m-0 p-0" id="modal_horario_calificaciones" tabindex="-1" aria-labelledby="modal_horario_calificacionesLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable mw-100 min-vh-100 m-0 p-0">
            <div class="modal-content w-100 min-vh-100">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_horario_calificacionesLabel">Horario y calificaciones parciales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="pb-0 pt-3 px-3">
                    <form class="">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="clave_uaslp_horario">Clave UASLP</label>
                                <input type="text" class="form-control" id="clave_uaslp_horario">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="clave_ingenieria_horario">Clave Ingeniería</label>
                                <input type="text" class="form-control" id="clave_ingenieria_horario">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nombre_horario">Nombre</label>
                                <input type="text" class="form-control" id="nombre_horario">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ciclo_escolar_horario">Ciclo Escolar</label>
                                <select id="ciclo_escolar_horario" class="form-select form-control">
                                    <option selected>ciclo escolar</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group col-md-1">
                                <div class="d-flex align-items-end justify-content-start w-100 h-100">
                                    <button id="buscar" type="button" class="btn btn-primary w-100">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-horario-tab" data-toggle="tab" data-target="#nav-horario" type="button" role="tab" aria-controls="nav-horario" aria-selected="true">Horario</button>
                        <button class="nav-link" id="nav-calificaciones-tab" data-toggle="tab" data-target="#nav-calificaciones" type="button" role="tab" aria-controls="nav-calificaciones" aria-selected="false">Calificaciones</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="p-2 tab-pane fade show active" id="nav-horario" role="tabpanel" aria-labelledby="nav-horario-tab">
                            <table class="table table-bordered w-100 rounded-lg table-striped">
                                <thead class="rounded-lg">
                                <tr >
                                    <th scope="col">#</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Créditos</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Materia</th>
            
                                    <th scope="col">Lun</th>
                                    <th scope="col">Mar</th>
                                    <th scope="col">Mié</th>
                                    <th scope="col">Jue</th>
                                    <th scope="col">Vie</th>
                                    <th scope="col">Sáb</th>
                                    <th scope="col">Salón</th>
                                    <th scope="col">RPE</th>
                                    <th scope="col">Profesor</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td>IN</td>
                                    <td>2018/01/15</td>
                                    <td>13:53:48</td>
                                    <td>L</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td>0</td>
                                    <td>13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    
                                    <td>H-LR</td>
                                    <td>24665</td>
                                    <td >AVALOS MORALES ERENDIRA MAGDALENA</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2 tab-pane fade" id="nav-calificaciones" role="tabpanel" aria-labelledby="nav-calificaciones-tab">
                            <table class="table table-bordered w-100 rounded-lg table-striped">
                                <thead class="rounded-lg">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col">Clave</th>
                                    <th scope="col">Créditos</th>
                                    <th scope="col">Materia</th>
            
                                    <th scope="col">P1</th>
                                    <th scope="col">F1</th>
                                    <th scope="col">P2</th>
                                    <th scope="col">F2</th>
                                    <th scope="col">P3</th>
                                    <th scope="col">F3</th>
                                    <th scope="col">P4</th>
                                    <th scope="col">F4</th>
                                    <th scope="col">P5</th>
                                    <th scope="col">F5</th>
                                    <th scope="col">LAB</th>
                                    <th scope="col">EO</th>
                                    <th scope="col">Fecha EO</th>
                                    <th scope="col">EE</th>
                                    <th scope="col">Fecha EE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
            
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
            
            
            
                                <tr>
                                    <th scope="row">1</th>
                                    <td>282002</td>
                                    <td>2820</td>
                                    <td>0</td>
                                    <td  >Laboratorio de Redes A</td>
            
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
            
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-row w-100">

                        <div class="form-group col-md-6">
                            <div class="d-flex flex-wrap align-items-center justify-content-start">
                                <button id="imprimir" type="button" class="btn btn-primary px-5 mr-1 mb-1">Imprimir</button>
                                <button id="exportar" type="button" class="btn btn-primary px-5 mr-1 mb-1">Exportar</button>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="d-flex align-items-center justify-content-end">
                                <button id="" type="button" class="btn btn-secondary btn-close px-5" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="modal fade p-0 m-0" id="modal_bitacora_portal_alumnos" tabindex="-1" aria-labelledby="modal_bitacora_portal_alumnosLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen modal-dialog-scrollable mw-100 min-vh-100 m-0 p-0">
            <div class="modal-content w-100 min-vh-100">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Bitácora del Portal de Alumnos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex flex align-items-center justify-content-center">
                
                    <div class="p-2 w-100">
                        <table class="table table-bordered table-striped w-100 rounded-lg">
                            <thead class="rounded-lg">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Folio</th>
                                <th scope="col">Dirección IP</th>
                                <th scope="col">Fecha y Hora</th>
                                <th scope="col">Operación</th>
                                <th scope="col">Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>


                                <tr>
                                    <th scope="row">1</th>
                                    <td >13055502</td>
                                    <td >148.224.51.112</td>
                                    <td >2018/01/22 07:29:48</td>
                                    <td >CERRAR SESION</td>
                                    <td >Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <div class="form-row w-100">
                        <div class="form-group col-md-12">
                            <div class="d-flex align-items-center justify-content-end">
                                <button id="" type="button" class="btn btn-secondary btn-close px-5" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('modalAlumnos')
    @include('subirFotoPerfil')
@stop

@section('css')
    <link rel="stylesheet"  href="{{ asset('css/custom-file-image.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>        
        th, tr{
            white-space: nowrap;
        }
        
    </style>
@stop

@section('js')
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

        });
    }); 
</script>

</script>
@stop